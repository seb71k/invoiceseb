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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/newinvoice', function () {
    return view('newinvoice');
});


//insert nuova fattura
Route::get('insert','invoiceinsertController@insertform');
Route::post('create','invoiceinsertController@insert');
//insert righe fattura
Route::get('insertrow','rowinsertController@insertformrow');
Route::post('createrow','rowinsertController@insertrow');