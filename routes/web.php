<?php

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

Route::prefix('admin')
        ->namespace('Admin')
        ->group(function() {

/*Routes Details Plan*/
Route::get('planos/{url}/details/create', 'DetailPlanController@create')->name('details.plan.create');
Route::put('planos/{url}/details/{idDetail}', 'DetailPlanController@update')->name('details.plan.update');
Route::get('planos/{url}/details/{idDetail}/edit', 'DetailPlanController@edit')->name('details.plan.edit');
Route::delete('planos/{url}/details/{idDetail}', 'DetailPlanController@destroy')->name('details.plan.destroy');
Route::post('planos/{url}/details', 'DetailPlanController@store')->name('details.plan.store');
Route::get('planos/{url}/details', 'DetailPlanController@index')->name('details.plan.index');

/*Routes Plan*/
Route::get('planos/criar', 'PlanController@create')->name('plans.create');
Route::put('planos/{url}', 'PlanController@update')->name('plans.update');
Route::get('planos/{url}/edit', 'PlanController@edit')->name('plans.edit');
Route::any('planos/search', 'PlanController@search')->name('plans.search');
Route::delete('planos/{url}', 'PlanController@destroy')->name('plans.destroy');
Route::get('planos/{url}', 'PlanController@show')->name('plans.show');
Route::post('planos', 'PlanController@store')->name('plans.store');
Route::get('planos', 'PlanController@index')->name('plans.index');


Route::get('admin', 'PlanController@index')->name('admin.index');

});

Route::get('/', function () {
    return view('welcome');
});
