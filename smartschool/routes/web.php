<?php

//Route::get('/', function () {
   // return view('welcome');
//});

Route::get('/','homepagecontroller@homepage');
//Route::post('/admin_panel','admincontroller@admin_login');

Auth::routes();
//$this->get('/admin/login','Auth\LoginController@showLoginForm')->name('login');
Route::get('/admin/123', 'HomeController@index')->name('home');


	//////////////Admission/////////////////////.........................

	Route::get('/student_profile','admincontroller@student_profile')->middleware('admin_url_checking');
	Route::get('/admission_applied','admin_controller@admission_applied')->middleware('admin_url_checking');
	Route::post('/admission_applied_search_form','admin_controller@admission_applied_search_form')->middleware('admin_url_checking');
	Route::post('/admission_applied_sort','admin_controller@admission_applied_sort')->middleware('admin_url_checking');
	Route::get('/view_students_profile/{id}','admin_controller@view_students_profile')->middleware('admin_url_checking');
	Route::get('/ad_form_download_by_admin','admin_controller@ad_form_download_by_admin')->middleware('admin_url_checking');
	Route::get('/view_result/{id}','admin_controller@view_result')->middleware('admin_url_checking');
	Route::get('/download_result/{id}','admin_controller@download_result')->middleware('admin_url_checking');
	Route::get('/delete_result/{id}','admin_controller@delete_result')->middleware('admin_url_checking');

	////////////////STUDENT////////////////////////////////////////////////

	Route::get('/students_detail','admin_controller@students_detail')->middleware('admin_url_checking');
	Route::post('/students_detail_search_form','admin_controller@students_detail_search_form')->middleware('admin_url_checking');
	Route::get('/edit_students_profile/{id}','admin_controller@edit_students_profile');
	Route::post('/update_students_info','admin_controller@update_students_info');
	Route::get('/students_admission','admin_controller@students_admission');
	Route::get('/disable_students_profile/{id}','admin_controller@disable_students_profile');
	Route::post('/student_admission_form','admin_controller@student_admission_form');
	Route::get('/guardian_report','admin_controller@guardian_report');
	Route::post('/guardian_report_form','admin_controller@guardian_report_form');
	Route::get('/students_history','admin_controller@students_history');
	Route::post('/student_history_form','admin_controller@student_history_form');
	Route::get('/students_login_info','admin_controller@students_login_info');
	Route::post('/students_login_info_form','admin_controller@students_login_info_form');
	Route::get('/disable_students','admin_controller@disable_students');
	Route::post('/disable_students_form','admin_controller@disable_students_form');
	Route::get('/confirm_disable_students_profile/{id}','admin_controller@confirm_disable_students_profile');
	Route::post('/confirm_disable_students_form','admin_controller@confirm_disable_students_form');



			Route::get('/about_school','admincontroller@about_school')->middleware('admin_url_checking');
			Route::get('/booklist','admincontroller@booklist')->middleware('admin_url_checking');
			Route::get('/new_notice_news_events','admincontroller@new_notice_news_events')->middleware('admin_url_checking');
			Route::post('/save_notice_news_events','admincontroller@save_notice_news_events')->middleware('admin_url_checking')->middleware('admin_url_checking');
			Route::get('/result','admincontroller@result')->middleware('admin_url_checking');
			Route::get('/routine','admincontroller@routine')->middleware('admin_url_checking');
			Route::get('/speech','admincontroller@speech')->middleware('admin_url_checking');
			
			Route::get('/syllabus','admincontroller@syllabus')->middleware('admin_url_checking');
			Route::get('/teachers_staffs_profile','admincontroller@teachers_staffs_profile')->middleware('admin_url_checking');
			Route::get('/change_teachers_staffs_profile','admincontroller@change_teachers_staffs_profile')->middleware('admin_url_checking');
			//forms show end..........................................................
			//ADMIN FORM START........................................................
			Route::get('/update_about_school_form/{update_id}','admincontroller@update_about_school_form_show')->middleware('admin_url_checking');
			Route::post('/update_about_school/','admincontroller@update_about_school')->middleware('admin_url_checking');

			Route::get('/update_speech_form/{update_id}','admincontroller@update_speech_form_show')->middleware('admin_url_checking');
			Route::post('/update_speech/','admincontroller@update_speech')->middleware('admin_url_checking');

			Route::get('/update_teachers_staffs_profile_form/{update_id}','admincontroller@update_teachers_staffs_profile_form_show')->middleware('admin_url_checking');
			Route::post('/update_teachers_staffs_profile','admincontroller@update_teachers_staffs_profile')->middleware('admin_url_checking');

			Route::post('/save_booklist','admincontroller@save_booklist')->middleware('admin_url_checking');

			Route::post('/save_result','admincontroller@save_result')->middleware('admin_url_checking');
			Route::post('/save_routine','admincontroller@save_routine')->middleware('admin_url_checking');
			Route::post('/save_speech','admincontroller@save_speech')->middleware('admin_url_checking');
			Route::post('/save_students_info','admincontroller@save_students_info')->middleware('admin_url_checking');
			Route::post('/save_syllabus','admincontroller@save_syllabus')->middleware('admin_url_checking');
			Route::post('/save_teachers_staffs_info','admincontroller@save_teachers_staffs_info')->middleware('admin_url_checking');
			Route::get('/exportresult','admincontroller@export_result')->middleware('admin_url_checking');
			Route::post('/export_result_csv','admincontroller@export_result_csv')->middleware('admin_url_checking');
			Route::get('/downloadresult','admincontroller@download_result')->middleware('admin_url_checking');
			Route::get('/board_result','admincontroller@board_result')->middleware('admin_url_checking');
			Route::post('/save_board_result','admincontroller@save_board_result')->middleware('admin_url_checking');


			Route::get('/ebook','admincontroller@ebook')->middleware('admin_url_checking');
			Route::post('/save_ebook','admincontroller@save_ebook')->middleware('admin_url_checking');
			Route::get('/image_gallery','admincontroller@image_gallery')->middleware('admin_url_checking');
			Route::post('/save_image_gallery','admincontroller@save_image_gallery')->middleware('admin_url_checking');
			Route::get('/show_images','admincontroller@show_images')->middleware('admin_url_checking');
			Route::get('/present_students','admincontroller@present_students')->middleware('admin_url_checking');
			Route::post('/save_present_students','admincontroller@save_present_students')->middleware('admin_url_checking');
			Route::get('/students_due','admincontroller@students_due')->middleware('admin_url_checking');
			Route::post('/save_students_due','admincontroller@save_students_due')->middleware('admin_url_checking');
			Route::post('/select_images','admincontroller@select_images')->middleware('admin_url_checking');

			Route::get('/admin_settings','admincontroller@admin_settings')->middleware('admin_url_checking');
			Route::Post('/change_admin_username','admincontroller@change_admin_username')->middleware('admin_url_checking');
			Route::Post('/change_admin_password','admincontroller@change_admin_password')->middleware('admin_url_checking');
			Route::Post('/change_admin_email','admincontroller@change_admin_email')->middleware('admin_url_checking');
			Route::get('/admin_profile/{email}','admincontroller@admin_profile')->middleware('admin_url_checking');
			Route::get('/show_all_syllabus','admincontroller@show_all_syllabus')->middleware('admin_url_checking');
			Route::get('/update_syllabus_form/{id}','admincontroller@update_syllabus_form')->middleware('admin_url_checking');
			Route::post('/update_syllabus','admincontroller@update_syllabus')->middleware('admin_url_checking');
			Route::get('/show_all_routine','admincontroller@show_all_routine')->middleware('admin_url_checking');
			Route::get('/update_routine_form/{id}','admincontroller@update_routine_form')->middleware('admin_url_checking');
			Route::post('/update_routine','admincontroller@update_routine')->middleware('admin_url_checking');
			Route::get('/export_due','admincontroller@export_due')->middleware('admin_url_checking');
			Route::post('/export_due_csv','admincontroller@export_due_csv')->middleware('admin_url_checking');
			Route::get('/download_students_due','admincontroller@download_students_due')->middleware('admin_url_checking');
			Route::get('/visit_student_profile','admincontroller@visit_student_profile')->middleware('admin_url_checking');
			Route::post('/view_student_profile','admincontroller@view_student_profile')->middleware('admin_url_checking');
			Route::get('/export_attendence','admincontroller@export_attendence')->middleware('admin_url_checking');
			Route::post('/export_attendence_fatch','admincontroller@export_attendence_fatch')->middleware('admin_url_checking');
			Route::get('/download_attendence','admincontroller@download_attendence')->middleware('admin_url_checking');

			Route::get('/footer','admincontroller@footer')->middleware('admin_url_checking');
			Route::get('/update_link_page/{link}','admincontroller@update_link_page')->middleware('admin_url_checking');
			Route::post('/update_link','admincontroller@update_link')->middleware('admin_url_checking');

			Route::get('/committe_profile','admincontroller@committe_profile')->middleware('admin_url_checking');
			Route::post('/save_committe_profile','admincontroller@save_committe_profile')->middleware('admin_url_checking');
			Route::get('/show_committe_profile','admincontroller@show_committe_profile')->middleware('admin_url_checking');
			Route::get('/update_committe_profile_form/{id}','admincontroller@update_committe_profile_form')->middleware('admin_url_checking');
			Route::post('/update_committe_profile','admincontroller@update_committe_profile')->middleware('admin_url_checking');

			Route::get('/contact_info','admincontroller@contact_info')->middleware('admin_url_checking');
			Route::post('/save_contact_info','admincontroller@save_contact_info')->middleware('admin_url_checking');

			Route::get('/ex_students','admincontroller@ex_students')->middleware('admin_url_checking');
			Route::get('/update_ex_student_form/{id}','admincontroller@update_ex_student_form')->middleware('admin_url_checking');
			Route::post('/update_ex_student','admincontroller@update_ex_student')->middleware('admin_url_checking');


//ADMIN FORM END...........................................................

Route::get('/show_result_page','homepagecontroller@show_result_page');
Route::post('/show_result','homepagecontroller@show_result');
Route::get('/download_result','homepagecontroller@download_result');

Route::get('/student_login_page','homepagecontroller@student_login_page');
Route::post('/student_login','homepagecontroller@student_login');


			Route::get('/student_page','homepagecontroller@student_page')->middleware('student_url_checking');
			Route::get('/update_student_profile_page','homepagecontroller@update_student_profile_page')->middleware('student_url_checking');
			Route::post('/update_student_profile','homepagecontroller@update_student_profile')->middleware('student_url_checking');
			Route::get('/settings','homepagecontroller@settings')->middleware('student_url_checking');
			Route::post('/change_username','homepagecontroller@change_username')->middleware('student_url_checking');
			Route::post('/change_password','homepagecontroller@change_password')->middleware('student_url_checking');
			Route::post('/studentlogout','homepagecontroller@studentlogout')->middleware('student_url_checking');


Route::get('/teacher_login_page','homepagecontroller@teacher_login_page');
Route::post('/teacher_login','homepagecontroller@teacher_login');


			Route::get('/teacher_page','homepagecontroller@teacher_page')->middleware('teacher_url_checking');
			Route::get('/update_teacher_profile_page','homepagecontroller@update_teacher_profile_page')->middleware('teacher_url_checking');
			Route::post('/update_teacher_profile','homepagecontroller@update_teacher_profile')->middleware('teacher_url_checking');
			Route::get('/teacher_settings','homepagecontroller@teacher_settings')->middleware('teacher_url_checking');
			Route::post('/change_teacher_username','homepagecontroller@change_teacher_username')->middleware('teacher_url_checking');
			Route::post('/change_teacher_password','homepagecontroller@change_teacher_password')->middleware('teacher_url_checking');
			Route::post('/teacherlogout','homepagecontroller@teacherlogout')->middleware('teacher_url_checking');

Route::get('/admission_form','homepagecontroller@admission_form');
Route::post('/student_admission_form_data','homepagecontroller@student_admission_form_data');
Route::get('/download_a','homepagecontroller@download_a');

Route::get('/attendence','homepagecontroller@attendence');
Route::post('/attendence_info','homepagecontroller@attendence_info');
Route::post('/save_attendence','homepagecontroller@save_attendence');

Route::get('/ebooks','homepagecontroller@ebooks');
Route::get('/gallery','homepagecontroller@gallery');

Route::get('/all_teacher','homepagecontroller@all_teacher');
Route::get('/teacher/{id}','homepagecontroller@teacher');

Route::get('/all_committe','homepagecontroller@all_committe');

Route::get('/search_syllabus','homepagecontroller@search_syllabus');
Route::get('/search_booklist','homepagecontroller@search_booklist');
Route::get('/search_routine','homepagecontroller@search_routine');

Route::post('show_syllabus','homepagecontroller@show_syllabus');
Route::post('show_routine','homepagecontroller@show_routine');
Route::post('show_booklist','homepagecontroller@show_booklist');
Route::get('/board_result_show','homepagecontroller@board_result_show');
Route::get('/show_nne/{nnn}','homepagecontroller@show_nne');