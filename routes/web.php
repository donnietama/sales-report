<?php

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Report Summaries
Route::get('home/summaries/create', 'ReportSummaryController@index')->name('report-summary');
Route::get('home/summaries', 'ReportSummaryController@show');
Route::post('home/summaries', 'ReportSummaryController@store');

// Batch Report
Route::get('home/batch/create', 'ReportBatchController@index')->name('report-batch');
Route::get('home/batch', 'ReportBatchController@show');
Route::post('home/batch', 'ReportBatchController@store');

// Product Ingredient
Route::get('home/ingredients/create', 'Ingredient@index')->name('product-ingredient');
Route::get('home/ingredients', 'Ingredient@show');
Route::post('home/ingredients', 'Ingredientt@store');

// Waste Report
Route::get('home/waste/create', 'ReportWasteController@index')->name('report-waste');
Route::get('home/waste', 'ReportWasteController@show');
Route::post('home/waste', 'ReportWasteController@store');

// Product Register
Route::get('home/products/create', 'ProductController@index')->name('product-register');
Route::get('home/products', 'ProductController@show');
Route::post('home/products', 'ProductController@store');

// Topping Register
Route::get('home/topping/create', 'ToppingController@index')->name('register-topping');
Route::get('home/topping', 'ToppingController@show');
Route::post('home/topping', 'ToppingController@store');

// Product Sold
Route::get('home/sold/create', 'ReportProductSoldController@index')->name('product-sold');
Route::get('home/sold', 'ReportProductSoldController@show');
Route::post('home/sold', 'ReportProductSoldController@store');

// Additional Report
Route::get('home/additional/create', 'ReportAdditionalController@index')->name('additional-report');
Route::get('home/additional', 'ReportAdditionalController@show');
Route::post('home/additional', 'ReportAdditionalController@store');
