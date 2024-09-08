<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SearchController;


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

Route::get('/search', [SearchController::class, 'showForm'])->name('search.form');
Route::post('/search', [SearchController::class, 'handleSearch'])->name('search.handle');
Route::get('/export-csv', [SearchController::class, 'exportToCsv']);