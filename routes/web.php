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
Route::get('api/reports', 'ReportsController@index');
Route::get('api/reports/batch', 'ReportBatchController@showAll');
Route::get('api/reports/productsold', 'ReportProductSoldController@showAll');
Route::get('api/reports/waste', 'ReportWasteController@showAll');
Route::get('api/reports/additional', 'ReportAdditionalController@showAll');
Route::get('api/reports/summary', 'ReportSummaryController@showAll');

/**
 * User environtment.
 * -------------------------------------
 * This routes would be used for Users access.
 */

// Summaries.
Route::get('summaries/create', 'ReportSummaryController@index')->name('report-summary');
Route::get('summaries', 'ReportSummaryController@show');
Route::post('summaries', 'ReportSummaryController@store');

// Batches.
Route::get('batch/create', 'ReportBatchController@index')->name('report-batch');
Route::get('batch', 'ReportBatchController@show');
Route::post('batch', 'ReportBatchController@store');

// Wastes.
Route::get('waste/create', 'ReportWasteController@index')->name('report-waste');
Route::get('waste', 'ReportWasteController@show');
Route::post('waste', 'ReportWasteController@store');

// Products.
Route::get('products/create', 'ProductController@index')->name('product-register');
Route::get('products', 'ProductController@show');
Route::post('products', 'ProductController@store');

// Toppings.
Route::get('topping/create', 'ToppingController@index')->name('register-topping');
Route::get('topping', 'ToppingController@show');
Route::post('topping', 'ToppingController@store');

// Product Solds.
Route::get('sold/create', 'ReportProductSoldController@index')->name('product-sold');
Route::get('sold', 'ReportProductSoldController@show');
Route::post('sold', 'ReportProductSoldController@store');

// Additionals.
Route::get('additional/create', 'ReportAdditionalController@index')->name('additional-report');
Route::get('additional', 'ReportAdditionalController@show');
Route::post('additional', 'ReportAdditionalController@store');

/**
 * Administrator environtment.
 * -------------------------------------
 * This routes would be used for administrators access.
 */
Route::get('admin/reporting', function () {
    return view('admin.reporting.index');
})->name('reporting-index');

Route::get('admin/reporting/summaries', function () {
    return view('admin.reporting.summaries');
})->name('reporting-summaries');

Route::get('admin/reporting/batches', function () {
    return view('admin.reporting.batches');
})->name('reporting-batches');

Route::get('admin/reporting/productsolds', function () {
    return view('admin.reporting.productsolds');
})->name('reporting-productsolds');

Route::get('admin/reporting/wastes', function () {
    return view('admin.reporting.wastes');
})->name('reporting-wastes');

Route::get('admin/reporting/additionals', function () {
    return view('admin.reporting.additionals');
})->name('reporting-additionals');

// Ingredients.
Route::get('admin/ingredients', 'Ingredient@index')->name('product-ingredient');
Route::get('ingredients', 'Ingredient@show');
Route::post('ingredients', 'Ingredientt@store');

/**
 * Search engine environtment.
 * -------------------------------------
 * This routes would be used for Search engine data.
 */
Route::post('search/batches', 'ReportBatchController@getRequested');
Route::post('search/productsolds', 'ReportProductSoldController@getRequested');
Route::post('search/wastes', 'ReportWasteController@getRequested');
Route::post('search/additionals', 'ReportAdditionalController@getRequested');
Route::post('search/summaries', 'ReportSummaryController@getRequested');

/**
 * Exporting environtment.
 * -------------------------------------
 * This routes would be used for Exporting data.
 */
Route::post('export/batches', 'ReportBatchController@export');
Route::post('export/productsolds', 'ReportProductSoldController@export');
Route::post('export/wastes', 'ReportWasteController@export');
Route::post('export/additionals', 'ReportAdditionalController@export');
Route::post('export/summaries', 'ReportSummaryController@export');
