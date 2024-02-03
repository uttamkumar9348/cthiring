<?php

use App\Models\usertraking;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\AjaxController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StateController;
use App\Http\Controllers\ApiKeyController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\clientController;
use App\Http\Controllers\DegreeController;
use App\Http\Controllers\MyplanController;
use App\Http\Controllers\ResumeController;
use App\Http\Controllers\BillingController;
use App\Http\Controllers\IndustryController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\IndexController;
use App\Http\Controllers\QualificationController;
use App\Http\Controllers\FunctionalAreaController;
use App\Http\Controllers\SpecializationController;
use App\Http\Controllers\UserDesignationController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\ClientDesignationController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/logout', [AuthenticatedSessionController::class, 'destroy'])->name('user.projects');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

// Route::get('/', [HomeController::class, 'dashboard'])->middleware(['auth'])->name('dashboard');

Route::middleware(['auth'])->name('admin.')->prefix('')->group(function () {
    Route::get('/', [IndexController::class, 'index'])->name('index');
    Route::resource('/roles', RoleController::class);
    Route::post('/roles/update/{id}', [RoleController::class, 'updated'])->name('roles.updated');
    Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
    Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');

    Route::resource('/permissions', PermissionController::class);
    // Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
    Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
    Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
    Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
    Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');

    // Route::get('/user', [UserController::class, 'userfetch'])->name('users.index');
    // Route::post('/userinsert', [UserController::class, 'user_insert'])->name('users.create');

    Route::get('/client_branch', [BranchController::class, 'clientbranch']);
    Route::post('/add_client_branch', [BranchController::class, 'addclientbranch']);
    Route::post('/edit_branch/{id}', [BranchController::class, 'client_branch_updatedit']);
    Route::get('/client_branch_delete/{id}', [BranchController::class, 'client_delete']);
    Route::post('/client_branch_action', [BranchController::class, 'client_branch_action']);

    // userbranch
    Route::get('/user_branch', [BranchController::class, 'userbranch']);
    Route::post('/user_branch_action', [BranchController::class, 'user_branch_action']);
    Route::post('/add_branch', [BranchController::class, 'addbranch']);
    Route::post('/edit_user_branch/{id}', [BranchController::class, 'updatedit']);
    Route::get('/user_branch_delete/{id}', [BranchController::class, 'userdelete']);


    //Profile navbar

    Route::get('/view_profile/{id}', [HomeController::class, 'view_profile']);
    Route::get('/edit_profile/{id}', [HomeController::class, 'edit_profile']);
    Route::put('/update_profile/{id}', [HomeController::class, 'update_profile']);


    //client Designation table
    Route::post('/addclientdesignation', [ClientDesignationController::class, 'add_clientdesignation']);
    Route::get('/client_designation', [ClientDesignationController::class, 'fetch_clientdesignation']);
    Route::get('/edit_client_designation/{id}', [ClientDesignationController::class, 'edit_clientdesignation']);
    Route::get('/client_designation_delete/{id}', [ClientDesignationController::class, 'delete_clientdesignation']);
    Route::post('/client_action', [ClientDesignationController::class, 'client_action']);


    //user Designation table(uttam)
    Route::post('/addcandidatedesignation', [UserDesignationController::class, 'add_userdesignation']);
    Route::get('/candidate_designation', [UserDesignationController::class, 'fetch_userdesignation']);
    Route::get('/edit_candidate_designation/{id}', [UserDesignationController::class, 'edit_userdesignation']);
    Route::get('/candidate_designation_delete/{id}', [UserDesignationController::class, 'delete_userdesignation']);
    Route::post('/candidate_action', [UserDesignationController::class, 'candidate_action']);

    // qualification
    //Route::get('/qualification', [QualificationController::class, 'showqualification']);
    Route::post('/addqualification', [QualificationController::class, 'add_qualification']);
    Route::get('/qualification', [QualificationController::class, 'fetch_qualification']);
    Route::get('/editqualification/{id}', [QualificationController::class, 'edit_qualificaation']);
    Route::get('/qualificationdelete/{id}', [QualificationController::class, 'delete_qualification']);
    Route::post('/qualify_action', [QualificationController::class, 'qualify_action']);

    // Degree//uttam

    Route::post('/add_degree', [DegreeController::class, 'add_degree']);
    Route::get('/degree', [DegreeController::class, 'fetch_degree']);
    Route::get('/editdegree/{id}', [DegreeController::class, 'edit_degree']);
    Route::get('/degreedelete/{id}', [DegreeController::class, 'delete_degree']);
    Route::post('/degree_action', [DegreeController::class, 'degree_action']);

    // Specialization//uttam

    Route::post('/add_specialization', [SpecializationController::class, 'add_specialization']);
    Route::get('/specialization', [SpecializationController::class, 'fetch_specialization']);
    Route::get('/editspecialization/{id}', [SpecializationController::class, 'edit_specialization']);
    Route::get('/specializationdelete/{id}', [SpecializationController::class, 'delete_specialization']);
    Route::post('/specialization_action', [SpecializationController::class, 'spec_action']);
    Route::post('/specialization_fetch', [SpecializationController::class, 'spec_fetch']);

    // role
    Route::get('/role', [RoleController::class, 'role_branch']);
    Route::post('/role', [RoleController::class, 'add_rolebranch']);
    Route::get('/edit_role/{id}', [RoleController::class, 'edit_rolebranch']);
    Route::get('/role_delete/{id}', [RoleController::class, 'delete_rolebranch']);

    // functional_area
    Route::get('functionalarea', [FunctionalAreaController::class, 'fetch_functionalarea']);
    Route::post('/addfunctional', [FunctionalAreaController::class, 'add_functional']);
    Route::put('/edit_functional/{id}', [FunctionalAreaController::class, 'edit_functional']);
    Route::get('/delete_functional/{id}', [FunctionalAreaController::class, 'delete_functional_area']);
    Route::post('/area_action', [FunctionalAreaController::class, 'area_action']);

    //industry page
    Route::get('industry', [IndustryController::class, 'fetch_industry']);
    Route::post('/add_industryfunction', [IndustryController::class, 'add_industry_function']);
    Route::put('/edit_industry/{id}', [IndustryController::class, 'edit_industry_function']);
    Route::get('/delete_industry/{id}', [IndustryController::class, 'delete_industry_function']);



    // user
    Route::get('/user', [UserController::class, 'userfetch'])->name('users.index');
    Route::post('/userinsert', [UserController::class, 'user_insert'])->name('users.create');
    Route::get('/edit_user/{id}', [UserController::class, 'edit_user']);
    Route::post('/update_user/{id}', [UserController::class, 'update_user']);
    Route::get('/user_delete/{id}', [UserController::class, 'delete_user']);


    //user password change(jerry)
    // Route::get('/change-password', [HomeController::class, 'index']);
    // Route::post('/change-password', [HomeController::class, 'changePassword']);


    //change passworde by jerry
    Route::get('/change_password', [UserController::class, 'changepassview']);
    Route::post('/change_password', [UserController::class, 'changePassword']);
    //user trakings by jerry
    Route::get('/alltraking', [UserController::class, 'allTrakings']);
    Route::get('/active_inactive/{id}', [UserController::class, 'active_inactive']);
    //admin opt genarate by jerry
    Route::get('/generate_otp', [UserController::class, 'generate_otp']);
    Route::get('/generate_new_otp/{id}', [UserController::class, 'generate_new_otp']);
    //duplicate email check
    Route::POST('/email_action', [UserController::class, 'email']);



    //validation
    Route::post('/client_validation', [clientController::class, 'clientvalidation']);
    Route::post('/client_filter', [clientController::class, 'clientfilter']);


    //designation fetch
    Route::post('/fetchdesignation', [clientController::class, 'fetchdesignation']);
    Route::post('add_state', [clientController::class, 'add_state']);
    Route::post('/add_district', [clientController::class, 'add_district']);
    Route::post('/add_city', [clientController::class, 'add_city']);
    

    //client
    Route::get('/client', [clientController::class, 'clientshow']);
    //Route::get('/client_contactpage', [clientController::class, 'client_contactshow']);
    //Route::post('/clientinsert', [clientController::class, 'client_insert']);
    Route::post('/clientinsert2', [clientController::class, 'client_insertpage2']);
    Route::get('edit_client/{id}', [clientController::class, 'client_edit']);
    Route::post('update_client/{id}', [clientController::class, 'client_update']);

    //viewclient
    Route::get('/viewclient', [clientController::class, 'viewclientshow']);
    Route::get('/viewclient-get', [clientController::class, 'viewclientshow_get']);
    Route::get('/view_detail/{id}', [clientController::class, 'viewclientshow_details']);
    Route::get('/approve_details/{id}', [clientController::class, 'approveclient_details']);

    //approval client view
    Route::get('/approveclient', [clientController::class, 'view_approv_client']);
    Route::post('approve_details/approve_dtl', [clientController::class, 'appr_clt'])->name('approve_client');
    Route::post('approve_details/reject_dtl', [clientController::class, 'reject_clt'])->name('reject_client');

    // dist and city for client
    Route::post('/fetchdist', [StateController::class, 'getdistrict']);
    Route::post('/fetchcity', [StateController::class, 'getcity']);

    //dist and city for clientcontact for git hub testing
    Route::post('/fetchdist_contact', [StateController::class, 'getdistrict_clientcontact']);
    Route::post('/fetchcity_contact', [StateController::class, 'getcity_clientcontact']);

    //position blade//
    Route::get('/position', [PositionController::class, 'positionshow']);
    Route::get('/viewposition-get', [PositionController::class, 'viewpositionshow_get']);
    Route::post('/position_inserts', [PositionController::class, 'position_inserts']);
    Route::post('/updateposition/{position_id}', [PositionController::class, 'updateposition'])->name('position_update');

    Route::get('/positionview', [PositionController::class, 'position_viewpage']);
    Route::get('/position_view_details/{id}', [PositionController::class, 'position_view_delts']);

    Route::get('/position_approve', [PositionController::class, 'position_approve_page']);
    Route::get('/position_approve_details/{position_id}/{id}', [PositionController::class, 'position_approve_delts']);

    Route::post('/position_approve_remark', [PositionController::class, 'approve_position']);
    Route::post('/position_reject_remark', [PositionController::class, 'reject_position']);
    Route::get('/position_edit/{id}', [PositionController::class, 'editposition']);
    Route::get('/crm_change_approval', [PositionController::class, 'crm_change_approval']);
    Route::post('/crm_change/{id}', [PositionController::class, 'crm_change']);
    Route::post('/approve_status', [PositionController::class, 'approve_status']);
    Route::post('/reject_status', [PositionController::class, 'reject_status']);


    // clientname fetch in position blade
    Route::post('/fetchclientconct', [AjaxController::class, 'get_contactperson']);

    // // for my plan page design
    Route::get('/myplan', [AjaxController::class, 'myplandesign']);
    Route::get('/myplan2', [AjaxController::class, 'myplandesign2']);

    //Api Key(uttam)
    Route::get('/apikeys', [ApiKeyController::class, 'api_key']);
    Route::PUT('/update_msg/{id}', [ApiKeyController::class, 'update_msg'])->name('api.msgupdate');

    //view event(uttam)
    Route::get('/approved', [MyplanController::class, 'approved']);
    Route::get('/todays_plan', [MyplanController::class, 'myplan_todays']);
    Route::post('/myplan_position_client', [AjaxController::class, 'position_recruiter']);
    Route::post('/todays_plan_insert', [MyplanController::class, 'insert_todaysplan']);
    Route::post('/plan_approve_remark/{id}', [MyplanController::class, 'approve_plan']);
    Route::post('/plan_reject_remark/{id}', [MyplanController::class, 'reject_plan']);
    Route::get('/plan_view', [MyplanController::class, 'plan_viewpage']);
    //(28/05/2022)
    Route::get('/viewleave', [MyplanController::class, 'view_leave']);
    Route::get('/leavedetails/{id}', [MyplanController::class, 'view_leave_details']);

    Route::post('/leave_approve_remark/{id}', [MyplanController::class, 'leave_approve_plan']);
    Route::post('/leave_reject_remark/{id}', [MyplanController::class, 'leave_reject_plan']);
    Route::post('/cancel_leave_remark/{id}', [MyplanController::class, 'cancel_leave']);
    Route::get('/edit_plan/{id}', [MyplanController::class, 'edit_plan']);

    Route::post('/position_fetch_plan', [MyplanController::class, 'position_fetch_ajax_plan']);

    //resume blade(uttam)
    Route::get('/add/resume', [ResumeController::class, 'showresume']);
    Route::post('/fetch_position', [ResumeController::class, 'fetch_position']);
    Route::post('/resume_submit', [ResumeController::class, 'resume_submit'])->name('resume_submit');
    Route::post('/insert_resume', [ResumeController::class, 'insert_resume'])->name('insert_resume');
    Route::post('/reset_resume', [ResumeController::class, 'reset_resume'])->name('reset_resume');
    Route::get('/resumeview', [ResumeController::class, 'resum_view']);
    Route::get('/viewresume-get', [ResumeController::class, 'viewresumeshow_get']);

    Route::get('/resume_viewdetails/{id}', [ResumeController::class, 'resume_view_detail']);
    Route::get('/pdfresume/{id}', [ResumeController::class, 'resume_pdf_candidate']);
    Route::get('/pdfresume_view/{id}', [ResumeController::class, 'resume_pdf_candidate_view']);
    Route::get('/candidate_resume/{id}', [ResumeController::class, 'candidate_resume']);
    Route::post('/duplicate_resume', [ResumeController::class, 'duplicate_resume']);

    //position details page tab form for resume and interview
    Route::post('send-resume/{id}', [ResumeController::class, 'send_resume_individual'])->name('send.resume_individual');
    Route::post('screening_status/{id}', [ResumeController::class, 'screening_status_shortlist'])->name('screening.status_shortlist');
    Route::post('screening_stat/{id}', [ResumeController::class, 'screening_status_rejected'])->name('screening.status_rejected');
    // for edit
    Route::get('/resume_editview/{id}', [ResumeController::class, 'resume_edit_view']);
    Route::post('/resume_edit/{id}', [ResumeController::class, 'resume_edit_data'])->name('resume.resume_edit');

    //resume approve by crm
    Route::get('approve_cv/{id}', [ResumeController::class, 'approve_cv']);
    Route::post('reject_cv/{id}', [ResumeController::class, 'reject_cv_crm']);


    //interview Schedule
    Route::post('schedule_interview/{id}', [ResumeController::class, 'schedule_interview']);
    Route::post('getaddtess', [ResumeController::class, 'getaddtess']);
    Route::post('getspoc', [ResumeController::class, 'getspoc']);
    //interview reschedule


    Route::post('reschedule_interview/{id}', [ResumeController::class, 'reschedule_interview']);
    Route::post('select_interview/{id}', [ResumeController::class, 'select_interview']);
    Route::post('reject_interview/{id}', [ResumeController::class, 'reject_interview']);
    Route::post('offer_accepted/{id}', [ResumeController::class, 'offer_accepted']);
    Route::post('offer_rejected/{id}', [ResumeController::class, 'offer_rejected']);

    Route::post('job_joined/{id}', [ResumeController::class, 'job_joined']);
    Route::post('job_not_joined/{id}', [ResumeController::class, 'job_not_joined']);
    Route::post('job_defered/{id}', [ResumeController::class, 'job_defered']);

    Route::get('/Interview_Schedule', [ResumeController::class, 'Interview_Schedule']);
    Route::get('/view_interview_details/{id}', [ResumeController::class, 'view_interview_details']);

    //bulk resume approve
    Route::post('bulk_resumeapprove', [ResumeController::class, 'bluck_resume_approve']);
    Route::post('bulk_resumesend', [ResumeController::class, 'bulk_resume_send']);

    // Billing part
    Route::get('/showbilling/{id}', [BillingController::class, 'show_billing']);
    Route::post('/insert_billing', [BillingController::class, 'insert_billing_candidate']);

    Route::get('/View_billing', [BillingController::class, 'View_Billing']);
    Route::get('/View_billing_details/{id}', [BillingController::class, 'View_Billing_details']);

    Route::get('/approve_billing', [BillingController::class, 'approve_billing']);
    Route::get('/approve_billing_details/{id}', [BillingController::class, 'approve_billing_details']);
    Route::post('/approv_bill', [BillingController::class, 'approv_bill']);
    Route::post('/reject_bill', [BillingController::class, 'reject_bill']);


    // Route::get('client_mail/{created}/{client_name}/{city_id}/{crm_id}',[clientController::class,'mail_send']);

    //CV Bank
    Route::get('/cv_bank', [HomeController::class, 'cv_bank']);

    //Notifications
    Route::get('/notifications', [HomeController::class, 'notification']);

    //Mail Box
    Route::get('/mail_box', [MailController::class, 'mail_box']);
    Route::get('/mail_box_details/{mailbox_id}', [MailController::class, 'mail_box_details']);
    Route::post('/resend_mail/{mailbox_id}', [MailController::class, 'resend_mail']);


   Route::post('/search_filter', [IndexController::class, 'search_filter']);
   Route::post('/fetch', [clientController::class, 'fetch_data']);


    
});



Route::get('/otp', [LoginController::class, 'otp']);
Route::get('/otp', [AuthenticatedSessionController::class, 'otp']);
// Route::get('/newpassword', [AuthenticatedSessionController::class, 'store']);
Route::post('/newpassword', [AuthenticatedSessionController::class, 'newpass'])->name('new_password');

Route::post('/otp_verify', [AuthenticatedSessionController::class, 'otp_verify']);
// Route::get('/fetch', [clientController::class, 'fetch_data']);

// Route::group(['middleware' => ['can:Approve Position']], function () {
//     Route::get('/positionview', function () {
//         return "hi";
//     });
// });

require __DIR__ . '/auth.php';
