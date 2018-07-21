<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Report Summaries
Route::get('home/summaries/create', 'ReportSummaryController@index')->name('report-summary');
Route::get('home/summaries', 'ReportSummaryController@getReport');
Route::post('home/summaries', 'ReportSummaryController@submitReport');

// Batch Report
Route::get('home/batch/create', 'BatchReportController@index')->name('report-batch');
Route::get('home/batch', 'BatchReportController@getReport');
Route::post('home/batch', 'BatchReportController@submitReport');

// Product Ingredient
Route::get('home/ingredients/create', 'ProductIngredientController@index')->name('product-ingredient');
Route::get('home/ingredients', 'ProductIngredientController@getIngredients');
Route::post('home/ingredients', 'ProductIngredientControllert@storeIngredients');

// Waste Report
Route::get('home/waste/create', 'WasteReportController@index')->name('report-waste');
Route::get('home/waste', 'WasteReportController@getReport');
Route::post('home/waste', 'WasteReportControllert@submitReport');

// Product Register
Route::get('home/products/create', 'ProductRegisterController@index')->name('product-register');
Route::get('home/products', 'ProductRegisterController@getProduct');
Route::post('home/products', 'ProductRegisterController@submitProduct');

// Product Sold
Route::get('home/sold/create', 'ProductSoldController@index')->name('product-sold');
Route::get('home/sold', 'ProductSoldController@getReport');
Route::post('home/sold', 'ProductSoldController@submitReport');
