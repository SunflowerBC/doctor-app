<?php

use App\Http\Controllers\LoginRegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\CategoryController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::controller(LoginRegisterController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login')->name('login');
});

// authorized routes
    Route::middleware("auth:sanctum")->group(function ()
    {
    Route::post('/logout', [LoginRegisterController::class, 'logout']);

    Route::resource('/appointment', AppointmentController::class)->only('index', 'show');
    });

    Route::resource('/doctors', DoctorController::class)->only('index', 'show');
    Route::resource('/category', CategoryController::class)->only('index', 'show');
    Route::resource('/patients', PatientController::class)->only('index', 'show');
    Route::resource('/hospitals', HospitalController::class)->only('index', 'show');

