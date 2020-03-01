<?php 

Route::prefix('gender')->get('/{path}/{action?}/{id?}', 'Website\GenderWebsiteController@activenavbar')->name('gad.page');