<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\frontend\PatientController;
use App\Http\Controllers\frontend\ReportController;


/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');

/*
 * These frontend controllers require the user to be logged in
 * All route names are prefixed with 'frontend.'
 * These routes can not be hit if the password is expired
 */
Route::group(['middleware' => ['auth', 'password_expires']], function () {
    Route::group(['namespace' => 'User', 'as' => 'user.'], function () {
        /*
         * User Dashboard Specific
         */
        Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

        /*
         * User Account Specific
         */
        Route::get('account', [AccountController::class, 'index'])->name('account');
        Route::get('account/summary', [AccountController::class, 'index'])->name('summary');
        Route::get('account/documents', [AccountController::class, 'index'])->name('documents');
        Route::get('account/records', [AccountController::class, 'index'])->name('records');
        Route::post('account/add_documents', [AccountController::class, 'add_documents'])->name('add_documents.post');
        Route::get('account/delete_document/{id}/{fileName}', [AccountController::class, 'delete_my_documents'])->name('delete_document');


        Route::resource('patients', 'PatientController');
        Route::resource('reports', 'ReportController');


        /*
         * User Profile Specific
         */
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');

    });
});


