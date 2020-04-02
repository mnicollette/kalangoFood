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

Route::get('admin/planos/criar', 'Admin\PlanController@create')->name('plans.create');
Route::any('admin/planos/search', 'Admin\PlanController@search')->name('plans.search');
Route::delete('admin/planos/{url}', 'Admin\PlanController@destroy')->name('plans.destroy');
Route::get('admin/planos/{url}', 'Admin\PlanController@show')->name('plans.show');
Route::post('admin/planos', 'Admin\PlanController@store')->name('plans.store');
Route::get('admin/planos', 'Admin\PlanController@index')->name('plans.index');

Route::get('/', function () {
    return view('welcome');
});
