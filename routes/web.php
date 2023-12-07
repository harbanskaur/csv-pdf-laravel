<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\ShowController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [ShowController::class,'index'])->name('index');
Route::post('/login', [LoginController::class,'login'])->name('login');
Route::get('/Download', [ShowController::class, 'Download']);
Route::get('/image', [ShowController::class, 'image']);
Route::post('/uploadImage', [UploadController::class, 'uploadImage'])->name('upload.image');
Route::post('/uploadCsv', [PdfController::class, 'uploadCsv'])->name('upload.csv');
Route::post('/downloadImages', [DownloadController::class, 'downloadImages'])->name('download.images');
Route::get('/ChangePass', [ShowController::class,'ChangePass']);
Route::get('/logout', [LoginController::class,'logout'])->name('logout');
Route::post('/change-password', [LoginController::class,'changePassword'])->name('change.password');