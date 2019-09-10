<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\user;
use App\teachers_staffs_info;
use App\about_us;
use App\speech;
use App\students_information;
use App\notice_news_events;
use App\yearly_syllabus;
use App\routine;
use App\booklist;
use App\result;
use App\teachers_login_info;
use App\students_login_info;
use App\ebook;
use App\image_gallery;
use App\present_students;
use App\students_id;
use App\students_due;
use App\attendence;
use App\board_result;
use App\link;
use App\committe;
use App\contact_info;
use App\ex_student;
use DB;
use Excel;
use Session;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;


class admincontroller extends Controller
{
    public function admin_login(Request $request){
    	//dd($request->all());
    }

    public function admin_profile($email){
       $p = user::where('email',$email)->first();
       return view('admin.profile',['profile' => $p]);
    }

    public function admin_settings(){
        return view('admin.settings');
    }

    public function change_admin_username(Request $request){

        $result = DB::table('users')
            ->where('email',$request->Email)
            ->get();
        if (count($result)>0) {
            DB::table('users')
            ->where('email',$request->Email)
            ->update(['name' => $request->New_username]);

            return redirect('/admin_settings')->with('msg','DONE');
        }
        else{
            return redirect('/admin_settings')->with('msg','Username change FAIL . Email or Username is incorrect');
        }

        
        
    }

    public function change_admin_password(Request $request){

        $result = DB::table('users')
            ->where('email',$request->Email)
            ->get();
        if (count($result)>0) {

            $password = $request->New_password; // password is form field
            $hashed = Hash::make($password);

            DB::table('users')
                ->where('email',$request->Email)
                ->update(['password' => $hashed]);

            return redirect('/admin_settings')->with('msg1','DONE');
        }
        else{
            return redirect('/admin_settings')->with('msg1','Password change FAIL . Email or password is incorrect');
        }
    }

    public function change_admin_email(Request $request){

        $result = DB::table('users')
            ->where('email',$request->Email)
            ->get();
        if (count($result)>0) {

        DB::table('users')
            ->where('email',$request->Email)
            ->update(['email' => $request->New_email]);

        return redirect('/admin_settings')->with('msg2','DONE');
        }
        else{
            return redirect('/admin_settings')->with('msg2','Email change FAIL . Email is incorrect');
        }
        
    }
//SHOW FORM PAGE START......................................................
    public function about_school(){
        $about_school = about_us::all();
        return view('admin.forms.about_school',['about_school'=>$about_school]);

    }

    public function update_about_school_form_show($id){
        $update_about_school_id = about_us::where('id',$id)->first();
        $about_school = about_us::all();
        return view('admin.update.update_about_school',['update_about_school_id'=>$update_about_school_id],['about_school'=>$about_school]);
    }

    public function update_about_school(Request $request){
        $p = about_us::find($request->About_school_id);

        $about_school_logo = $request->file('Logo');
        if ($about_school_logo) {
            unlink('admin/upload_image/'.$p->Logo);
            $iname = $request->About_school_id.$about_school_logo->getClientOriginalName();
            $imagepath = 'admin/upload_image/';
            $about_school_logo->move($imagepath,$iname);
            $imageurl = $iname;
        }
        else{
            $imageurl = $p->Logo;
        }
        $p->School_name = $request->School_name?$request->School_name:$p->School_name;
        $p->Logo = $imageurl;
        $p->Slogan = $request->Slogan?$request->Slogan:$p->Slogan;
        $p->About_school = $request->About_school?$request->About_school:$p->About_school;
        
        $p->save();

        return redirect('/about_school')->with('msg','Done');
    }

    public function booklist(){
        return view('admin.forms.booklist');        
    }

    public function save_booklist(Request $request){
        $p = new booklist();

        $p->Class = $request->Class;
        $p->Session = $request->Session;
        
        $p->Pdf = 'pdf';
        $p->save();

        $lastid = $p->id;
        $spdf = $request->file('Booklist');
        $name = $lastid.$spdf->getClientOriginalName();

        $uploadpath = 'admin/upload_pdf/';
        $spdf->move($uploadpath,$name);
        $pdfurl = $name;

        $updatepdf = booklist::find($lastid);
        $updatepdf->Pdf = $pdfurl;
        $updatepdf->save();

        return redirect('/booklist')->with('msg','DONE');
    }

    public function new_notice_news_events(){
        return view('admin.forms.notice_news_events');
    }

     public function save_notice_news_events(Request $request){
        $p = new notice_news_events();

        $p->Type = $request->Type;
        $p->Title = $request->Title;
        
        $p->Pdf = 'pdf';
        $p->save();

        $lastid = $p->id;
        $spdf = $request->file('Pdf');
        $name = $lastid.$spdf->getClientOriginalName();

        $uploadpath = 'admin/upload_pdf/';
        $spdf->move($uploadpath,$name);
        $pdfurl = $name;

        $updatepdf = notice_news_events::find($lastid);
        $updatepdf->Pdf = $pdfurl;
        $updatepdf->save();

        return redirect('/new_notice_news_events')->with('msg','DONE');
    }

    public function result(){

        $result = DB::table('results')
                ->select('*')
                ->get();

        return view('admin.forms.result',['result'=>$result]);
    }
    public function save_result_info(Request $request){
        $request->session()->put('Class',$request->input('Class'));
        $request->session()->put('Session',$request->input('Session'));
        $request->session()->put('Examname',$request->input('Exam_name'));
        return redirect('/result')->with('Class',$request->session()->get('Class'));
        return redirect('/result')->with('Session',$request->session()->get('Session'));
        return redirect('/result')->with('Exam_name',$request->session()->get('Exam_name'));

    }

     public function save_result(Request $request){

        $class = $request->Class;
        $session = $request->Session;
        $exam_name = $request->Exam_name;

        $upload = $request->file('Result');
        $filepath = $upload->getRealPath();
        $file = fopen($filepath, 'r');
        $header = fgetcsv($file);
        //dd($h);
        $escapedheader = [];
        
        foreach ($header as $key => $value) {
            $lheader = strtolower($value);
            $escapeditem = preg_replace('/[^a-z]/', '', $lheader);
            //dd($escapeditem);
            array_push($escapedheader, $escapeditem);
         }
         //dd($escapedheader);

         while ($columns = fgetcsv($file)) {
             if ($columns[0]=="") {
                 continue;
            }
             
            $data = array_combine($escapedheader, $columns);

            $name = $data["name"];  
            $roll = $data["roll"];

            $bangla1 = $data["banglaone"];
            $bangla2 = $data["banglatwo"];
            $english1 = $data["englishone"];
            $english2 = $data["englishtwo"];
            $general_math = $data["generalmath"];
            $ict = $data["ict"];
            $religion = $data["religion"];
            $socialscience = $data["socialscience"];

            $physics = $data["physics"];
            $chemistry = $data["chemistry"];
            $biology = $data["biology"];

            $science = $data["science"];

            $highermath = $data["highermath"];
            $home_economics = $data["homeeconomics"];
            $agriculture = $data["agriculture"];

            $pouroniti = $data["pouroniti"];
            $vugol = $data["vugol"];
            $economics = $data["economics"];
            
            $finance = $data["finance"];
            $babsa_uddog = $data["babsauddog"];
            $hisab_biggan = $data["hisabbiggan"];
            $grade = $data["grade"];

            $p = new result();

            $p->Exam_name = $exam_name;
            $p->Class = $class;
            $p->Session = $session;
            
            $p->Name = $name;
            $p->Roll = $roll;
            
            $p->Bangla_1st = $bangla1;
            $p->Bangla_2nd = $bangla2;
            $p->English_1st = $english1;
            $p->English_2nd = $english2;
            $p->General_math = $general_math;
            $p->Ict = $ict;
            $p->Religion = $religion;
            $p->Socialscience = $socialscience;

            $p->Physics = $physics;
            $p->Chemistry = $chemistry;
            $p->Biology = $biology;

            $p->Science = $science ;

            $p->Highermath = $highermath;
            $p->Home_economics = $home_economics ;
            $p->Agriculture = $agriculture ;
           
            $p->Pouroniti = $pouroniti ;
            $p->Vugol = $vugol ;
            $p->Economics = $economics ;

            $p->Finance = $finance ;
            $p->Babsa_uddog = $babsa_uddog ;
            $p->Hisab_biggan = $hisab_biggan ;
            
            $p->Total = $bangla1+$bangla2+$english1+$english2+$general_math+$ict+$religion+$socialscience+$physics+$chemistry+$biology+$science+$highermath+$home_economics+$agriculture+$pouroniti+$vugol+$economics+$finance+$babsa_uddog+$hisab_biggan;
            $p->Grade = $grade;          
            $p->save();
            
         }
         return redirect('/result')->with('msg','DONE');
    }
    

    public function export_result(){
        return view('admin.csv.exportresult');
    }

    public function export_result_csv(Request $request){

        session(["class"=>$request->input('Class')]);
        session(["session"=>$request->input('Session')]);
        session(["exam_name"=>$request->input('Exam_name')]);

        $result = DB::table('results')
        ->where('Class',$request->Class)
        ->where('Session',$request->Session)
        ->where('Exam_name',$request->Exam_name)
        ->orderBy('Roll','asc')
        ->get();

         return view('admin.csv.export_result_csv',['result'=>$result]);

     }

    public function download_result(Request $request){

        $class = session("class");
        $session = session("session");
        $exam_name = session("exam_name");

        $result = DB::table('results')->select('*')
        ->where('Class',$class)
        ->where('Session',$session)
        ->where('Exam_name',$exam_name)
        ->orderBy('Roll','asc')
        ->get();

        $school = DB::table('about_uses')->first();

        $pdf = PDF::loadView('admin.csv.download_result', array('result'=>$result, 'school'=>$school, 'exam_name'=>$exam_name, 'class'=>$class, 'session'=>$session));
 
        $pdf->save(storage_path().'_filename.pdf');
 
        return $pdf->download('Result of "'.$exam_name.'"Class"'.$class.'"Session"'.$session.'.pdf');
        
    }

    public function board_result(){
        return view('admin.forms.board_result');
    }

    public function save_board_result(Request $request){
        $p = new board_result();

        $p->Year = $request->Year;
        $p->Exam_type = $request->Exam_type;
        $p->Total_student = $request->Total_student;
        $p->Pass = $request->Pass;
        $p->Fail = $request->Fail;
        $p->A_plus = $request->A_plus;
        $p->Percentage = $request->Percentage;
        $p->save();

        return redirect('/board_result')->with('msg','DONE');
    }

    public function routine(){
        return view('admin.forms.routine');
    }

    public function save_routine(Request $request){
        $p = new routine();

        $p->Class = $request->Class;
        $p->Session = $request->Session;
        $p->Section = $request->Section ? $request->Section:'';
        
        $p->Pdf = 'pdf';
        $p->save();

        $lastid = $p->id;
        $spdf = $request->file('Routine');
        $name = $lastid.$spdf->getClientOriginalName();

        $uploadpath = 'admin/upload_pdf/';
        $spdf->move($uploadpath,$name);
        $pdfurl = $name;

        $updatepdf = routine::find($lastid);
        $updatepdf->Pdf = $pdfurl;
        $updatepdf->save();

        return redirect('/routine')->with('msg','DONE');
    }

    public function show_all_routine(){
        $p = routine::all();
        return view('admin.forms.all_routine',['routine'=>$p]);
    }

    public function update_routine_form($id){
        $update_routine_id = routine::where('id',$id)->first();
        return view('admin.update.update_routine',['update_routine_id'=> $update_routine_id]);
    }

    public function update_routine(Request $request){
        $p = routine::find($request->Routine_id);

        $rpdf = $request->file('Routine');
        if ($rpdf) {
            unlink('admin/upload_pdf/'.$p->Pdf);
            $name = $p->id.$rpdf->getClientOriginalName();
            $uploadpath = 'admin/upload_pdf/';
            $rpdf->move($uploadpath,$name);
            $pdfurl = $name;

        }
        else{
            $pdfurl = $p->Pdf ; 
        }
        $p->Class = $request->Class ? $request->Class:$p->Class;
        $p->Session = $request->Session ? $request->Session:$p->Session;
        $p->Section = $request->Section ? $request->Section:$p->Section;
        $p->Pdf = $pdfurl;
        $p->save();
       
        return redirect('/show_all_routine')->with('msg','DONE');
    }

    public function speech(){
        $speech = speech::all();
        return view('admin.forms.speech',['speech'=>$speech]);
    }

    public function update_speech_form_show($id){
        $update_speech_id = speech::where('id',$id)->first();
        $speech = about_us::all();
        return view('admin.update.update_speech',array('update_speech_id'=>$update_speech_id,'speech'=>$speech));
    }
    public function update_speech(Request $request){
        $p = speech::find($request->speech_id);

        $speaker_image = $request->file('Speaker_image');
        if ($speaker_image) {
            unlink('admin/upload_image/'.$p->Speaker_image);
            $iname = $request->speech_id.$speaker_image->getClientOriginalName();
            $imagepath = 'admin/upload_image/';
            $speaker_image->move($imagepath,$iname);
            $imageurl = $iname;
        }
        else{
            $imageurl = $p->Speaker_image;
        }
        $p->Speaker_name = $request->Speaker_name;
        $p->Designation = $request->Designation;
        $p->Speaker_image = $imageurl;
        $p->speech = $request->Speech;
        
        $p->save();

        return redirect('/speech')->with('msg','DONE');
    }

    public function student_profile(){
        return view('admin.forms.students_profile');
    }

    public function save_students_info(Request $request){
                
        $class = $request->Class;
        $for_student_id = DB::table('admission_ids')
                    ->where('Class', $class)
                    ->first();
        $Student_id = $for_student_id->Last_id+1;

        $sinfo = new students_information();

        $password = $Student_id; 
        $hashed = Hash::make($password);

        $adil_id = $Student_id;
        $adil_name = $request->Nick_name;
        $adil_pass = $hashed;
        $class = $request->Class;

        $make_arr = array('Username' => $adil_name, 'Password'=>$adil_pass, 'Student_id'=>$adil_id);
        DB::table('students_login_infos')->insert($make_arr);
        
        DB::table('admission_ids')
            ->where('Class', $class)
            ->update(['Last_id' => $adil_id]);
            
        $sinfo->final = "no";
        $sinfo->Name = $request->Name;
        $sinfo->Nick_name = $request->Nick_name;
        $sinfo->Student_id = $Student_id;
        $sinfo->Class = $request->Class;
        $sinfo->Session = $request->Session;
        $sinfo->Section = '';
        $sinfo->Previous_school = $request->Previous_school;
        $sinfo->Psc_grade = $request->Psc_grade ;
        $sinfo->Jsc_grade = $request->Jsc_grade ;
      
        $sinfo->Department = $request->Department ;
        $sinfo->Birth_date = $request->Birth_date;
        $sinfo->Gender = $request->Gender;
        $sinfo->Blood_group = $request->Blood_group;
        $sinfo->Religion = $request->Religion;
        $sinfo->Physically_challenged = $request->Physically_challenged;
        $sinfo->Address = $request->Address;
        $sinfo->Mobile_no = $request->Mobile_no;
        $sinfo->Email = $request->Email;
        
       
        $sinfo->remember_token = $request->_token;
        
        $sinfo->Extra_activities = $request->Extra_activities;
       
        $sinfo->Fathers_name = $request->Fathers_name;
        $sinfo->Fathers_mobile_no = $request->Fathers_mobile_no ;
        $sinfo->Fathers_occupation = $request->Fathers_occupation ;
        $sinfo->Mothers_name = $request->Mothers_name;
        $sinfo->Mothers_mobile_no = $request->Mothers_mobile_no ;
        $sinfo->Mothers_occupation = $request->Mothers_occupation ;

        $sinfo->save();


        $lastid = $sinfo->id;
        $simage = $request->file('Image');
        if ($simage) {

            $name = $lastid.$simage->getClientOriginalName();
            $uploadpath = 'admin/upload_image/';
            $simage->move($uploadpath,$name);
            $imageurl = $name;

            $updateimage = students_information::find($lastid);
            $updateimage->Image = $imageurl;
            $updateimage->save();
        }
            
            return redirect('/student_profile')->with('msg','DONE');
        
    }

    public function present_students(){
        return view('admin.forms.present_students');
    }

    public function save_present_students(Request $request){
        
        $class = $request->Class;
        $session = $request->Session;
        $section = $request->Section ? $request->Section:'';

        $result = DB::table('present_students')
        ->where('Class',$class)
        ->where('Session',$session)
        ->where('Section',$section)
        ->delete();

        $upload = $request->file('Students');
        $filepath = $upload->getRealPath();
        $file = fopen($filepath, 'r');
        $header = fgetcsv($file);

        $escapedheader = [];
        
        foreach ($header as $key => $value) {
            $lheader = strtolower($value);
            $escapeditem = preg_replace('/[^a-z]/', '', $lheader);
            //dd($escapeditem);
            array_push($escapedheader, $escapeditem);
        }
         //dd($escapedheader);

         while ($columns = fgetcsv($file)) {
             if ($columns[0]=="") {
                 continue;
            }
             
            $data = array_combine($escapedheader, $columns);
         

            $name = $data["name"]; 
            $roll = $data["roll"];
           
            $p = new present_students();

            $p->Class = $class;
            $p->Session = $session;
            $p->Section = $section;
            $p->Name = $name;
            $p->Roll = $roll;
           
            $p->save();
           
         }
          return redirect('/present_students')->with('msg','DONE');
    }

    public function export_attendence(){
        return view('admin.csv.export_attendence');
    }

    public function export_attendence_fatch(Request $request){
        session(["class"=>$request->input('Class')]);
        session(["session"=>$request->input('Session')]);
        session(["month"=>$request->input('Month')]);

        $class = $request->Class;
        $session = $request->Session;
        $date = $request->Month;
        $date = explode('-', $date);
        $year = $date[0];
        $month = $date[1];

        $result = DB::table('attendences')
                ->groupBy('Roll')
                ->having('Class',$class)
                ->having('Session',$session)
                ->orderBy('Roll','asc')
                ->get();
        $i = 0;
        $attendence = array();
        foreach ($result as $p) {
            $roll = $p->Roll;
            $attendence[$roll] = DB::select("select count(P_A) as c from attendences where month(Date) = '$month' AND year(Date) = '$year' AND Class = '$class' AND Session = '$session' And Roll = '$roll' AND P_A = 'yes' ");

        }

        session(["result"=>$result]) ;
        session(["attendence"=>$attendence]);
       return view('admin.csv.export_attendence_fetch',array('result'=>$result, 'attendence'=>$attendence));
    }

    public function download_attendence(){

        $class = session("class");
        $session = session("session");
        $month = session("month");
        $school = DB::table('about_uses')->first();

        $result = session("result");
        $attendence = session("attendence");
    
        $pdf = PDF::loadView('admin.csv.download_attendence',array('result'=>$result, 'attendence'=>$attendence, 'school'=>$school, 'class'=>$class, 'session'=>$session, 'month'=>$month));
    
        $pdf->save(storage_path().'_filename.pdf');
    
        return $pdf->download('attendence of "'.$month.'"class"'.$class.'.pdf');
    }

    public function students_due(){
        return view('admin.forms.students_due');
    }

    public function save_students_due(Request $request){

        $class = $request->Class;
        $session = $request->Session;

        $result = DB::table('students_dues')
        ->where('Class',$class)
        ->where('Session',$session)
        ->delete();

        $upload = $request->file('Students_due');
        $filepath = $upload->getRealPath();
        $file = fopen($filepath, 'r');
        $header = fgetcsv($file);
        //dd($h);
        $escapedheader = [];
        
        foreach ($header as $key => $value) {
            $lheader = strtolower($value);
            $escapeditem = preg_replace('/[^a-z]/', '', $lheader);
            //dd($escapeditem);
            array_push($escapedheader, $escapeditem);
         }
         //dd($escapedheader);

         while ($columns = fgetcsv($file)) {
             if ($columns[0]=="") {
                 continue;
            }
             
            $data = array_combine($escapedheader, $columns);
         
            $roll = $data["roll"];
            $name = $data["name"]; 
            $monthly_due = $data["monthly"];
            $exam_due = $data["examdue"];
            $other = $data["other"];
           
            $p = new students_due();

            $p->Class = $class;
            $p->Session = $session;
            $p->Roll = $roll;
            $p->Name = $name;
            $p->Monthly_due = $monthly_due ;
            $p->Exam_due = $exam_due ;
            $p->other = $other ; 

           
            $p->save();
           
         }
          return redirect('/students_due')->with('msg','DONE');
    }

     public function export_due(){
        return view('admin.csv.export_due');
    }

    public function export_due_csv(Request $request){

        $class1 = $request->Class;
        $session1 = $request->Session;

        session(["class"=>$request->input('Class')]);
        session(["session"=>$request->input('Session')]);

        $result = DB::table('students_dues')
        ->where('Class',$request->Class)
        ->where('Session',$request->Session)
        ->orderBy('Roll','asc')
        ->get();

        session(["result"=>$result]);
        return view('admin.csv.export_due_csv',array('result'=>$result, 'class1'=>$class1, 'session1'=>$session1));
    }

    public function download_students_due(Request $request){


        $class = session("class");
        $session = session("session");
        $school = DB::table('about_uses')->first();
        $result = session("result");
   
        $pdf = PDF::loadView('admin.csv.download_due',array('result'=>$result, 'school'=>$school, 'class'=>$class, 'session'=>$session));
    
        $pdf->save(storage_path().'_filename.pdf');
    
        return $pdf->download('Due of "'.$session.'"class"'.$class.'.pdf');
    }

    public function syllabus(){
        return view('admin.forms.syllabus');
    }

    public function save_syllabus(Request $request){
        $p = new yearly_syllabus();

        $p->Class = $request->Class;
        $p->Session = $request->Session;
        
        $p->Pdf = 'pdf';
        $p->save();

        $lastid = $p->id;
        $spdf = $request->file('Syllabus');
        $name = $lastid.$spdf->getClientOriginalName();

        $uploadpath = 'admin/upload_pdf/';
        $spdf->move($uploadpath,$name);
        $pdfurl = $name;

        $updatepdf = yearly_syllabus::find($lastid);
        $updatepdf->Pdf = $pdfurl;
        $updatepdf->save();

        return redirect('/syllabus')->with('msg','DONE');
    }

    public function show_all_syllabus(){
        $p = yearly_syllabus::all();
        return view('admin.forms.all_syllabus',['syllabus'=>$p]);
    }

    public function update_syllabus_form($id){
        $update_syllabus_id = yearly_syllabus::where('id',$id)->first();
        return view('admin.update.update_syllabus',['update_syllabus_id'=> $update_syllabus_id]);
    }

    public function update_syllabus(Request $request){
        $p = yearly_syllabus::find($request->Syllabus_id);

        $spdf = $request->file('Syllabus');
        if ($spdf) {
            unlink('admin/upload_pdf/'.$p->Pdf);
            $name = $p->id.$spdf->getClientOriginalName();
            $uploadpath = 'admin/upload_pdf/';
            $spdf->move($uploadpath,$name);
            $pdfurl = $name;

        }
        else{
            $pdfurl = $p->Pdf ; 
        }
        $p->Class = $request->Class ? $request->Class:$p->Class;
        $p->Session = $request->Session ? $request->Session:$p->Session;
        $p->Pdf = $pdfurl;
        $p->save();
       
        return redirect('/show_all_syllabus')->with('msg','DONE');
    }

    public function teachers_staffs_profile(){
        return view('admin.forms.teachers_profile');        
    }

    public function save_teachers_staffs_info(Request $request){

        $tsinfo = new teachers_staffs_info();

        $password = $request->Employee_id; // password is form field
        $hashed = Hash::make($password);

        $adil_id = $request->Employee_id;
        $adil_name = $request->Name;
        $adil_pass = $hashed;

        $make_arr = array('Username' => $adil_name, 'Password'=>$adil_pass, 'Employee_id'=>$adil_id);
        DB::table('teachers_login_infos')->insert($make_arr);


        $tsinfo->Teacher_Staff = $request->Teacher_Staff;
        $tsinfo->Name = $request->Name;
        $tsinfo->Nick_name = $request->Nick_name;
        $tsinfo->Father_name = $request->Father_name;
        $tsinfo->Mother_name = $request->Mother_name;
        $tsinfo->Birth_date = $request->Birth_date;
        $tsinfo->Gender = $request->Gender;
        $tsinfo->Blood_group = $request->Blood_group;
        $tsinfo->Mobile_no = $request->Mobile_no;
        $tsinfo->Address = $request->Address;
        $tsinfo->District = $request->District;
        $tsinfo->Division = $request->Division;
        $tsinfo->Nationality = $request->Nationality;
        $tsinfo->Image = '';
        $tsinfo->Employee_id = $request->Employee_id;
        $tsinfo->Designation = $request->Designation;
        $tsinfo->Other_role = $request->Other_role;
        $tsinfo->Qualification = $request->Qualification;
        $tsinfo->Specialized_Subject = $request->Specialized_Subject;
        $tsinfo->Gmail_account = $request->Gmail_account;
        $tsinfo->Google_drive = $request->Google_drive;
        $tsinfo->Social_media = $request->Social_media;
        $tsinfo->Join_date = $request->Join_date;
        $tsinfo->Ssc = $request->Ssc ;
        $tsinfo->Hsc = $request->Hsc ;
        $tsinfo->Faculty = $request->Faculty ;
        $tsinfo->C_U = $request->C_U ;
        $tsinfo->Degree = $request->Degree ;
        $tsinfo->Training = $request->Training ;
        $tsinfo->Other = $request->Other ;
        
        $tsinfo->save();

        $lastid = $tsinfo->id;
        $tsimage = $request->file('Image');
        if ($tsimage) {
            
            $name = $lastid.$tsimage->getClientOriginalName();
            $uploadpath = 'admin/upload_image/';
            $tsimage->move($uploadpath,$name);
            $imageurl = $name;

            $updateimage = teachers_staffs_info::find($lastid);
            $updateimage->Image = $imageurl;
            $updateimage->save();
        }
        

        return redirect('/teachers_staffs_profile')->with('msg','DONE');
    }

    public function change_teachers_staffs_profile(){

        $teachers_staffs_profile = teachers_staffs_info::all();
        return view('admin.forms.change_teachers_staffs_profile',['teachers_staffs_profile'=>$teachers_staffs_profile]);

    }

    public function update_teachers_staffs_profile_form_show($id){

        $update_teachers_staffs_profile_id = teachers_staffs_info::where('id',$id)->first();
        $teachers_staffs_profile = teachers_staffs_info::all();
        return view('admin.update.update_teachers_staffs_profile',['update_teachers_staffs_profile_id'=>$update_teachers_staffs_profile_id],['teachers_staffs_profile' =>$teachers_staffs_profile]);

    }

    public function update_teachers_staffs_profile(Request $request){
        $p = teachers_staffs_info::find($request->teachers_staffs_profile_id);

        $teachers_staffs_profile_photo = $request->file('Image') ? $request->file('Image'):'';


        if ($teachers_staffs_profile_photo) {

            if ($p->Image === '') {
               
                $iname = $request->teachers_staffs_profile_id.$teachers_staffs_profile_photo->getClientOriginalName();
                $imagepath = 'admin/upload_image/';
                $teachers_staffs_profile_photo->move($imagepath,$iname);
                $imageurl = $iname;
            }
            else{
                unlink('admin/upload_image/'.$p->Image);
                $iname = $request->teachers_staffs_profile_id.$teachers_staffs_profile_photo->getClientOriginalName();
                $imagepath = 'admin/upload_image/';
                $teachers_staffs_profile_photo->move($imagepath,$iname);
                $imageurl = $iname;
            }
           
        }
        else{
            $imageurl = $p->Image;
        }

        $p->Teacher_Staff = $request->Teacher_Staff ? $request->Teacher_Staff:$p->Teacher_Staff;
        $p->Name = $request->Name ? $request->Name:$p->Name;
        $p->Nick_name = $request->Nick_name ? $request->Nick_name:$p->Nick_name;
        $p->Father_name = $request->Father_name ? $request->Father_name:$p->Father_name;
        $p->Mother_name = $request->Mother_name ? $request->Mother_name:$p->Mother_name;
        $p->Birth_date = $request->Birth_date ? $request->Birth_date:$p->Birth_date;
        $p->Gender = $request->Gender ? $request->Gender:$p->Gender;
        $p->Blood_group = $request->Blood_group ? $request->Blood_group:$p->Blood_group;
        $p->Mobile_no = $request->Mobile_no ? $request->Mobile_no:$p->Mobile_no;
        $p->Address = $request->Address ? $request->Address:$p->Address;
        $p->District = $request->District ? $request->District:$p->District;
        $p->Division = $request->Division ? $request->Division:$p->Division;
        $p->Nationality = $request->Nationality ? $request->Nationality:$p->Nationality;
        $p->Image =$imageurl;
        $p->Employee_id = $request->Employee_id ? $request->Employee_id:$p->Employee_id;
        $p->Designation = $request->Designation ? $request->Designation:$p->Designation;
        $p->Other_role = $request->Other ? $request->Other:$p->Other_role;
        $p->Qualification = $request->Qualification ? $request->Qualification:$p->Qualification;
        $p->Specialized_Subject = $request->Specialized_Subject ? $request->Specialized_Subject:$p->Specialized_Subject;
        $p->Gmail_account = $request->Gmail_account ? $request->Gmail_account:$p->Gmail_account;
        $p->Google_drive = $request->Google_drive ? $request->Google_drive:$p->Google_drive;
        $p->Social_media = $request->Social_media ? $request->Social_media:$p->Social_media;
        $p->Join_date = $request->Join_date ? $request->Join_date:$p->Join_date;
        $p->Ssc = $request->Ssc  ? $request->Ssc:$p->Ssc;
        $p->Hsc = $request->Hsc  ? $request->Hsc:$p->Hsc;
        $p->Faculty = $request->Faculty  ? $request->Faculty:$p->Faculty;
        $p->C_U = $request->C_U  ? $request->C_U:$p->C_U;
        $p->Degree = $request->Degree  ? $request->Degree:$p->Degree;
        $p->Training = $request->Training  ? $request->Training:$p->Training;
        $p->Other = $request->Other  ? $request->Other:$p->Other;

        $p->save();

        return redirect('/change_teachers_staffs_profile')->with('msg','DONE');
    }

    public function ebook(){
        return view('admin.forms.ebook');
    }

    public function save_ebook(Request $request){
        $p = new ebook();
        $q =  ebook::all()->last();
        if ($q == null) {
            $lastid = 0;
        }
        else{
            $lastid = $q->id;
        }
       
        $Ebook = $request->Ebook;  
            
        $destinationPath = 'admin/upload_pdf/';
        $filename = $lastid.$Ebook->getClientOriginalName();
        $Ebook->move($destinationPath, $filename);
        $fullPath = $filename;
        
        $p->Name = $request->Name;
        $p->Ebook = $fullPath;
        $p->save();

        return redirect('/ebook')->with('msg','DONE');
    }

    public function image_gallery(){
        return view('admin.forms.image_gallery');
    }

    public function save_image_gallery(Request $request){
        $p =  image_gallery::all()->last();
        if ($p == null) {
            $lastid = 0;
        }
        else{
            $lastid = $p->id;
        }

        if($request->hasFile('Image')){
            foreach($request->file('Image') as $image)
            {
                $destinationPath = 'admin/upload_image/';
                $filename = $lastid.$image->getClientOriginalName();
                $image->move($destinationPath, $filename);
                $fullPath = $filename;

                $make_arr = array('image' => $fullPath, 'selection' => 'not');
                DB::table('image_galleries')->insert($make_arr);      
            }
        }
       
        return redirect('/image_gallery')->with('msg','DONE');
    }

    public function show_images(){

        $images = DB::table('image_galleries')
                    ->orderBy('id','desc')
                    ->get();
        
        return view('admin.forms.show_images',['images' => $images]);

    }

    public function select_images(Request $request){

        $images = image_gallery::all();
        foreach ($images as $image) {
            $s = $image->id;
            $m = $request->$s;
            if ($m =='select') {
            
                DB::table('image_galleries')
                    ->where('id',$s)
                    ->update(['selection' => 'select']);
            }
            else{
                DB::table('image_galleries')
                    ->where('id',$s)
                    ->update(['selection' => 'not']);
            }
        }
        return back();
    }

    public function visit_student_profile(){
        $array=DB::table("students_informations")
            ->select('*')
            ->where('class','20')
            ->get();
        return view('admin.forms.visit_student_profile',['result'=>$array]);
    }

    public function view_student_profile(Request $request){
        
        if ($request->Student_id != null) {
            $result = DB::table('students_informations')
                    ->where('Student_id',$request->Student_id)
                    ->get();
        }
        else{

            $result = DB::table('students_informations')
                    ->where('class',$request->Class)
                    ->where('Roll',$request->Roll)
                    ->where('Session',$request->Session)
                    ->get();

        }
        if (count($result)>0){
            return view('admin.forms.visit_student_profile',['result'=>$result]);
        }
        else{
            return redirect('/visit_student_profile')->with('msg', 'Wrong info or Data is not updated');
        }
    }

    public function footer(){

        $p = link::all();
        return view('admin.forms.footer',['links'=>$p]);

    }

    public function update_link_page($id){
        $update_link_id = link::where('id',$id)->first();
        $link =link::all();
        return view('admin.update.update_link',['update_link_id'=>$update_link_id],['link'=>$link]);
    }

    public function update_link(Request $request){
        $p = link::find($request->Link_id);

        $p->Link_name = $request->Link_name;
        $p->Link = $request->Link_url;
        $p->save();

        return redirect('/footer')->with('msg','DONE');
    }

    public function committe_profile(){
        return view('admin.forms.committe_profile');
    }

    public function save_committe_profile(Request $request){
        $p = new committe();

        $p->Name = $request->Name ;
        $p->Designation = $request->Designation ;
        $p->Address = $request->Address ;
        $p->Image = '';
        
        $p->save();

        $lastid = $p->id;
        $pimage = $request->file('Image');
        if ($pimage) {
            
            $name = $lastid.$pimage->getClientOriginalName();
            $uploadpath = 'admin/upload_image/';
            $pimage->move($uploadpath,$name);
            $imageurl = $name;

            $updateimage = committe::find($lastid);
            $updateimage->Image = $imageurl;
            $updateimage->save();
        }

        return redirect('/committe_profile')->with('msg','DONE');
    }

    public function show_committe_profile(){
        $committe = committe::all();
        return view('admin.forms.show_committe_profile',['committe'=>$committe]);
    }

    public function update_committe_profile_form($id){
        $update_committe_id = committe::where('id',$id)->first();

        return view('admin.update.update_committe_profile',['update_committe_id'=>$update_committe_id]);
    }

    public function update_committe_profile(Request $request){
        $p = committe::find($request->Committe_id);
        
        $committe_photo = $request->file('Image');


        if ($committe_photo) {

            if ($p->Image === '') {
               
                $iname = $request->Committe_id.$committe_photo->getClientOriginalName();
                $imagepath = 'admin/upload_image/';
                $committe_photo->move($imagepath,$iname);
                $imageurl = $iname;
            }
            else{
                unlink('admin/upload_image/'.$p->Image);
                $iname = $request->Committe_id.$committe_photo->getClientOriginalName();
                $imagepath = 'admin/upload_image/';
                $committe_photo->move($imagepath,$iname);
                $imageurl = $iname;
            }
           
        }
        else{
            $imageurl = $p->Image;
        }

        $p->Name = $request->Name ? $request->Name:$p->Name;
        $p->Designation = $request->Designation?$request->Designation:$p->Designation;
        $p->Address = $request->Address ? $request->Address:$p->Address;
        $p->Image =$imageurl;
       
        $p->save();

        return redirect('/show_committe_profile')->with('msg','DONE');

    }

    public function contact_info(){
        return view('admin.forms.contact_info');
    }

    public function save_contact_info(Request $request){

        $p = new contact_info();
        $q = DB::table('contact_infos')->first();

        $p->Address = $request->Address ? $request->Address : $q->Address;
        $p->Mobile = $request->Mobile ? $request->Mobile : $q->Mobile ;
        $p->Telephone = $request->Telephone ? $request->Telephone : $q->Telephone ;
        $p->Email = $request->Email ? $request->Email : $q->Email ;
        $p->Fax = $request->Fax ? $request->Fax : $q->Fax ;

        DB::table('contact_infos')
        ->delete();

        $p->save();

        return redirect('/contact_info')->with('msg','DONE');
    }

    public function ex_students(){
        $p = ex_student::all();
        return view('admin.forms.ex_students',['ex_students'=>$p]);
    }

    public function update_ex_student_form($id){
        $ex_student_id = ex_student::where('id',$id)->first();
        return view('admin.update.update_ex_student',['ex_student_id'=> $ex_student_id]);
    }

    public function update_ex_student(Request $request){
        
        $p = ex_student::find($request->Ex_student_id);

        $image = $request->file('Image');
        if ($image) {
            unlink('admin/upload_image/'.$p->Image);
            $iname = $request->ex_student_id.$image->getClientOriginalName();
            $imagepath = 'admin/upload_image/';
            $image->move($imagepath,$iname);
            $imageurl = $iname;
        }
        else{
            $imageurl = $p->Image;
        }
        $p->Name = $request->Name ? $request->Name : $p->Name;
        $p->Present_status = $request->Present_status? $request->Present_status : $p->Present_status;
        $p->speech = $request->Speech? $request->Speech : $p->Speech;
        $p->Image = $imageurl;
        
        
        $p->save();

        return redirect('/ex_students')->with('msg','DONE');

    }

}
