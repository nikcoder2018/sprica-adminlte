<?php

use Illuminate\Support\Facades\Route;

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


Route::middleware(['auth', 'auth.is-staff'])->group(function(){
    Route::get('/', 'TimesController@index')->name('times');
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('vacations', 'VacationController@index')->name('vacations');
    Route::get('wages', 'WageController@index')->name('wages');
    Route::get('psa', 'PSAController@index')->name('psa');
    
    Route::resource('timelogs', 'TimesController');
});

Route::prefix('admin')->name('admin.')->middleware(['auth','auth.is-admin'])->group(function (){
    Route::get('dashboard', 'Admin\DashboardController@index')->name('dashboard');
    Route::get('timetracking', 'Admin\TimeTrackingController@index')->name('timetracking');
    
    Route::get('wageplan', 'Admin\WagePlanController@index')->name('wageplan');
    Route::get('wageplan/total', 'Admin\WagePlanController@total')->name('wageplan.total');
    Route::get('wageplan/advance', 'Admin\WagePlanController@advance')->name('wageplan.advance');

    Route::resource('staffs', 'Admin\StaffController');
});
