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

//Route::get('/', function()
//{
//	return View::make('hello');
//});
Route::filter('admin_role', function()
{
           $role = Session::get('role');
          if($role!=ROLE_ADMIN)
          return Redirect::Route('register');
          
 });


Route::when('admin/*', 'auth|admin_role');
Route::match(array('get','post'),'/',array('as'=>'login','uses'=>'userController@show_login_page'));
Route::match(array('get','post'),'/login',array('as'=>'login','uses'=>'userController@show_login_page'));
Route::match(array('get','post'),'/error_login',array('as'=>'error_login','uses'=>'userController@show_error'));
Route::match(array('get','post'),'admin/training/list',array('as'=>'admin_training_list','uses'=>'userController@show_training_list'));
Route::match(array('get','post'),'admin/training/processEditing',array('as'=>'admin_training_processEditing','uses'=>'userController@process_editing'));
Route::match(array('get','post'),'admin/training/delete/{id}',array('as'=>'admin_training_delete','uses'=>'userController@delete_training'));
Route::match(array('get','post'),'admin/training/edit/{id}',array('as'=>'admin_training_edit','uses'=>'userController@edit_training'));
Route::match(array('get','post'),'admin/training/updateTraining/',array('as'=>'admin_training_updateTraining','uses'=>'userController@update_training'));
Route::match(array('get','post'),'admin/training/processTrainingDetail',array('as'=>'admin_training_processTrainingDetail','uses'=>'userController@process_training_data'));
Route::match(array('get','post'),'user/registeration',array('as'=>'user_registeration','uses'=>'userController@registeration_section'));
Route::match(array('get','post'),'user/registeration/process_registeration',array('as'=>'process_user_registeration','uses'=>'userController@process_registeration'));
Route::match(array('get','post'),'user/registeration/check_email',array('as'=>'check_email_exist','uses'=>'userController@is_email_exist'));
Route::match(array('get','post'),'user/training/list',array('as'=>'user_training_list','uses'=>'userController@view_training_section'));
Route::match(array('get','post'),'user/profile',array('as'=>'user_profile','uses'=>'userController@profile_section'));
Route::match(array('get','post'),'user/profile/update_profile_data',array('as'=>'update_user_profile','uses'=>'userController@process_profiledata'));
Route::match(array('get','post'),'user/profile/edit_profile_data',array('as'=>'edit_profile_data','uses'=>'userController@show_profiledata'));
Route::match(array('get','post'),'user/profile/check_company_exist',array('as'=>'check_company_exist','uses'=>'userController@is_company_exist'));
Route::get('admin/dashboard',array('as'=>'admin_dashboard','uses'=>'userController@view_admin_dashboard'));
Route::get('user/dashboard',array('as'=>'user_dashboard','uses'=>'userController@view_user_dashboard'));
Route::get('signout',array('as'=>'signout','uses'=>'userController@logout'));
Route::match(array('get','post'),'admin/training/add',array('as'=>'admin_training_add','uses'=>'userController@training_section'));
Route::match(array('get','post'),'login/processLogin',array('as'=>'login_processLogin','uses'=>'userController@process_login'));
Route::match(array('get','post'),'user/password/reset',array('as'=>'user_password_reset','uses'=>'userController@show_resetpassword_section'));
Route::match(array('get','post'),'user/process/password/reset',array('as'=>'process_password_reset','uses'=>'userController@process_password_reset'));
Route::match(array('get','post'),'user/password/reset/search/email',array('as'=>'search_user_email','uses'=>'userController@is_user_email_exist'));
Route::match(array('get','post'),'user/password/reset/{password_reset_token}',array('as'=>'process_password','uses'=>'userController@reset_password'));





