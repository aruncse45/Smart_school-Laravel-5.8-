<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Arr;
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

class admin_controller extends Controller
{
	//////////////////ADMISSION/////////////////////////////

    public function admission_applied(){

    	$result =  $users = DB::table('students_informations')
                ->where('Class','0')
                ->get();
		$data = [
                'type' => "",
                'input' => "Today",
               	'total_result'=> count($result)
                ];

		return view('admin.new_forms.admission_applied',['student'=>$result],['data'=>$data]);
    }

    public function admission_applied_search_form(Request $request){
    	
    	$Class = $request->Class ;
    	$Dept = $request->Department ;
    	$Day = $request->Day ;
    	$Month = $request->Month ;
    	$Year = $request->Year ;

    	//dd($Dept);

		$result = DB::table('students_informations')
				->select('*')
				->when($request->Class, function($query) use ($request){
        		return $query->where('Class', $request->Class);
    			})
				->when($request->Department, function($query) use ($request){
        		return $query->where('Department', $request->Department);
    			})
    			->when($request->Day, function($query) use ($request){
        		return $query->whereDate('created_at', $request->Day);
    			})
				->when($request->Month, function($query) use ($request){
        		return $query->whereMonth('created_at', $request->Month);
    			})
				->when($request->Year, function($query) use ($request){
        		return $query->whereYear('created_at', $request->Year);
    			})
				->get();
    	
		
		session(["result"=>$result]);
		session(["total_result" => count($result)]);
		$data = [
               	    'Class' => $Class ,
               	    'Dept' => $Dept ,
               	    'Day' => $Day ,
               	    'Month' => $Month ,
               	    'Year' => $Year ,
                    'total_result'=>count($result)
               
                ];
        session(["data" => $data]);

		if (count($result) > 0) {
			return view('admin.new_forms.admission_applied',['student'=>$result],['data'=>$data]);
		}
		else{
    		return redirect('/admission_applied')->with('msg', 'Result not found');
    	}
    }

    public function admission_applied_sort(Request $request){

    	$result = session("result");
    	$type = session("type");
    	$input = session("input");
    	$total_result = session("total_result");
    	$data = session("data");
    	$sort = $request->Sort;

    	if ($sort == 'Name') {
    		$array = $result->sortBy($sort);
    	}
    	else{
    		$array = $result->sortByDesc($sort);
    	}
    	
    	

    	return view('admin.new_forms.admission_applied',['student'=>$array],['data'=>$data]);	
    }

    public function view_students_profile($id){

	  	$result = DB::table('students_informations')
	  			->select('*')
	  			->where('id',$id)
	  			->get();
	  	foreach ($result as $r) {
	  		session(['student_id'=>$r->Student_id]);
	  	}
	  	session(['result'=>$result]);
	  
	  		return view('admin.forms.view_student_profile',['result'=>$result]);
	  	
    	
    }
    public function ad_form_download_by_admin(){
        
        $about_us = session("about_us");
        $student_id = session("student_id");
        $result = session("result");

        $pdf = PDF::loadView('user.home.admission.admission_form_pdf_download',array('id'=>$result,'about_us'=>$about_us));
        
        $pdf->save(storage_path().'_filename.pdf');
    
        return $pdf->download('admission form Student Id "'.$student_id.'.pdf');
    }

    public function view_result($id){

    	  $result = DB::table('results')
    	  		->select('*')
    	  		->where('id',$id)
    	  		->get();
    	  //dd($result);
    	  return view('admin.csv.export_result_csv',['result'=>$result]);
    }

    public function download_result($id){

    	$result = DB::table('results')
    	->select('*')
        ->where('id',$id)
        ->orderBy('Roll','asc')
        ->get();

         foreach ($result as $r) {
        	$exam_name = $r->Exam_name;
        	$class = $r->Class;
        	$session = $r->Session;
        }

        $school = DB::table('about_uses')->first();

        $pdf = PDF::loadView('admin.csv.download_result', array('result'=>$result, 'school'=>$school, 'exam_name'=>$exam_name, 'class'=>$class, 'session'=>$session));
 
        $pdf->save(storage_path().'_filename.pdf');
 
        return $pdf->download('Result of "'.$exam_name.'"Class"'.$class.'"Session"'.$session.'.pdf');
    }

    public function delete_result($id){

    	DB::table('results')
    	->where('id',$id)
    	->delete();
    	return redirect('/result');
    }


    ///////////////////STUDENT///////////////////////////////////////////

    public function students_detail(){
    	$result =  $users = DB::table('students_informations')
                ->where('Class','0')
                ->get();
        $data = [
               	'total_result'=> count($result)
                ];
    	return view('admin.students.students_detail',["result"=>$result],["data"=>$data]);
    }

    public function students_detail_search_form(Request $request){

    	$Class = $request->Class ;
    	$Section = $request->Section ;
    	$Session = $request->Session ;
    	$Name = $request->Name ;

    	session(["Class"=>$Class]);
    	session(["Section"=>$Section]);
    	session(["Session"=>$Session]);
    	session(["Name"=>$Name]);
    	//dd($Name);
		$result = DB::table('students_informations')
				->select('*')
				->when($request->Name, function($query) use ($request){
        		return $query->where('Name', $request->Name);
    			})
				->when($request->Class, function($query) use ($request){
        		return $query->where('Class', $request->Class);
    			})
				->when($request->Section, function($query) use ($request){
        		return $query->where('Section', $request->Section);
    			})
    			->when($request->Session, function($query) use ($request){
        		return $query->where('Session', $request->Session);
    			})
				->get();
    	//dd($result);
		
		session(["result"=>$result]);
		session(["total_result" => count($result)]);
		$data = [
               	    'Class' => $Class ,
               	    'Section' => $Section ,
               	    'Session' => $Session ,
               	    'Name' => $Name ,
                    'total_result'=>count($result)
               
                ];
        session(["data" => $data]);

		if (count($result) > 0) {
			return view('admin.students.students_detail',['student'=>$result],['data'=>$data]);
		}
		else{
    		return redirect('/students_detail')->with('msg', 'Result not found');
    	}
    }

    public function edit_students_profile($id){
    	$id = DB::table('students_informations')
    		->where('id',$id)
    		->first();
    	return view('admin.students.update_profile',["id"=>$id]);
    }

    public function update_students_info(Request $request){
    	$id = $request->id;

    	$sinfo =students_information::where('id',$id)->first();

    	$sinfo->Name = $request->Name;
        $sinfo->Nick_name = $request->Nick_name;
        
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

      	$Image = $request->file('Image');
        if ($Image) {
        	if($sinfo->Image){
           		unlink('admin/upload_image/'.$sinfo->Image);
        	}
            $iname = $id.$Image->getClientOriginalName();
            $imagepath = 'admin/upload_image/';
            $Image->move($imagepath,$iname);
            $imageurl = $iname;
        }
        else{
            $imageurl = $sinfo->Image;
        }
        $sinfo->Image = $imageurl;
        $sinfo->save();

        return redirect('/student_profile')->with('msg','DONE');
    }

    public function disable_students_profile($id){
    	DB::table('students_informations')
    	->where('id',$id)
    	->delete();
    	$class = session("Class");
    	$session = session("Session");
    	$section = session("Section");
    	$name = session("Name");
    	$result = DB::table('students_informations')
				->select('*')
				->when($name, function($query) use($name) {
        		return $query->where('Name', $name);
    			})
				->when($class, function($query) use($class) {
        		return $query->where('Class', $class);
    			})
				->when($section, function($query) use($section) {
        		return $query->where('Section', $section);
    			})
    			->when($session, function($query) use($session) {
        		return $query->where('Session', $session);
    			})
				->get();
    	$data = [
               	    'Class' => $class ,
               	    'Section' => $section ,
               	    'Session' => $session ,
               	    'Name' => $name ,
                    'total_result'=>count($result)
               
                ];
    	
    	return view('admin.students.students_detail',['student'=>$result],['data'=>$data]);
    	
    }

    public function students_admission(){

    	$result =  $users = DB::table('students_informations')
                ->where('Class','0')
                ->get();
		$data = [
                'Class' => "",
                'Section' => "",
                'Session' => "",
               	'total_result'=> count($result)
                ];

		return view('admin.students.students_admission',['student'=>$result],['data'=>$data]);
    }

    public function student_admission_form(Request $request){

    	$class = $request->Class;
        $session = $request->Session;
        $section = $request->Section;

        $upload = $request->file('Students_file');
        //dd($upload);
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
            $admission_id = $data["admissionid"]; 
            $Gender = $data["gender"];
            $Religion = $data["religion"];
			$fathers_name = $data["fathersname"];

			$r = DB::table('students_informations')
			->where('Student_id',$admission_id)
			->get();

			if (count($r)>0) {
				$p = students_information::where('Student_id',$admission_id)->first();
    		
	    		$p->final = "yes";
				$p->Name = $name;
	            $p->Student_id = $admission_id ;
	            $p->Section = $section;
	            $p->Session = $session;
	            $p->Gender = $Gender;
	            $p->Religion = $Religion;
	            $p->Fathers_name = $fathers_name;
	            
	  			$p->save();
			}
			else{

				$p = new students_information;

				$p->final = "yes";
				$p->Name = $name;
	            $p->Student_id = $admission_id ;
	            $p->class = $class;
	            $p->Section = $section;
	            $p->Session = $session;
	            $p->Gender = $Gender;
	            $p->Religion = $Religion;
	            $p->Fathers_name = $fathers_name;
	            
	  			$p->save();
			}
    		
         }

        $result = DB::table('students_informations')
        		->where('Class',$class)
        		->where('Section',$section)
        		->where('Session',$session)
        		->get();
        //dd($result);
        $data = [
                'Class' => $class,
                'Section' => $section,
                'Session' => $session,
               	'total_result'=> count($result)
                ];

        return view('admin.students.students_admission',['student'=>$result],['data'=>$data]);
    }

    public function guardian_report(){

    	$result =  $users = DB::table('students_informations')
                ->where('Class','0')
                ->get();
		$data = [
                'Class' => "",
                'Session' => "",
                'Section' => "",
               	'total_result'=> count($result)
                ];
        return view('admin.students.guardian_report',["student"=>$result],["data"=>$data]);
    }

    public function guardian_report_form(Request $request){

 		$class = $request->Class;
 		$session = $request->Session;
 		$section = $request->Section;

 		$result = DB::table('students_informations')
 				->where('Class',$class)
 				->where('Session',$session)
 				->where('Section',$section)
 				->get();

 		$data = [
                'Class' => $class,
                'Session' => $session,
                'Section' => $section,
               	'total_result'=> count($result)
                ];
        return view('admin.students.guardian_report',["student"=>$result],["data"=>$data]);
    }

    public function students_history(){
    	$result =  $users = DB::table('students_informations')
                ->where('Class','0')
                ->get();
		$data = [
                'Class' => "",
                'Session' => "",
               	'total_result'=> count($result)
                ];
        return view('admin.students.students_history',["student"=>$result],["data"=>$data]);	
    }

    public function student_history_form(Request $request){

    	$class = $request->Class;
    	$session = $request->Session;

    	$result = DB::table('students_informations')
 				->where('Class',$class)
 				->where('Session',$session)
 				->get();

 		$data = [
                'Class' => $class,
                'Session' => $session,
               	'total_result'=> count($result)
                ];
        return view('admin.students.students_history',["student"=>$result],["data"=>$data]);
    }

    public function students_login_info(){
    	$result =  $users = DB::table('students_informations')
                ->where('Class','0')
                ->get();
		$data = [
                'Class' => "",
                'Section' => "",
                'Session' => "",
                'Name' => "",
               	'total_result'=> count($result)
                ];

		return view('admin.students.students_login_info',['student'=>$result],['data'=>$data]);
    }

    public function students_login_info_form(Request $request){

    	$Class = $request->Class ;
    	$Section = $request->Section ;
    	$Session = $request->Session ;
    	$Name = $request->Name ;

    	session(["Class"=>$Class]);
    	session(["Section"=>$Section]);
    	session(["Session"=>$Session]);
    	session(["Name"=>$Name]);
    	//dd($Name);
		$result = DB::table('students_informations')
				->select('*')
				->when($request->Name, function($query) use ($request){
        		return $query->where('Name', $request->Name);
    			})
				->when($request->Class, function($query) use ($request){
        		return $query->where('Class', $request->Class);
    			})
				->when($request->Section, function($query) use ($request){
        		return $query->where('Section', $request->Section);
    			})
    			->when($request->Session, function($query) use ($request){
        		return $query->where('Session', $request->Session);
    			})
				->get();
    	//dd($result);
		
		session(["result"=>$result]);
		session(["total_result" => count($result)]);
		$data = [
               	    'Class' => $Class ,
               	    'Section' => $Section ,
               	    'Session' => $Session ,
               	    'Name' => $Name ,
                    'total_result'=>count($result)
               
                ];
        session(["data" => $data]);

		if (count($result) > 0) {
			return view('admin.students.students_login_info',['student'=>$result],['data'=>$data]);
		}
		else{
    		return redirect('/students_login_info')->with('msg', 'Result not found');
    	}
    }

    public function disable_students(){

    	$result =  $users = DB::table('students_informations')
                ->where('Class','0')
                ->get();
		$data = [
                'Class' => "",
                'Section' => "",
                'Session' => "",
                'Name' => "",
               	'total_result'=> count($result)
                ];

		return view('admin.students.disable_students',['student'=>$result],['data'=>$data]);
    }

    public function disable_students_form(Request $request){

    	$Class = $request->Class ;
    	$Section = $request->Section ;
    	$Session = $request->Session ;
    	$Name = $request->Name ;

    	session(["Class"=>$Class]);
    	session(["Section"=>$Section]);
    	session(["Session"=>$Session]);
    	session(["Name"=>$Name]);
    	//dd($Name);
		$result = DB::table('students_informations')
				->select('*')
				->where('final','no')
				->when($request->Name, function($query) use ($request){
        		return $query->where('Name', $request->Name);
    			})
				->when($request->Class, function($query) use ($request){
        		return $query->where('Class', $request->Class);
    			})
				->when($request->Section, function($query) use ($request){
        		return $query->where('Section', $request->Section);
    			})
    			->when($request->Session, function($query) use ($request){
        		return $query->where('Session', $request->Session);
    			})
				->get();
    	//dd($result);
		
		session(["result"=>$result]);
		session(["total_result" => count($result)]);
		$data = [
               	    'Class' => $Class ,
               	    'Section' => $Section ,
               	    'Session' => $Session ,
               	    'Name' => $Name ,
                    'total_result'=>count($result)
               
                ];
        session(["data" => $data]);

		if (count($result) > 0) {
			return view('admin.students.disable_students',['student'=>$result],['data'=>$data]);
		}
		else{
    		return redirect('/disable_students')->with('msg', 'Result not found');
    	}
    }

    public function confirm_disable_students_profile($id){

    	$id = DB::table('students_informations')
    		->where('id',$id)
    		->first();

    	return view('admin.students.confirm_disable_students_profile',["id"=>$id]);
    }

    public function confirm_disable_students_form(Request $request){

    	$r = $request->Student_id;

    	DB::table('students_informations')
	    	->where('id',$request->id)
	    	->update(['final' => "yes"]);	
	    DB::table('students_informations')
	    	->where('id',$request->id)
	    	->update(['Student_id' => $r]);

    	$class = session("Class");
    	$session = session("Session");
    	$section = session("Section");
    	$name = session("Name");
    	$result = DB::table('students_informations')
				->select('*')
				->when($name, function($query) use($name) {
        		return $query->where('Name', $name);
    			})
				->when($class, function($query) use($class) {
        		return $query->where('Class', $class);
    			})
				->when($section, function($query) use($section) {
        		return $query->where('Section', $section);
    			})
    			->when($session, function($query) use($session) {
        		return $query->where('Session', $session);
    			})
				->get();
    	$data = [
               	    'Class' => $class ,
               	    'Section' => $section ,
               	    'Session' => $session ,
               	    'Name' => $name ,
                    'total_result'=>count($result)
               
                ];
    	
    	return view('admin.students.disable_students',['student'=>$result],['data'=>$data]); 
    }
}	
