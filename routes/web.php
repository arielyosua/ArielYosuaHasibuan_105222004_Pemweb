<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SchedulerController;
use App\Http\Controllers\EventController;


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
use App\Jawaban\NomorSatu;
use App\Jawaban\NomorDua;
use App\Jawaban\NomorTiga;
use App\Jawaban\NomorEmpat;

Route::get('/event/get-json', [NomorEmpat::class, 'getJson'])->name('event.get-json');

Route::get('/event/getData', [NomorTiga::class, 'getData'])->name('event.getData');
Route::get('/event/{id}', [NomorTiga::class, 'getSelectedData']);
Route::put('/event/{id}/update', [NomorTiga::class, 'update'])->name('event.update');
Route::delete('/event/{id}/delete', [NomorTiga::class, 'delete']);

Route::get('/event', [NomorDua::class, 'home'])->name('event.home');
Route::post('/event/submit', [NomorDua::class, 'submit'])->name('event.submit');

Route::post('/login', [NomorSatu::class, 'auth'])->name('auth.login');
Route::post('/logout', [NomorSatu::class, 'logout'])->name('auth.logout');

Route::post('auth', [AuthController::class, 'auth'])->name('auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::prefix('event')->name('event.')->group(function(){
    Route::get('/', [SchedulerController::class, 'home'])->name('home');
    Route::post('submit', [SchedulerController::class, 'submit'])->name('submit');
    Route::post('update', [SchedulerController::class, 'update'])->name('update');
    Route::post('delete', [SchedulerController::class, 'delete'])->name('delete');
    Route::get('get-json', [SchedulerController::class, 'getJson'])->name('get-json');
    Route::get('get-selected-data', [SchedulerController::class, 'getSelectedData'])->name('get-selected-data');
});
