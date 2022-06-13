<?php

use App\Http\Controllers\DoctorController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});
Route::get('/table', function(){
    return view('table');
});

Route::get('/',[DoctorController::class,'index'])->name('index');
Route::post('index', [DoctorController::class, 'store'])->name('store');
Route::get('/table', [DoctorController::class,'table'])->name('table');
Route::get('/doctor/delete/{doctor_id}', [DoctorController::class, 'doctordelete']);
Route::get('/doctor/edit/{doctor_id}', [DoctorController::class, 'doctoredit']);
Route::put('/doctor/info/update/{doctor_id}', [DoctorController::class, 'doctorinfoupdate']);
