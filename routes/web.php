<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * API environtment.
 * -------------------------------------
 * This route would be used for accessing api.
 */
Route::get('api', 'UserController@index');

/**
 * Administrator environtment.
 * -------------------------------------
 * This routes would be used for administrators access.
 */

// Summaries.
Route::get('home/summaries/create', 'ReportSummaryController@index')->name('report-summary');
Route::get('home/summaries', 'ReportSummaryController@show');
Route::post('home/summaries', 'ReportSummaryController@store');

// Batches.
Route::get('home/batch/create', 'ReportBatchController@index')->name('report-batch');
Route::get('home/batch', 'ReportBatchController@show');
Route::post('home/batch', 'ReportBatchController@store');

// Ingredients.
Route::get('home/ingredients/create', 'Ingredient@index')->name('product-ingredient');
Route::get('home/ingredients', 'Ingredient@show');
Route::post('home/ingredients', 'Ingredientt@store');

// Wastes.
Route::get('home/waste/create', 'ReportWasteController@index')->name('report-waste');
Route::get('home/waste', 'ReportWasteController@show');
Route::post('home/waste', 'ReportWasteController@store');

// Products.
Route::get('home/products/create', 'ProductController@index')->name('product-register');
Route::get('home/products', 'ProductController@show');
Route::post('home/products', 'ProductController@store');

// Toppings.
Route::get('home/topping/create', 'ToppingController@index')->name('register-topping');
Route::get('home/topping', 'ToppingController@show');
Route::post('home/topping', 'ToppingController@store');

// Product Solds.
Route::get('home/sold/create', 'ReportProductSoldController@index')->name('product-sold');
Route::get('home/sold', 'ReportProductSoldController@show');
Route::post('home/sold', 'ReportProductSoldController@store');

// Additionals.
Route::get('home/additional/create', 'ReportAdditionalController@index')->name('additional-report');
Route::get('home/additional', 'ReportAdditionalController@show');
Route::post('home/additional', 'ReportAdditionalController@store');

/**
 * Administrator environtment.
 * -------------------------------------
 * This routes would be used for administrators access.
 */
