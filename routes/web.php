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

Route::get('/upload-pdf', 'PDFController@uploadPDFForm')->name('upload-pdf-form');
Route::post('/upload-pdf', 'PDFController@uploadPDF')->name('upload-pdf');
Route::get('/form-pdf', 'PDFController@showFilds')->name('pdf-form');
Route::post('/form-pdf', 'PDFController@store')->name('pdf-form-store');

Route::get('/download-pdf', 'PDFController@downloadPDF')->name('download-pdf');

Route::get('/', function () {

    return view('welcome');
});
