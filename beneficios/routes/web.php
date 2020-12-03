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


Auth::routes();

// Route::get('/', 'Auth\LoginController@showLoginForm')->name('login');
// Route::post('login', 'Auth\LoginController@login');
// Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
// Route::post('register', 'Auth\RegisterController@register');

//admin
// Route::middleware(['auth'])->group(function () {
    Route::get('/', 'UserController@dashboard')->name('dashboard');
    
    //Employee
    Route::get('employee/showEmployee', 'EmployeeController@showEmployee')->name('employee');
    Route::post('employee/store', 'EmployeeController@employeeStore')->name('employeeStore');
    Route::post('employee/getEmployeeById', 'EmployeeController@getEmployeeById')->name('getEmployeeById');
    Route::post('employee/update', 'EmployeeController@employeeUpdate')->name('employeeUpdate');
    Route::post('employee/delete', 'EmployeeController@employeeDelete')->name('employeeDelete');
    Route::post('employee/cardNumberCheck', 'EmployeeController@cardNumberCheck')->name('cardNumberCheck');
    Route::post('employee/import', 'EmployeeController@employeeImport')->name('employeeImport');

    //CardPrint
    Route::get('cardPrint/showCardPrint', 'CardPrintController@showCardPrint')->name('showCardPrint');

// });