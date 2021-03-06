<?php

//welcomm
Route::view('/', 'welcome1');
Route::view('/welcome2-1', 'welcome2-1');
Route::view('/welcomm', 'welcomm');

Route::view('/welcome2', 'welcome2');
Route::view('/welcome1', 'welcome1');
Route::view('/welcome3', 'welcome3');
Route::view('/welcome4', 'welcome4');
Route::view('/welcome5', 'welcome5');
Route::view('/welcome6', 'welcome6');
Route::view('/contact_us','contact_us');
Route::view('/Login','Login');




Route::resource('/drugs', 'DrugController');
Route::resource('/providers', 'ProviderController');
Route::resource('/categories', 'CategoryController');

Route::get('/reports/providers', 'ReportController@providersByCities');
Route::get('/reports/DrugByCategory', 'ReportController@DrugByCategory');
//Route::get('/profit', 'profitController@showprofit');
Route::get('/sales-list', 'ReportController@salesList');

Route::get('/receipts/{id}', 'ReportController@receipt');

//Route::get('/create-sale', 'SaleController@create');
Route::get('/reports/sales', 'ReportController@sales');
Route::post('/sales', 'SaleController@store');
Route::get('/sale_order','SaleController@create');

Route::get('/profit', 'profitController@profitHistory');
Route::post('/profit', 'DrugController@store');

Route::get('/chartt','DrugController@chartt');

Route::get('/Gender','UserController@genderchart');
Route::post('/Gender','UserController@genderchart');

Route::get('/CheckQTY','DrugController@CheckQTY');
Route::get('/CheckDate','DrugController@CheckDate');
//Route::view('/test','test');