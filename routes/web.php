<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmptaskController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdsController;
use App\Http\Controllers\DepartmentController;

Route::group(['middleware' => ['auth']], function() {

    Route::get('/', function () {
        return view('index');
    });

    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('tasks', TaskController::class);
    Route::resource('ads',   AdsController::class);
    Route::resource('departments',   DepartmentController::class);

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/logout', [DashboardController::class, 'logout'])->name('logout');

    Route::resource('employees', EmptaskController::class);
    Route::get('/task/delete/{id}',[TaskController::class,'delete'])->name('task.delete');

    Route::get('/contacts', [contactController::class, 'index'])->name('contacts');
    Route::get('/contacts/create', [contactController::class, 'create'])->name('contacts.create');
    Route::post('/contacts/store', [contactController::class, 'store'])->name('contacts.store');
    Route::get('/contacts/show/{id}', [contactController::class, 'show'])->name('contacts.show');
});



