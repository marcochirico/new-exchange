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


//clients
Route::get('contractor/login', 'ContractorController@login');
Route::post('contractor/login/authorize', 'ContractorController@loginAuthorize');
Route::get('contractor/logout', 'ContractorController@logout');
Route::get('contractor/register', 'ContractorController@register');
Route::post('contractor/register/save', 'ContractorController@save');
Route::get('contractor/forgot-password', 'ContractorController@forgotPassword');
Route::post('contractor/forgot-password/process', 'ContractorController@forgotPasswordProcess');

//contractors
Route::get('client/login', 'ClientController@login');
Route::post('client/login/authorize', 'ClientController@loginAuthorize');
Route::get('client/logout', 'ClientController@logout');
Route::get('client/register', 'ClientController@register');
Route::post('client/register/save', 'ClientController@save');
Route::get('client/forgot-password', 'ClientController@forgotPassword');
Route::post('client/forgot-password/process', 'ClientController@forgotPasswordProcess');


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
    Route::any('contractor/projects/applied', 'ContractorController@projectApplied');
    Route::any('contractor/projects/active', 'ContractorController@projectActive');
    Route::any('contractor/projects/closed', 'ContractorController@projectClosed');

    //Ajax
    Route::any('contractor/ajax/interview/received/accept', 'AjaxController@contractorInterviewReceivedAccept');
    Route::any('contractor/ajax/interview/received/replace', 'AjaxController@contractorInterviewReceivedReplace');
    Route::any('contractor/ajax/interview/received/refuse', 'AjaxController@contractorInterviewReceivedRefuse');
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
    Route::any('client/interviews/refused', 'ClientController@interviewsRefused');
    
    Route::any('client/projects/active', 'ClientController@projectsActive');
    
    //Ajax
    Route::any('client/interview/request', 'AjaxController@interviewRequest');
    Route::any('client/interview/request/save', 'AjaxController@saveInterviewRequest');
    
    Route::any('client/interview/feedback', 'AjaxController@interviewFeedback');
    Route::any('client/interview/feedback/save', 'AjaxController@saveInterviewFeedback');
});

/*
 * Admin Routes
 */
Route::any('admin/login', 'AdminController@login');
Route::get('admin/logout', 'AdminController@logout');

Route::any('admin/dashboard', 'AdminController@dashboard');
