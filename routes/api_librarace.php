<?php

Route::match(['get','post'],'/api/check', function(){
	return 'Librarace API is working';
});

Route::match(['get','post'],'/api/auth/login', 'Librarace\LibraraceController@LibraraceLoginAPI');

Route::match(['get','post'],'/api/reserve/book', 'Librarace\LibraraceController@LibraraceBorrowAPI');

Route::match(['get','post'],'/api/retrieve/book', 'Librarace\LibraraceController@LibraraceBookInfoAPI');

Route::match(['get','post'],'/api/retrieve/book/one', 'Librarace\LibraraceController@LibraraceSingleBookAPI');
