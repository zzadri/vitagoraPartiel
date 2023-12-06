<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\NotationController;
use League\Csv\src\Reader;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [HomeController::class, "Home"]);


Route::get('/Management', function () {
    return view('QuizzManagement');
})->name('Management');

Route::get('/Notation', [NotationController::class, "Notation"]);

Route::get('/upload', [UploadController::class, "UploadFile"])->name('upload');
Route::post('/upload', [UploadController::class, "UploadFilePost"])->name('upload.post');
