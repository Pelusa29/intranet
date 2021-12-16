<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\DriverController;
use Illuminate\Support\Facades\Auth;

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
if(!Auth::check()) {
    Route::get('/', function () {
        return view('login');
    })->name('login');
}
Route::get('/', function () {
    return view('index');
});

Route::get('/document',[DocumentController::class,'index'])->name('document');
Route::get('create',[DocumentController::class,'create'])->name('create');
Route::post('store',[DocumentController::class,'store'])->name('store');
Route::get('show/{document}',[DocumentController::class,'show'])->name('show');
Route::get('editar/{document}/editar',[DocumentController::class,'edit'])->name('editar');
Route::post('update/{document}',[DocumentController::class,'update'])->name('update');
Route::delete('destroy/{document}', [DocumentController::class, 'destroy'])->name('destroy');

//Driver
Route::get('createDirver',[DriverController::class,'create'])->name('createDriver');
Route::get('editard/{document}/editard',[DriverController::class,'edit'])->name('editard');
Route::post('updated/{document}',[DriverController::class,'update'])->name('updated');
Route::delete('destroy/{document}', [DriverController::class,'destroy'])->name('destroy');