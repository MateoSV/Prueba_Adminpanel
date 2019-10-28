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

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('logout', function (){
    Auth::logout();

    Session::flush();

    return redirect('login');
});
Route::get('/home', 'HomeController@index')->name('home');
Route::group(['namespace' => 'ProjectControllers', 'middleware' => 'auth'], function () {
    Route::get('/companies/{company}/logo', 'CompanyController@logo');
    Route::resource('companies', 'CompanyController');
    Route::resource('employees', 'EmployeeController');
});


Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
