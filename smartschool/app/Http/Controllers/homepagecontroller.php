<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\result;
use App\about_us;
use App\speech;
use App\notice_news_events;
use App\teachers_staffs_info;
use App\students_login_info;
use App\students_information;
use App\teachers_login_info;
use App\students_id;
use App\image_gallery;
use App\ebook;
use App\committe;
use App\board_result;
use App\present_students;
use App\ex_student;
use App\link;
use App\contact_info;
use DB;
use Response;
use DateTime;
use Carbon\Carbon;
use Barryvdh\DomPDF\Facade as PDF;
use Session;

class homepagecontroller extends Controller
{
    public function homepage(){
        $about_us = DB::table('about_uses')->first();
        $speech = speech::all();
        $notice = DB::table('notice_news_events')
                    ->where('Type','Notice')
                    ->orderBy('id','desc')
                    ->get();
        $news = DB::table('notice_news_events')
                    ->where('Type','News')
                    ->orderBy('id','desc')
                    ->get();
        $event = DB::table('notice_news_events')
                    ->where('Type','Events')
                    ->orderBy('id','desc')
                    ->get();
        $nne = notice_news_events::orderBy('id', 'desc')->take(5)->get();
        $teachers = DB::table('teachers_staffs_infos')
                    ->where('Teacher_Staff','Teacher')
                    ->orderBy('id','asc')
                    ->take(5)
                    ->get();

        $ex_students = ex_student::all();
        $links = link::all();
        $contact_infos = contact_info::all();

        $present_students = present_students::get()->count();
        $total_students = students_information::get()->count();
        $total_teacher = teachers_staffs_info::where('Teacher_Staff','Teacher')->get()->count();
        $total_staff = teachers_staffs_info::where('Teacher_Staff','Staff')->get()->count();

        session(["about_us"=>$about_us]);
        session(["links"=>$links]);
        session(["contact_infos"=>$contact_infos]);

        $image = DB::table('image_galleries')->select('*')->where('selection','select')->get();
        
        return view('user.home.homecontent',array('about_us'=>$about_us,'speeches'=>$speech,'notices'=>$notice,'news'=>$news,'events'=>$event,'image'=>$image, 'present_students'=>$present_students, 'total_students'=>$total_students ,'total_teacher'=>$total_teacher ,'total_staff'=>$total_staff, 'nne'=>$nne, 'teachers'=>$teachers, 'ex_students'=>$ex_students, 'links'=>$links,'contact_infos'=>$contact_infos ));
    }

    public function show_nne($id){

        $nne =notice_news_events::where('id', '=', $id)->first();
        return view('user.home.nne',['nne'=>$nne]);
    }

    public function show_result_page(){
        $about_us = session("about_us");
        $links = link::all();
        $contact_infos = contact_info::all();

    	return view('user.home.result.show_result_page',array('about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));
    }

    public function show_result(Request $request){
    	$p = new result();
        $about_us = session("about_us");

        $class = $request->Class;
        $session = $request->Session;
        $roll= $request->Roll;
        session(['class'=>$class]);
        session(['session'=>$session]);
        session(['roll'=>$roll]);

    	$result = DB::table('results')->select('*')
        ->where('Class',$request->Class)
        ->where('Session',$request->Session)
        ->where('Exam_name',$request->Exam_name)
        ->where('Roll',$request->Roll)
        ->get();

        session(["student_result"=>$result]);
        return view('user.home.result.export_result',array('student_result'=>$result,'about_us'=>$about_us));
    }

    public function download_result(){
        $about_us = session("about_us");
        $student_result = session("student_result");

        $class = session("class");
        $session = session("session");
        $roll = session("roll");

        $pdf = PDF::loadView('user.home.result.download_result',array('student_result'=>$student_result,'about_us'=>$about_us));

        $pdf->save(storage_path().'_filename.pdf');

        return $pdf->download('Result of Roll "'.$roll.'"Class"'.$class.'"Session"'.$session.'.pdf');
    }

//////////////////////////////////STUDENT START//////////////////////////////////////////////////

    public function student_login_page(){
        $about_us = session("about_us");
        $links = link::all();
        $contact_infos = contact_info::all();
        return view('user.home.student_login_page',array('about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));
    }

    public function student_login(Request $request){

        $user = students_login_info::where('Student_id', '=', $request->Student_id)->first();
        if ($user != null) {
            if(Hash::check($request->Password, $user->Password)){
                $result = DB::table('students_login_infos')->select('*')
                ->where('Student_id',$request->Student_id)
                ->get();

                if(count($result)>0){

                    foreach ($result as $p) {
                        $result1 = DB::table('students_informations')->select('*')
                        ->where('Student_id',$p->Student_id)
                        ->get(); 
                    }
                    foreach ($result1 as $q) {
                       session(["id"=>$q->id]);
                       $class = $q->Class;
                       $section = $q->Section;
                       $session = $q->Session;
                       $roll = $q->Roll;

                    }
                    
                    session(["result1"=>$result1]);

                    $date = Carbon::now();
                    $year = $date->year;

                    $routine = DB::table('routines')
                            ->where('Session', $year )
                            ->where('Class',$class)
                            ->where('Section',$section)
                            ->get();

                    session(["routine"=>$routine]); 

                    $syllabus = DB::table('yearly_syllabi')
                            ->where('Session', $year )
                            ->where('Class',$class)
                            ->get();

                    session(["syllabus"=>$syllabus]);   

                    $booklist = DB::table('booklists')
                            ->where('Session', $year )
                            ->where('Class',$class)
                            ->get();

                    session(["booklist"=>$booklist]); 

                    $dues = DB::table('students_dues')
                            ->where('Session', $session )
                            ->where('Class',$class)
                            ->where('Roll',$roll)
                            ->get();
                    session(["dues"=>$dues]);

                    return view('user.home.student.facility',array('student_info'=>$result1, 'routine'=>$routine, 'syllabus'=>$syllabus, 'booklist'=>$booklist, 'dues'=>$dues));
                }
            
            }
            return redirect('/student_login_page')->with('msg','Student ID and password didn`t match');
        }
        else {
               return redirect('/student_login_page')->with('msg','Student ID and password didn`t match');
            }
    }

    

    public function student_page(){

        $id = session("id");
        $result1 = session("result1");
        $routine = session("routine");
        $syllabus = session("syllabus");
        $booklist = session("booklist");
        $dues = session("dues");
        if($id != null && $result1 != null){

            return view('user.home.student.facility',array('student_info'=>$result1, 'routine'=>$routine, 'syllabus'=>$syllabus, 'booklist'=>$booklist,'dues'=>$dues));
        }
        else {
               return redirect('/student_login_page')->with('msg','logout');
        }
    }

    public function update_student_profile_page(){

        $id = session("id");
        $result1 = session("result1");

        if($id != null && $result1 != null){
            return view('user.home.student.update_profile',['id'=>$id],['student_info'=>$result1]);
        }
        else{
            return redirect('/student_login_page')->with('msg','logout');
        }
    }

    public function update_student_profile(Request $request){
        
        $id = session("id");
        $p = students_information::find($request->Id);

        $Pro_pic = $request->file('Pro_pic');
        if ($Pro_pic) {

            if ($p->Image) {
                unlink('admin/upload_image/'.$p->Image);
                $iname = $request->Id.$Pro_pic->getClientOriginalName();
                $imagepath = 'admin/upload_image/';
                $Pro_pic->move($imagepath,$iname);
                $imageurl = $iname;
            }
            else{
                $iname = $request->Id.$Pro_pic->getClientOriginalName();
                $imagepath = 'admin/upload_image/';
                $Pro_pic->move($imagepath,$iname);
                $imageurl = $iname;
            }
        }
        else{ 
            $imageurl = $p->Image;
        }
        $p->Name = $request->Name?$request->Name:$p->Name;
        $p->Nick_name = $request->Nick_name?$request->Nick_name:$p->Nick_name;
        $p->Image = $imageurl;
        $p->Class = $request->Class?$request->Class:$p->Class;
        $p->Section = $request->Section?$request->Section:$p->Section;
        $p->Roll = $request->Roll?$request->Roll:$p->Roll;
        
        $p->save();
        $result2 = DB::table('students_informations')
                    ->where('id',$id)
                    ->get();

        session()->forget('result1');
        session(["result1"=>$result2]);

        return redirect('/update_student_profile_page')->with('msg','DONE');
    }

     public function settings(){
        $id = session("id");
        $result1 = session("result1");

        if($id != null && $result1 != null){

            return view('user.home.student.settings',['id'=>$id],['student_info'=>$result1]);
        }
         else {
               return redirect('/student_login_page')->with('msg','logout');
            }
    }

    public function change_username(Request $request){

        $id = session("id");
        $result1 = session("result1");

        $result = DB::table('students_login_infos')
                ->where('Student_id',$request->Student_id)
                ->get();

        if (count($result)>0) {
            students_login_info::where('Student_id', '=', $request->Student_id)->update(array('Username' => $request->New_username));
    
            return redirect('/settings')->with('msg','DONE');
        }
        
        else{
            return redirect('/settings')->with('msg1','NOT DONE . INCORRECT STUDENT ID');
        }
    }

     public function change_password(Request $request){

        $id = session("id");
        $result1 = session("result1");

        $result = DB::table('students_login_infos')
                ->where('Student_id',$request->Student_id)
                ->get();

        if (count($result)>0) {
        $password = $request->New_password; // password is form field
        $hashed = Hash::make($password);

        students_login_info::where('Student_id', '=', $request->Student_id)->update(array('Password' => $hashed));

        return redirect('/settings')->with('msg','DONE');
        }
        else{
            return redirect('/settings')->with('msg','NOT DONE . INCORRECT STUDENT ID');
        }

    }

    public function studentlogout(Request $request){

        $id = session("id");
        session()->forget('student_info');
        session()->forget('id');
        session()->forget('student_id');
        session()->forget('password');

        return redirect('/student_login_page')->with('msg','logout');
    }
//////////////////////////////////STUDENT END//////////////////////////////////////////////////

   public function teacher_login_page(){

        $about_us = session("about_us");
        $links = link::all();
        $contact_infos = contact_info::all();
        return view('user.home.teacher_login_page',array('about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));
    }

    public function teacher_login(Request $request){
       
        $user = teachers_login_info::where('Employee_id', '=', $request->Employee_id)->first();

            if($user != null){

                if(Hash::check($request->Password, $user->Password)){

                    $t_result = DB::table('teachers_login_infos')
                    ->where('Employee_id',$request->Employee_id)
                    ->get();

                    if(count($t_result)>0){

                        foreach ($t_result as $p) {
                            $t_result1 = DB::table('teachers_staffs_infos')
                            ->where('Employee_id',$p->Employee_id)
                            ->get(); 
                        }
                        foreach ($t_result1 as $q) {
                           session(["t_id"=>$q->id]);
                           
                        }

                        session(["t_result1"=>$t_result1]);
                        $date = Carbon::now();
                        $year = $date->year;
                       
                        $syllabus = DB::table('yearly_syllabi')
                                    ->where('Session', $year )
                                    ->orderBy('Class','asc')
                                    ->get();
                        //dd($syllabus);
                        session(["syllabus"=>$syllabus]);

                        $routine = DB::table('routines')
                                    ->where('Session', $year )
                                    ->orderBy('Class','asc')
                                    ->get();
                        //dd($syllabus);
                        session(["routine"=>$routine]);

                        $booklist = DB::table('booklists')
                                    ->where('Session', $year )
                                    ->orderBy('Class','asc')
                                    ->get();
                        //dd($syllabus);
                        session(["booklist"=>$booklist]);
                        
                        return view('user.home.teacher.facility',array('teacher_info'=>$t_result1, 'syllabus'=>$syllabus, 'routine'=>$routine, 'booklist'=>$booklist ));
                    }
                }
                return redirect('/teacher_login_page')->with('msg','Employee Id and password didn`t match');
            }
            else {
               return redirect('/teacher_login_page')->with('msg','Employee Id and password didn`t match');
            }
    }   

    

    public function teacher_page(){

        $t_id = session("t_id");
        $t_result1 = session("t_result1");
        $syllabus = session("syllabus");
        $routine = session("routine");
        $booklist = session("booklist");

        if($t_id != null && $t_result1 != null){

            return view('user.home.teacher.facility',array('id'=>$t_id,'teacher_info'=>$t_result1,'syllabus'=>$syllabus,'routine'=>$routine, 'booklist'=>$booklist));
        }
         else {
               return redirect('/student_login_page')->with('msg','logout');
            }
    }

    public function update_teacher_profile_page(){

        $t_id = session("t_id");
        $t_result1 = session("t_result1");

        if($t_id != null && $t_result1 != null){
            return view('user.home.teacher.update_profile',['id'=>$t_id],['teacher_info'=>$t_result1]);
        }
        else{
               return redirect('/teacher_login_page')->with('msg','logout');
            }
    }

    public function update_teacher_profile(Request $request){

        $t_id = session("t_id");

        $p = teachers_staffs_info::find($request->Id);

        $Pro_pic = $request->file('Pro_pic');

        if ($Pro_pic) {

            if ($p->Image == '') {
                $iname = $request->Id.$Pro_pic->getClientOriginalName();
                $imagepath = 'public/upload_image/';
                $Pro_pic->move($imagepath,$iname);
                $imageurl = $iname;
            }
            else{
                unlink('admin/upload_image/'.$p->Image);
                $iname = $request->Id.$Pro_pic->getClientOriginalName();
                $imagepath = 'admin/upload_image/';
                $Pro_pic->move($imagepath,$iname);
                $imageurl = $iname;
            }
        }
        else{
            $imageurl = $p->Image;
        }

        $p->Name = $request->Name?$request->Name:$p->Name;
        $p->Designation = $request->Designation?$request->Designation:$p->Designation;
        $p->Other = $request->Other_role?$request->Other:$p->Other;
        $p->Qualification = $request->Qualification?$request->Qualification:$p->Qualification;
        $p->Specialized_subject = $request->Specialized_subject?$request->Specialized_subject:$p->Specialized_subject;
        $p->Google_drive = $request->Google_drive?$request->Google_drive:$p->Google_drive;
        $p->Image = $imageurl;
        
        $p->save();

        $t_result2 = DB::table('teachers_staffs_infos')
                    ->where('id',$t_id)
                    ->get();
        
        session()->forget('t_result1');
        session(["t_result1"=>$t_result2]);

        return redirect('/update_teacher_profile_page')->with('msg','DONE');
    }

    public function teacher_settings(){

        $t_id = session("t_id");
        $t_result1 = session("t_result1");

        if($t_id != null && $t_result1 != null){
            return view('user.home.teacher.settings',['id'=>$t_id],['teacher_info'=>$t_result1]);
        }
        else{
               return redirect('/teacher_login_page')->with('msg','logout');
            }
    }

    public function change_teacher_username(Request $request){

        $t_id = session("t_id");
        $t_result1 = session("t_result1");

        $result = DB::table('teachers_login_infos')
                ->where('Employee_id',$request->Employee_id)
                ->get();

        if (count($result)>0) {
            teachers_login_info::where('Employee_id', '=', $request->Employee_id)->update(array('Username' => $request->New_username));
    
            return redirect('/teacher_settings')->with('msg','DONE');
        }
        
        else{
            return redirect('/teacher_settings')->with('msg1','INCORRECT EMPLOYEE ID . USERNAME NOT CHANGED ');
        }

    }

    public function change_teacher_password(Request $request){

        $t_id = session("t_id");
        $t_result1 = session("t_result1");

        $password = $request->New_password; // password is form field
        $hashed = Hash::make($password);

        $result = DB::table('teachers_login_infos')
                ->where('Employee_id',$request->Employee_id)
                ->get();

        if (count($result)>0) {
              teachers_login_info::where('Employee_id', '=', $request->Employee_id)->update(array('Password' => $hashed));
    
            return redirect('/teacher_settings')->with('msg','DONE');
        }
        
        else{
            return redirect('/teacher_settings')->with('msg1','INCORRECT EMPLOYEE ID . PASSWORD NOT DONE');
        }

    }

     public function teacherlogout(Request $request){

        session()->forget('t_result1');
        session()->forget('t_id');

        return redirect('/teacher_login_page');
    }
//////////////////////////////// TEACHER END //////////////////////////////////
    public function admission_form(){
        $about_us = session("about_us");
        $links = link::all();
        $contact_infos = contact_info::all();

        return view('user.home.admission.admission_form',array('about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));
    }

    public function student_admission_form_data(Request $request){
        
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
        $sinfo->Image = '';
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
        
        
        $result = DB::table('students_informations')
                ->where('Student_id',$Student_id)
                ->get();

        $about_us = session("about_us");

        session(["result"=>$result]);
        session(["student_id"=>$Student_id]);

        return view('user.home.admission.admission_form_pdf',array('id'=>$result,'about_us'=>$about_us));
        
       
}
    
    public function download_a(){
        
        $about_us = session("about_us");
        $student_id = session("student_id");
        $result = session("result");

        $pdf = PDF::loadView('user.home.admission.admission_form_pdf_download',array('id'=>$result,'about_us'=>$about_us));
        
        $pdf->save(storage_path().'_filename.pdf');
    
        return $pdf->download('admission form Student Id "'.$student_id.'.pdf');
    }

    public function attendence(){
        $about_us = session("about_us");
        $links = link::all();
        $contact_infos = contact_info::all();

        return view('user.home.attendence.attendence_info',array('about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));
    }

    public function attendence_info(Request $request){
        $class = $request->Class;
        $session = $request->Session;
        $section = $request->Section ? $request->Section : '';
        $date = $request->Date;
        $data = [
                'class' => $class,
                'session' => $session,
                'section' => $section,
                'date' => $date
                ];
        $result = DB::table('present_students')->select('*')
                    ->where('Class',$class)
                    ->where('Session',$session)
                    ->where('Section',$section)
                    ->orderBy('Roll','asc')
                    ->get(); 

        session(["attendence_date"=>$date]);
        session(["attendence_result"=>$result]);

        return view('user.home.attendence.attendence_sheet',['result'=>$result],['data'=>$data]);

    }

    public function save_attendence(Request $request){

        $attendence_result = session("attendence_result");
        $class = $request->Class;
        $session = $request->Session;
        $section = $request->Section;
        $date = $request->Date;

        
        foreach ($attendence_result as $p) {
            $s = $p->Roll;
            $m = $request->$s;
            if ($m =='yes') {
            
                $name = $p->Name;
                $roll = $p->Roll;

                $make_arr = array('Class' => $class,'Section'=> $section, 'Session'=> $session, 'Name'=> $name, 'Roll'=> $roll, 'Date'=> $date, 'p_a'=>'yes' );
                DB::table('attendences')->insert($make_arr);
            }
            else{
                $make_arr = array('Class' => $class,'Section'=> $section, 'Session'=> $session, 'Name'=> $name, 'Roll'=> $roll, 'Date'=> $date, 'p_a'=>'no' );
                DB::table('attendences')->insert($make_arr);
            }
        }
        return redirect ('/attendence')->with('msg','DONE');
    }

    public function ebooks(){

        $p = ebook::all();
        $about_us = session("about_us");
        $links = link::all();
        $contact_infos = contact_info::all();

        return view('user.home.ebooks',array('ebooks'=>$p, 'about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));;
    }

    public function gallery(){
        $p = image_gallery::all();
        $about_us = session("about_us");
        $links = link::all();
        $contact_infos = contact_info::all();        
        return view('user.home.image_gallery',array('images'=>$p, 'about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));
    }

    public function all_teacher(){
        $about_us = session("about_us");
        $all_teacher = teachers_staffs_info::all();
        $links = link::all();
        $contact_infos = contact_info::all();
        return view('user.home.teacher.all_teacher',array('all_teacher'=>$all_teacher,'about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));
    }

    public function teacher($id){
       $about_us = session("about_us");
        $p = teachers_staffs_info::where('Employee_id', '=', $id)->first();
        
        return view('user.home.teacher.teacher_info_show',array('t'=>$p,'about_us'=>$about_us));

    }
     
    public function all_committe(){
        $about_us = session("about_us");
        $links = link::all();
        $contact_infos = contact_info::all();
        $all_committe = committe::all();
        return view('user.home.administration.all_committe',array('all_committe'=>$all_committe,'about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));
    }

    public function search_syllabus(){
        $about_us = session("about_us");
        $links = link::all();
        $contact_infos = contact_info::all();
        return view('user.home.academic.syllabus',array('about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));
    }
    
    public function search_routine(){
        $about_us = session("about_us");
        $links = link::all();
        $contact_infos = contact_info::all();
        return view('user.home.academic.routine',array('about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));
    }

    public function search_booklist(){
        $about_us = session("about_us");
        $links = link::all();
        $contact_infos = contact_info::all();
        return view('user.home.academic.booklist',array('about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));
    }

    public function show_syllabus(Request $request){

        $about_us = session("about_us");
        $links = link::all();
        $contact_infos = contact_info::all();
        $result = DB::table('yearly_syllabi')
                    ->where('Class',$request->Class)
                    ->where('Session',$request->Session)
                    ->first(); 
        return view('user.home.academic.show_brs',array('result'=>$result, 'about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));
    } 

      public function show_routine(Request $request){

        $about_us = session("about_us");
        $links = link::all();
        $contact_infos = contact_info::all();
        $routine = $request->Section ? $request->Section:'';
        $result = DB::table('routines')
                    ->where('Class',$request->Class)
                    ->where('Session',$request->Session)
                    ->where('Section',$routine)
                    ->first(); 
        return view('user.home.academic.show_brs',array('result'=>$result, 'about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));
    } 

      public function show_booklist(Request $request){

        $about_us = session("about_us");
        $links = link::all();
        $contact_infos = contact_info::all();
        $result = DB::table('booklists')
                    ->where('Class',$request->Class)
                    ->where('Session',$request->Session)
                    ->first(); 
        return view('user.home.academic.show_brs',array('result'=>$result, 'about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));
    } 

    public function board_result_show(){
        $result = board_result::all();
        $about_us = session("about_us");
        $links = link::all();
        $contact_infos = contact_info::all();
        return view('user.home.result.board_result',array('result'=>$result, 'about_us'=>$about_us,'links'=>$links,'contact_infos'=>$contact_infos ));
    }

    public function student_id(Request $request){

        $p = $request->class;
        echo $p;
    }

    public function adil_test(request $data)
    {
        //$roll = $data->data1;
        return back();
    }

}

