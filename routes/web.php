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
Route::get('home/product/create', 'ProductIngredientController@index')->name('product-ingredient');
Route::get('home/product', 'ProductIngredientController@getIngredients');
Route::post('home/product', 'ProductIngredientControllert@storeIngredients');

// Waste Report
Route::get('home/waste/create', 'WasteReportController@index')->name('report-waste');
Route::get('home/waste', 'WasteReportController@getReport');
Route::post('home/waste', 'WasteReportControllert@submitReport');