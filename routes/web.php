<?php

Route::get('/','Auth\LoginController@showLoginForm');	

Auth::routes();

/* ADMIN LANDING PAGE  */
Route::middleware('auth')->group(function(){
	Route::get('/welcome','Modules\ModuleController@moduleDashboard')->name('module.route');
});

/* WEBSITE ADMIN */
Route::prefix('admin')->middleware('auth')->group(function(){
	Route::match(['get', 'post'],'/{path}/{action?}/{id?}', 'Admin\AdminController@activeAdmin')->name('admin.route');
});	

/* APPLICATION MANAGER */
Route::prefix('settings')->middleware('auth')->group(function(){
	Route::match(['get', 'post'],'/{path}/{action?}/{id?}', 'Admin\AdminController@activeAdmin')->name('settings.route');
});	

/* LIBRARACE MANAGEMENT SYSTEM */
Route::prefix('librarace')->middleware('auth')->group(function(){
	Route::match(['get', 'post'],'/{path}/{action?}/{id?}', 'Librarace\LibraraceController@activeAdmin')->name('librarace.route');
});

/////////////////////////////////////////////////////////////////////////////////////////////////////
// SUB-DOMAIN PAGES
/////////////////////////////////////////////////////////////////////////////////////////////////////
/* GENDER AND DEVELOPMENT  */
Route::prefix('gender')->middleware('auth')->group(function(){
	Route::match(['get', 'post'],'/{path}/{action?}/{id?}', 'Gender\GenderController@activeAdmin')->name('gender.route');
});






