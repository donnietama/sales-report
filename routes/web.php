<?php


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * Resource environtment.
 * -------------------------------------
 * This route would be used for accessing api.
 */
// Reports.
Route::get('api/reports', 'ReportsController@index');
Route::get('api/reports/batch', 'ReportBatchController@showAll');
Route::get('api/reports/productsold', 'ReportProductSoldController@showAll');
Route::get('api/reports/product-sold/best-seller', 'ReportProductSoldController@showBestSeller');
Route::get('api/reports/product-sold/this-month', 'ReportProductSoldController@showCountedNow');
Route::get('api/reports/product-sold/last-month', 'ReportProductSoldController@showCountedLastMonth');
Route::get('api/reports/product-sold/last-two-month', 'ReportProductSoldController@showCountedLastTwoMonth');
Route::get('api/reports/waste', 'ReportWasteController@showAll');
Route::get('api/reports/additional', 'ReportAdditionalController@showAll');
Route::get('api/reports/summary', 'ReportSummaryController@showAll');

// Objective resources.
Route::get('resources/products', 'Resources\ProductController@index');
Route::get('resources/products/all', 'Resources\ProductController@showAll');

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

// Toppings.
Route::get('admin/topping/create', 'ToppingController@index')->name('add-topping');
Route::get('topping', 'ToppingController@show');
Route::get('topping/paginated', 'ToppingController@showPaginated');
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
})->name('view-reports');

Route::get('admin/reporting/summaries', function () {
    return view('admin.reporting.summaries');
})->name('view-summaries');

Route::get('admin/reporting/batches', function () {
    return view('admin.reporting.batches');
})->name('view-batches');

Route::get('admin/reporting/productsolds', function () {
    return view('admin.reporting.productsolds');
})->name('view-solds');

Route::get('admin/reporting/wastes', function () {
    return view('admin.reporting.wastes');
})->name('view-wastes');

Route::get('admin/reporting/additionals', function () {
    return view('admin.reporting.additionals');
})->name('view-additionals');

// Ingredients.
Route::get('admin/ingredient/create', 'IngredientController@index')->name('add-ingredient');
Route::get('ingredient', 'IngredientController@show');
Route::get('ingredient/paginated', 'IngredientController@showPaginated');
Route::post('ingredient', 'IngredientController@store');

// Products.
Route::get('admin/product', 'ProductController@index')->name('view-product');
Route::get('admin/product/create', 'ProductController@create')->name('add-product');
Route::get('admin/product/{slug}', 'Resources\ProductController@getBatchQuantity');
Route::get('admin/product/{slug}', 'ProductController@show');
Route::get('admin/product/{slug}/edit', 'ProductController@edit')->name('edit-product');
Route::post('admin/product', 'ProductController@store');

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


Route::get('counted/batches', 'CountBatchesController@index')->name('view-counted-batches');
Route::get('/users', 'UserController@index');