<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the Closure to execute when that URI is requested.
  |
 */

Route::any('/', 'HomeController@index');

Route::get('how-to', 'StaticPageController@howTo');
Route::get('our-services', 'StaticPageController@ourServices');
Route::get('payments', 'StaticPageController@payments');
Route::get('legal', 'StaticPageController@legal');
Route::get('about-us', 'StaticPageController@aboutUs');
Route::get('contact-us', 'StaticPageController@contactUs');
Route::get('help-faq', 'StaticPageController@helpFaq');


//clients
Route::get('contractor/login', 'ContractorController@login');
Route::post('contractor/login/authorize', 'ContractorController@loginAuthorize');
Route::get('contractor/logout', 'ContractorController@logout');
Route::get('contractor/register', 'ContractorController@register');
Route::get('contractor/registration/confirm', 'ContractorController@registrationConfirm');
Route::post('contractor/register/save', 'ContractorController@save');
Route::get('contractor/forgot-password', 'ContractorController@forgotPassword');
Route::post('contractor/forgot-password/process', 'ContractorController@forgotPasswordProcess');
Route::get('contractor/forgot-password/recover/{token}', 'ContractorController@forgotPasswordRecover');

//contractors
Route::get('client/login', 'ClientController@login');
Route::post('client/login/authorize', 'ClientController@loginAuthorize');
Route::get('client/logout', 'ClientController@logout');
Route::get('client/register', 'ClientController@register');
Route::get('client/registration/confirm', 'ClientController@registrationConfirm');
Route::post('client/register/save', 'ClientController@save');
Route::get('client/forgot-password', 'ClientController@forgotPassword');
Route::post('client/forgot-password/process', 'ClientController@forgotPasswordProcess');
Route::get('client/forgot-password/recover/{token}', 'ClientController@forgotPasswordRecover');


/*
 * Auth routes
 */
Route::group(array('before' => 'authContractor'), function() {
    //contractors
    Route::any('contractor/dashboard', 'ContractorController@dashboard');
    Route::any('contractor/edit', 'ContractorController@edit');
    //contractor interviews
    Route::any('contractor/interviews/received', 'ContractorController@interviewsReceived');
    Route::any('contractor/interviews/replaced', 'ContractorController@interviewsReplaced');
    Route::any('contractor/interviews/accepted', 'ContractorController@interviewsAccepted');
    Route::any('contractor/interviews/refused', 'ContractorController@interviewsRefused');
    Route::any('contractor/interviews/feedback', 'ContractorController@interviewsFeedback');


    //contractor projects
    Route::any('contractor/jobs/applied', 'ContractorController@jobsApplied');
    Route::any('contractor/projects/active', 'ContractorController@projectsActive');
    Route::any('contractor/projects/closed', 'ContractorController@projectsClosed');



    //Ajax
    Route::any('contractor/ajax/interview/received/accept', 'AjaxController@contractorInterviewReceivedAccept');
    Route::any('contractor/ajax/interview/received/replace', 'AjaxController@contractorInterviewReceivedReplace');
    Route::any('contractor/ajax/interview/received/refuse', 'AjaxController@contractorInterviewReceivedRefuse');
    Route::any('contractor/ajax/interview/feedback/confirm', 'AjaxController@contractorInterviewFeedbackConfirm');
    Route::any('contractor/ajax/interview/feedback/refuse', 'AjaxController@contractorInterviewFeedbackRefuse');
    Route::any('contractor/ajax/project/timesheet', 'AjaxController@contractorProjectTimesheet');
});

Route::group(array('before' => 'authClient'), function() {
    //clients
    Route::any('client/dashboard', 'ClientController@dashboard');
    Route::any('client/contractors/search', 'ClientController@searchContractors');
    Route::any('client/contractors/search/results/{token}', 'ClientController@searchContractorsResults');
    Route::any('client/contractor/action/{action_type}/{contractor_id}', 'ClientController@actions');
//    Route::any('client/interviews/{interview_type}', 'ClientController@interviews');

    Route::any('client/interviews/required', 'ClientController@interviewsRequired');
    Route::any('client/interviews/replaced', 'ClientController@interviewsReplaced');
    Route::any('client/interviews/accepted', 'ClientController@interviewsAccepted');
    Route::any('client/interviews/feedback', 'ClientController@interviewsFeedback');
    Route::any('client/interviews/refused', 'ClientController@interviewsRefused');

    Route::any('client/projects/active', 'ClientController@projectsActive');

    //Ajax
    Route::any('client/interview/request', 'AjaxController@interviewRequest');
    Route::any('client/interview/request/replace', 'AjaxController@clientInterviewReceivedReplace');
    Route::any('client/interview/replace', 'AjaxController@interviewReplace');


    Route::any('client/interview/feedback', 'AjaxController@interviewFeedback');
    Route::any('client/interview/feedback/save', 'AjaxController@saveInterviewFeedback');
});


Route::group(array('before' => 'authCombined'), function() {
    //exception to skip session redirect login
    Route::any('client/interview/request/save', 'AjaxController@saveInterviewRequest');
});

/*
 * Admin Routes
 */
Route::any('admin/login', 'AdminController@login');
Route::get('admin/logout', 'AdminController@logout');

Route::any('admin/dashboard', 'AdminController@dashboard');
