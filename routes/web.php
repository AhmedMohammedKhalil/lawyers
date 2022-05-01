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
Route::get('/', 'HomeController@index')->name('home');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/specialization_lawyers', 'HomeController@showSpecialization')->name('specialization.lawyers');
Route::get('/lawyer_details', 'HomeController@showLawyer')->name('lawyer.details');


Route::middleware(['guest:admin', 'guest:lawyer', 'guest:user'])->group(function () {
    Route::get('/admin/login', 'Auth\LoginController@adminLogin')->name('admin.login');
    Route::get('/user/login_register', 'Auth\LoginController@userLoginRegister')->name('user.login_register');
    Route::get('/lawyer/login_register', 'Auth\LoginController@lawyerLoginRegister')->name('lawyer.login_register');

});


Route::middleware(['auth:admin'])->name('admin.')->prefix('admin')->group(function () {
    Route::get('/dashboard', 'AdminController@dashboard')->name('dashboard');
    Route::get('/profile', 'AdminController@profile')->name('profile');
    Route::get('/settings', 'Auth\SettingsController@adminSettings')->name('settings');
    Route::get('/logout', 'Auth\LoginController@adminLogout')->name('logout');

    Route::prefix('/specializaion')->name('specialization.')->group(function () {
        Route::get('/index', 'SpecializationController@index')->name('index');
        Route::get('/edit', 'SpecializationController@edit')->name('edit');
        Route::delete('/delete', 'SpecializationController@delete')->name('delete');

    });
});

Route::middleware(['auth:lawyer'])->name('lawyer.')->prefix('lawyer')->group(function () {
    Route::get('/profile', 'LawyerController@profile')->name('profile');
    Route::get('/consulations', 'LawyerController@showConsulations')->name('consulations');
    Route::get('/consulations/show', 'LawyerController@getConsulation')->name('consulations.show');
    Route::get('/booking/show', 'LawyerController@showBooking')->name('bookings.show');
    Route::get('/booking/accept', 'LawyerController@acceptBooking')->name('bookings.accept');
    Route::get('/booking/reject', 'LawyerController@rejectBooking')->name('bookings.reject');



    Route::get('/settings', 'Auth\SettingsController@lawyerSettings')->name('settings');
    Route::get('/logout', 'Auth\LoginController@lawyerLogout')->name('logout');

    Route::prefix('/services')->name('services.')->group(function () {
        Route::get('/index', 'ServiceController@index')->name('index');
        Route::get('/edit', 'ServiceController@edit')->name('edit');
        Route::delete('/delete', 'ServiceController@delete')->name('delete');

    });
});
Route::middleware(['auth:user'])->name('user.')->prefix('user')->group(function () {
    Route::get('/profile', 'UserController@profile')->name('profile');
    Route::get('/consulations', 'UserController@showConsulations')->name('consulations');
    Route::get('/consulations/show', 'UserController@getConsulation')->name('consulations.show');
    Route::get('/consulations/add', 'UserController@addConsulation')->name('consulations.add');

    Route::get('/bookings/add', 'UserController@addBooking')->name('bookings.add');
    Route::get('/bookings/show', 'UserController@showBooking')->name('bookings.show');

    Route::get('/settings', 'Auth\SettingsController@userSettings')->name('settings');
    Route::get('/logout', 'Auth\LoginController@userLogout')->name('logout');
});
