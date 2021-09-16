<?php

use App\Http\Controllers\Admin\DetailPlanController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('admin')->namespace('Admin')->group(function () {
    /**
     *  Details Plans
    */
    Route::get('plans/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

    /**
     *  Plans
    */
    Route::get('plans/create', 'PlanController@create')->name('plans.create');
    Route::put('plan/{url}', 'PlanController@update')->name('plan.update');
    Route::get('plan/{url}/edit', 'PlanController@edit')->name('plan.edit');
    Route::any('plans/search', 'PlanController@search')->name('plans.search');
    Route::delete('plans/{url}', 'PlanController@destroy')->name('plans.destroy');
    Route::get('plans/{url}', 'PlanController@show')->name('plans.show');
    Route::post('plans', 'PlanController@store')->name('plans.store');
    Route::get('plans', 'PlanController@index')->name('plans.index');
    Route::get('/', 'Admin\PlanController@index')->name('admin.index');
});


// Route::get('/', function () {
//     return view('welcome');
// });
