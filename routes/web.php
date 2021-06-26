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

Route::get('/', 'GeneralController@index')->name('home');

Route::get('/add-client', 'GeneralController@addClient')->name('profile.add.client');

Route::get('/list-client', 'GeneralController@listClient')->name('profile.list');

Route::get('/preview/{clientId}', 'GeneralController@viewClient')->name('profile.view');
