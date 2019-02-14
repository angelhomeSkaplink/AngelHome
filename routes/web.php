<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use Illuminate\Support\Facades\Auth;

Route::get('/', function () {

    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('auth.login');
});

Route::get('/clear_cache',function(){
    $exitCode = Artisan::call('config:cache');
});

Route::get('/home', function () {
    return redirect('/dashboard');
});

Route::auth();

//Login (Defult Laravel)
Route::get('/dashboard', 'HomeController@index');   // Defult
Route::resource('profile', 'ProfileController');
Route::patch('profile/{profile}/password', 'ProfileController@update_password');
Route::resource('admin', 'AdminController');

// Custom route
Route::get('prospective', 'ProspectiveController@prospective');
Route::get('pross_add', 'ProspectiveController@pross_add');
Route::post('pross_stor', 'ProspectiveController@pross_stor');
Route::get('sales_pipeline', 'ProspectiveController@sales_pipeline');
Route::get('sales_stage_pipeline', 'ProspectiveController@sales_stage_pipeline');
Route::get('new_pross_add', 'ProspectiveController@new_pross_add');
Route::post('new_prospective', 'ProspectiveController@new_prospective');
Route::get('add_records/{pipeline_id}', 'ProspectiveController@add_records');
Route::get('change_records/{pipeline_id}', 'ProspectiveController@change_records');
Route::get('select_pros/{pros_id}', 'ProspectiveController@select_pros');
Route::get('select_pros_email/{pros_id}', 'ProspectiveController@select_pros_email');
Route::get('select_pros_contact/{pros_id}', 'ProspectiveController@select_pros_contact');
Route::get('select_stage_pros/{pros_id}', 'ProspectiveController@select_stage_pros');
Route::get('select_stage_pros_email/{pros_id}', 'ProspectiveController@select_stage_pros_email');
Route::get('select_personal_detail/{pros_id}', 'ProspectiveController@select_personal_detail');
Route::get('pipeline_search_view/{pros_id}', 'ProspectiveController@pipeline_search_view');
Route::patch('new_records', 'ProspectiveController@new_records');
Route::get('view_records/{pipeline_id}', 'ProspectiveController@view_records');
Route::patch('change_pross_records', 'ProspectiveController@change_pross_records');
Route::get('change_pro_records/{pipeline_id}', 'ProspectiveController@change_pro_records');
Route::patch('change_pro_record', 'ProspectiveController@change_pro_record');
Route::get('reports', 'ProspectiveController@reports');
Route::post('inquiery_reports', 'ProspectiveController@inquiery_reports');
Route::post('prospect_date_btween_excel', 'ExcelController@prospect_date_btween_excel');
Route::get('appointment_schedule', 'ProspectiveController@appointment_schedule');
Route::get('reschedule/{appoiuntment_id}', 'ProspectiveController@reschedule');
Route::patch('change_appointment', 'ProspectiveController@change_appointment');
Route::get('personal_details', 'ProspectiveController@personal_details');
Route::get('details/{id}', 'ProspectiveController@details');
Route::get('injury', 'ProspectiveController@injury');
Route::post('injury_record_entry', 'ProspectiveController@injury_record_entry');
Route::get('add_prospect_record/{stage}/{id}', 'ProspectiveController@add_prospect_record');
Route::patch('new_records_pros_add', 'ProspectiveController@new_records_pros_add');
Route::get('select_personal_detail_contact/{pros_id}', 'ProspectiveController@select_personal_detail_contact');
Route::get('select_personal_detail_email/{pros_id}', 'ProspectiveController@select_personal_detail_email');
//Route::get('select_stage_pros_email/{pros_id}', 'ProspectiveController@select_stage_pros_email');

Route::post('add_personal_records', 'PersonalDetailsController@add_personal_records');
Route::patch('add_insurance', 'PersonalDetailsController@add_insurance');
Route::patch('add_emergency', 'PersonalDetailsController@add_emergency');
Route::patch('add_physician', 'PersonalDetailsController@add_physician');
Route::patch('add_dentist', 'PersonalDetailsController@add_dentist');
Route::patch('add_others', 'PersonalDetailsController@add_others');




Route::get('room_details', 'RoomController@room_details');
Route::get('new_room_add', 'RoomController@new_room_add');
Route::post('new_room', 'RoomController@new_room');
Route::get('room_edit/{room_id}', 'RoomController@room_edit');
Route::patch('new_room_edit', 'RoomController@new_room_edit');
Route::get('room_delete/{room_id}', 'RoomController@room_delete');
Route::get('booking', 'RoomController@booking');
Route::get('book_room/{id}', 'RoomController@book_room');
Route::patch('room_book', 'RoomController@room_book');
Route::patch('room_change', 'RoomController@room_change');
Route::get('view_book_resident/{room_id}', 'RoomController@view_book_resident');
Route::get('room_details_view/{id}', 'RoomController@room_details_view');
Route::patch('select_room', 'RoomController@select_room');
Route::get('activity_calendar', 'RoomController@activity_calendar');
Route::get('new_event_add_form', 'RoomController@new_event_add_form');
Route::post('new_event_add', 'RoomController@new_event_add');
Route::get('change_own_room/{id}', 'RoomController@change_own_room');
Route::get('leave_own_room/{id}', 'RoomController@leave_own_room');

Route::post('saveAssessment', 'AssessmentController@saveAssessment');
Route::get('assessment_preview', 'AssessmentController@assessment_preview');
Route::get('tasksheet', 'AssessmentController@tasksheet');
Route::get('set_task/{id}', 'AssessmentController@set_task');
Route::patch('search_event', 'RoomController@search_event');
Route::get('attendee/{event_id}', 'RoomController@attendee');
Route::patch('add_attendee', 'AttendeeController@add_attendee');
Route::patch('store_tasklist', 'AttendeeController@store_tasklist');
Route::patch('assign_tasklist', 'AttendeeController@assign_tasklist');

Route::get('service_plan', 'AdminmoduleController@service_plan');
Route::get('new_plan_add_form', 'AdminmoduleController@new_plan_add_form');
Route::post('add_new_service_plan', 'AdminmoduleController@add_new_service_plan');
Route::get('resident_service_plan', 'AdminmoduleController@resident_service_plan');
// Route::get('view_plan_details/{id}', 'AdminmoduleController@view_plan_details');

// Bikram change
Route::get('plan_edit/{plan_id}','AdminmoduleController@plan_edit');
Route::get('plan_delete/{plan_id}','AdminmoduleController@plan_delete');
Route::post('update_plan','AdminmoduleController@update_plan');
Route::get('password_change','ProfileController@change_password');
Route::patch('update_password','ProfileController@update_password');
// End

Route::get('assessment_form_view/{assessment_id}', 'AssessmentController@assessment_form_view');
Route::get('assessment_edit_preview', 'AssessmentController@assessment_edit_preview');
Route::get('assessment_edit/{assessment_id}', 'AssessmentController@assessment_edit');
Route::get('assessment', 'AssessmentController@assessment');
Route::get('initial_assessment', 'AssessmentController@initial_assessment');
Route::get('all_assessment/{id}','AssessmentController@all_assesment');
Route::get('upload_file/{id}', 'AssessmentController@upload_file');
Route::patch('file_upload', 'ProspectiveController@file_upload');
Route::get('resident_assessment', 'AssessmentController@resident_assessment');
Route::get('preadmin_resident_assessment', 'AssessmentController@preadmin_resident_assessment');
Route::get('select_assessments/{id}', 'AssessmentController@select_assessments');
Route::get('preadmin_select_assessments/{id}', 'AssessmentController@preadmin_select_assessments');
Route::get('assessment_choose/{assessment_id}/{id}', 'AssessmentController@assessment_choose');
Route::post('assessment_store', 'AssessmentController@assessment_store');
Route::get('assessment_history/{id}', 'AssessmentController@assessment_history');
// Route::get('care_plan/{id}', 'AssessmentController@care_plan');
Route::post('save_care_plan', 'AssessmentController@save_care_plan');
Route::get('assessment_set_point/{assessment_id}', 'AssessmentController@assessment_set_point');
Route::patch('set_points', 'AssessmentController@set_points');
Route::get('next_assessment_date/{id}', 'AssessmentController@next_assessment_date');
Route::patch('set_date', 'AssessmentController@set_date');
Route::get('daily_task/{task}', 'AssessmentController@daily_task');
Route::get('daily_task_assignee/{task}', 'AssessmentController@daily_task_assignee');
Route::get('main_task', 'AssessmentController@main_task');
Route::get('add_task_history/{task_id}/{task}', 'AssessmentController@add_task_history');
Route::get('task_assignee/{task}', 'AssessmentController@task_assignee');
Route::get('main_task_list', 'AssessmentController@main_task_list');

// Added by nilotpal
Route::get('all_member_list', 'AddMemberController@all_member_list');
Route::get('add_new_member', 'AddMemberController@add_new_member');
Route::post('member_details', 'AddMemberController@store_member_details');
Route::get('screening_view/{id}', 'ScreeningController@resposible_view');
Route::get('screening_next/{id}', 'ScreeningController@screening_next');
Route::get('screening_status/{id}', 'ScreeningController@screening_status');
Route::get('screening_data/{id}', 'ScreeningController@screening_data');
Route::get('screening_data_next/{id}', 'ScreeningController@screening_data_next');
Route::get('screening_data_status/{id}', 'ScreeningController@screening_data_status');
Route::get('details_view/{id}', 'ProspectiveController@details_view');
Route::get('patient_medicine', 'DoctorController@patient_medicine');
// Route::get('add_history/{pat_medi_id}', 'DoctorController@add_history');
Route::post('add_history', 'DoctorController@add_history'); //edited by Zaman
Route::get('patients_list', 'DoctorController@patients_list');
Route::get('add_patient_details/{id}', 'DoctorController@add_patient_details');
Route::get('view_patient_details/{id}', 'DoctorController@view_patient_details');
Route::get('delete_records/{pat_medi_id}/{pros_id}', 'DoctorController@delete_records');
Route::patch('store_patient_medical_info', 'DoctorController@store_patient_medical_info');
Route::get('medicine_stocks_list', 'MedicineStockHistoryController@medicine_stocks_list');
Route::get('add_stocks', 'MedicineStockHistoryController@add_stocks');
Route::patch('store_stocks', 'MedicineStockHistoryController@store_stocks');
Route::get('edit_stocks/{medi_stock_id}', 'MedicineStockHistoryController@edit_stocks');
Route::patch('update_stocks', 'MedicineStockHistoryController@update_stocks');
Route::get('renew_list', 'MedicineStockHistoryController@renew_list');
Route::get('renewal_complete/{id}', 'MedicineStockHistoryController@renewal_complete');
Route::get('view_stock_details/{id}', 'MedicineStockHistoryController@view_stock_details');
Route::patch('stock_recv', 'MedicineStockHistoryController@stock_recv');
Route::get('add_recv_date/{id}', 'MedicineStockHistoryController@add_recv_date');
Route::get('prospect_prescription/{pros_id}', 'MedicineStockHistoryController@prospect_prescription');
Route::get('create_policy', 'DoctorController@create_policy');
Route::patch('store_policy_details', 'DoctorController@store_policy_details');
Route::get('view_policy', 'DoctorController@view_policy');
Route::get('edit_policy', 'DoctorController@edit_policy');
Route::patch('update_policy', 'DoctorController@update_policy');

//finished

//Payment History

Route::get('search_hostory', 'PaymentController@search_hostory');
Route::post('search_unique_id', 'PaymentController@search_unique_id');
Route::get('payment_history', 'PaymentController@payment_history');
Route::post('make_payment', 'PaymentController@make_payment');
Route::get('payment_done', 'PaymentController@payment_done');
Route::get('resident_payment', 'PaymentController@resident_payment');
Route::get('resident_make_payment/{id}', 'PaymentController@resident_make_payment');
Route::patch('make_payment_res', 'PaymentController@make_payment_res');
Route::get('payment_report', 'PaymentController@payment_report');
Route::get('detail_history/{id}', 'PaymentController@detail_history');

//End

// MIS reports

Route::get('total_revenue', 'ReportController@total_revenue');
Route::get('facility_reports/{id}', 'ReportController@facility_reports');
Route::patch('date_range_report', 'ReportController@date_range_report');
Route::get('room_reports', 'ReportController@room_reports');
Route::get('facility_room_reports/{id}', 'ReportController@facility_room_reports');
Route::patch('date_range_room_report', 'ReportController@date_range_room_report');
Route::get('aging_report', 'ReportController@aging_report');
Route::get('facility_sales_reports', 'ReportController@facility_sales_reports');
Route::get('facility_sales_reports_detail/{id}', 'ReportController@facility_sales_reports_detail');
Route::get('activity_report', 'ReportController@activity_report');
Route::get('view_attendee/{event_id}', 'ReportController@view_attendee');
Route::get('view_activity/{id}', 'ReportController@view_activity');
Route::get('tasksheet_report', 'ReportController@tasksheet_report');
Route::get('facility_task_graph_reports/{id}', 'ReportController@facility_task_graph_reports');

// changes on 11 november

Route::get('facility_aggregated_revenue_graph', 'ReportController@facility_aggregated_revenue_graph');
Route::get('facility_aggregated_revenue_graph_data', 'ReportController@facility_aggregated_revenue_graph_data');
Route::get('facility_aggregated_revenue_details', 'ReportController@facility_aggregated_revenue_details');
Route::get('monthly_revenue/{facility_id}', 'ReportController@monthly_revenue');
Route::get('facility_aggregated_room_graph', 'ReportController@facility_aggregated_room_graph');
Route::get('facility_aggregated_room_graph_data', 'ReportController@facility_aggregated_room_graph_data');
Route::get('facility_aggregated_room_status', 'ReportController@facility_aggregated_room_status');
Route::get('facility_aggregated_sales_report', 'ReportController@facility_aggregated_sales_report');
Route::get('facility_aggregated_aging_report', 'ReportController@facility_aggregated_aging_report');
Route::get('facility_aggregated_aging_graph_data', 'ReportController@facility_aggregated_aging_graph_data');

// End

// GRAPH REPORT
Route::get('facility_graph_reports/{id}', 'ReportController@facility_graph_reports');
Route::get('get_graph_data/{id}', 'ReportController@get_graph_data');
Route::get('facility_room_graph/{id}', 'ReportController@facility_room_graph');
Route::get('facility_room_graph_data/{id}', 'ReportController@facility_room_graph_data');
Route::get('facility_aging_graph_reports/{id}', 'ReportController@facility_aging_graph_reports');
Route::get('facility_aging_graph_data/{id}', 'ReportController@facility_aging_graph_data');
Route::get('get_medicine', 'ReportController@get_medicine');
Route::get('get_room_type', 'ReportController@get_room_type');
Route::get('get_pharmacy', 'ReportController@get_pharmacy');
Route::get('get_event_json', 'RoomController@get_event_json');
Route::get('facility_task_graph_data/{id}', 'ReportController@facility_task_graph_data');
Route::get('activity_graph/{id}', 'ReportController@activity_graph');
Route::get('attendee_report_graph/{id}', 'ReportController@attendee_report_graph');
Route::get('attendee_report_graph_data/{id}', 'ReportController@attendee_report_graph_data');
// END

//Seperate personal detail_history
Route::get('personal_insurance/{id}', 'PersonalDetailsController@personal_insurance');
Route::get('contact/{id}', 'PersonalDetailsController@contact');
Route::get('physician/{id}', 'PersonalDetailsController@physician');
Route::get('dentist/{id}', 'PersonalDetailsController@dentist');
Route::get('funeral/{id}', 'PersonalDetailsController@funeral');
//end

//Route::get('t', 'PersonalDetailsController@funeral');
Route::get('change_language', 'LanguageController@change_language');

// Bikram Changes

Route::get('edit_member/{user_id}','AddMemberController@edit_member_role');
Route::post('update_member_role','AddMemberController@update_member_role');

//screening

Route::get('screening', 'ScreeningController@screening');
Route::get('screening_details/{id}', 'ScreeningController@screening_details');
Route::patch('add_responsible_person', 'ScreeningController@add_responsible_person');
Route::patch('add_significant_person', 'ScreeningController@add_significant_person');
Route::patch('add_resident_details', 'ScreeningController@add_resident_details');
Route::patch('add_primary_doctor', 'ScreeningController@add_primary_doctor');
Route::patch('add_pharmacy', 'ScreeningController@add_pharmacy');
Route::patch('add_equipment', 'ScreeningController@add_equipment');
Route::patch('add_legal_doc', 'ScreeningController@add_legal_doc');
Route::patch('add_mental_status', 'ScreeningController@add_mental_status');
Route::patch('add_bathing', 'ScreeningController@add_bathing');
Route::patch('add_dressing', 'ScreeningController@add_dressing');
Route::patch('add_toileting', 'ScreeningController@add_toileting');
Route::patch('add_transfer', 'ScreeningController@add_transfer');
Route::patch('add_grooming', 'ScreeningController@add_grooming');
Route::patch('add_feeding', 'ScreeningController@add_feeding');
Route::patch('add_communucation', 'ScreeningController@add_communucation');
Route::patch('add_night_need', 'ScreeningController@add_night_need');
Route::patch('add_exiting', 'ScreeningController@add_exiting');
Route::patch('add_overall_fuctioning', 'ScreeningController@add_overall_fuctioning');
Route::patch('add_insurance', 'ScreeningController@add_insurance');
Route::patch('add_funeralhome', 'ScreeningController@add_funeralhome');

Route::get('screening/{id}','ScreeningController@master_view');
Route::get('resposible_personal/{id}','ScreeningController@resposible_personal');
Route::get('significant_personal/{id}','ScreeningController@significant_personal');
Route::get('resident_details/{id}','ScreeningController@resident_details');
Route::get('primary_doctor/{id}','ScreeningController@primary_doctor');
Route::get('pharmacy/{id}','ScreeningController@pharmacy');
Route::get('medical_equipment/{id}','ScreeningController@medical_equipment');
Route::get('legal_doc/{id}', 'ScreeningController@legal_doc');
Route::get('mental_status/{id}','ScreeningController@mental_status');
Route::get('bathing/{id}','ScreeningController@bathing');
Route::get('dressing/{id}','ScreeningController@dressing');
Route::get('toileting/{id}','ScreeningController@toileting');
Route::get('ambulation_transfer/{id}','ScreeningController@ambulation_transfer');
Route::get('personal_grooming_hygiene/{id}','ScreeningController@grooming');
Route::get('feeding_nutrition/{id}','ScreeningController@feeding');
Route::get('communication_abilities/{id}','ScreeningController@communication');
Route::get('night_need/{id}','ScreeningController@night_need');
Route::get('emergency_exiting/{id}','ScreeningController@emergency');
Route::get('overall/{id}','ScreeningController@overall');
Route::get('funeral_home/{id}','ScreeningController@funeral_home');
Route::get('insurance/{id}','ScreeningController@insurance');


Route::get('inactive_member/{user_id}','ProspectiveController@inactive_member');
Route::get('active_member/{user_id}','ProspectiveController@active_member');

Route::get('booking_pros/{pros_id}','RoomController@booking_pros');
Route::get('reports_pros/{pros_id}','ProspectiveController@reports_pros');
Route::get('screening_pros/{pros_id}','ScreeningController@screening_pros');
Route::get('screening_pros_email/{pros_id}','ScreeningController@screening_pros_email');
Route::get('screening_pros_contact/{pros_id}','ScreeningController@screening_pros_contact');
Route::get('booking_pros_email/{pros_id}','RoomController@booking_pros_email');
Route::get('assessment_pros/{pros_id}','AssessmentController@assessment_pros');

//Typeahead search bar
Route::get('get_resident_list', 'ProspectiveController@get_resident_list');
Route::get('get_movein_list', 'ProspectiveController@get_movein_list');
Route::get('get_resident_email_list', 'ProspectiveController@get_resident_email_list');
Route::get('get_resident_contact_list', 'ProspectiveController@get_resident_contact_list');
Route::get('score_view/{assessment_form_name}', 'AssessmentController@score_view');
//End

// MAR report
Route::get('mar_report','ReportController@mar_report');
Route::get('resident_mar_rep/{id}','ReportController@mar_report_details');
Route::post('mar_monthly_report','ReportController@mar_monthly_report');
Route::post('send', 'EmailController@send'); //21 nov
// End

// PRN history
Route::post('prn_history_add','DoctorController@add_prn_history');

//21 Nov
Route::get('service_pros/{pros_id}', 'AdminmoduleController@service_pros');
Route::get('service_pros_email/{pros_id}', 'AdminmoduleController@service_pros_email');
Route::get('service_pros_contact/{pros_id}', 'AdminmoduleController@service_pros_contact');
//End

//22 NOV
Route::get('payment_pros/{pros_id}','PaymentController@payment_pros');
Route::get('payment_pros_email/{pros_id}','PaymentController@payment_pros_email');
Route::get('payment_pros_contact/{pros_id}','PaymentController@payment_pros_contact');
//END

//23 NOV
Route::get('search_patient/{pros_id}','DoctorController@search_patient');
Route::get('search_patient_contact/{pros_id}','DoctorController@search_patient_contact');
Route::get('search_appointment/{pros_id}','ProspectiveController@search_appointment');
Route::get('select_pros_task/{pros_id}','AssessmentController@select_pros_task');
Route::get('select_pros_task_email/{pros_id}','AssessmentController@select_pros_task_email');
Route::get('select_pros_task_contact/{pros_id}','AssessmentController@select_pros_task_contact');
Route::get('service_pros_payment/{pros_id}','PaymentController@service_pros_payment');
//END

//24 NOV
Route::get('select_pros_upload/{pros_id}','AssessmentController@select_pros_upload');
Route::get('select_pros_upload_email/{pros_id}','AssessmentController@select_pros_upload_email');
Route::get('select_pros_upload_contact/{pros_id}','AssessmentController@select_pros_upload_contact');
//END
// 29 NOV TSP
Route::get('temporary_service_plan','tspController@viewResidents');
Route::get('all_tsp/{id}','tspController@all_tsp');
Route::get('/1','tspController@fall_tsp'); // for fall tsp
Route::get('/2','tspController@decline_tsp'); //for decline in apetite
Route::get('/3','tspController@increase_pain');
Route::get('/4','tspController@new_medication');
Route::get('/5','tspController@skin_problem');
Route::get('/6','tspController@respiratory_problem');
Route::get('/7','tspController@cast_splint');
Route::get('/8','tspController@eye_problem');
Route::get('/9','tspController@gastrointestinal');
Route::get('/10','tspController@urinary');

Route::patch('storeTsp','tspController@storeTsp');
Route::get('view_resident_tsp/{id}', 'tspController@view_resident_tsp');
// Checkup by Bikram
Route::get('all_res_checkup','DoctorController@checkup_view');
Route::get('checkup/{id}','DoctorController@checkup');
Route::post('storeCheckup','DoctorController@storeCheckup');
// Notes by Bikram
Route::get('all_res_notes','WellnessController@note_view');
Route::get('take_note/{id}','WellnessController@take_note');
Route::post('storeNote','WellnessController@storeNote');

//11 DECEMBER CHANGES BY DHRUWA
Route::get('reassessment/{assessment_id}/{id}', 'AssessmentController@reassessment');
Route::get('find_assessment/{assessment_id}/{pros_id}', 'AssessmentController@find_assessment');
Route::post('save_temporary_json', 'AssessmentController@save_temporary_json');

Route::get('assessment_period/{flag}/{pros_id}', 'AssessmentController@assessment_period');
Route::get('Monthly/{pros_id}', 'AssessmentController@Monthly');
Route::get('Quarterly/{pros_id}', 'AssessmentController@Quarterly');
Route::get('Half-Yearly/{pros_id}', 'AssessmentController@HalfYearly');
Route::get('Annual/{pros_id}', 'AssessmentController@Annual');
Route::get('Ad-hoc/{pros_id}', 'AssessmentController@Adhoc');
Route::get('Initial/{pros_id}', 'AssessmentController@Initial');
Route::get('find_reassessment/{assessment_id}', 'AssessmentController@find_reassessment');
Route::get('find_answer/{assessment_id}/{pros_id}', 'AssessmentController@find_answer');

// Screening View by Bikram
Route::get('significant_view/{id}', 'ScreeningController@significant_view');
Route::get('details_view/{id}', 'ScreeningController@details_view');
Route::get('physician_view/{id}', 'ScreeningController@physician_view');
Route::get('hospital_view/{id}', 'ScreeningController@hospital_view');
Route::get('equipment_view/{id}', 'ScreeningController@equipment_view');
Route::get('doc_view/{id}', 'ScreeningController@doc_view');
Route::get('insurance_view/{id}', 'ScreeningController@insurance_view');
Route::get('funeral_view/{id}', 'ScreeningController@funeral_view');

// document delete
Route::get('delete_doc/{id}','ScreeningController@delete_doc');
//END

// Emoji by Zaman
Route::get('get_emoji','EmojiController@get_emoji');
Route::post('add_new_emoji','EmojiController@add_new_emoji');
Route::post('update_emoji','EmojiController@update_emoji');

Route::get('AllScreen/{id}','ScreeningController@AllScreen');

// new routes added 7 jan
Route::get('select_period/{flag}/{id}', 'AssessmentController@select_period');
Route::get('select_assessments/{period}/{id}', 'AssessmentController@select_assessments');
Route::get('assessment_choose/{assessment_id}/{id}/{period}/{cur_date}', 'AssessmentController@assessment_choose');
Route::get('care_plan_period/{period}/{id}', 'AssessmentController@care_plan_period');
Route::get('care_plan_periodic/{period}/{id}', 'AssessmentController@care_plan_periodic');
Route::get('care_plan/{id}/{period}', 'AssessmentController@care_plan');
Route::get('assessment_history_detail_view/{pros_id}/{cp_id}', 'AssessmentController@assessment_history_detail_view');
Route::get('view_plan_details/{id}/{cp_id}', 'AdminmoduleController@view_plan_details');
Route::get('service_plan_period/{id}', 'AdminmoduleController@service_plan_period');
//end

//service plan graph
Route::get('resident_service_plan_graph_data','ReportController@resident_service_plan_graph_data');
Route::get('resident_service_plan_graph','ReportController@resident_service_plan_graph');
Route::get('residents_in_each_service_plan/{plan}','ReportController@residents_in_each_service_plan');

//main assessment report graph
Route::get('assessment_report_graph','ReportController@assessment_report_graph');
Route::get('assessment_report_graph_data','ReportController@assessment_report_graph_data');
Route::get('residents_in_each_assessment/{assessment_index}', 'ReportController@residents_in_each_assessment');
Route::get('individual_page_in_main_assessment/{pros_id}/{assessment}','ReportController@individual_page_in_main_assessment');

// assessment filled details
Route::get('history/{pros_id}/{id}','AssessmentController@assessment_history_view');
// Error pages
Route::get('page-not-found', function () {
    return view('error.404');
});
Route::get('int-server-error', function () {
    return view('error.500');
});
Route::get('access-forbidden', function () {
    return view('error.403');
});
Route::get('bad-request', function () {
    return view('error.400');
});
Route::get('error', function () {
    return view('error.default_err');
});

//End error pages
// Route::post('test','AssessmentController@test');
// Policy Doc Upload by Bikram
Route::get('policy_doc_form','UploadController@create');
Route::post('upload_doc','UploadController@store');
Route::get('delete_policy/{doc_id}','UploadController@destroy');

Auth::routes();


Route::get('logout', '\App\Http\Controllers\Auth\LoginController@logout');
