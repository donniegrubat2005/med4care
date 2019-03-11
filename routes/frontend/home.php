<?php

use App\Http\Controllers\Frontend\HomeController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\User\AccountController;
use App\Http\Controllers\Frontend\User\ProfileController;
use App\Http\Controllers\Frontend\User\DashboardController;
use App\Http\Controllers\frontend\PatientController;
use App\Http\Controllers\frontend\ReportController;
use App\Http\Controllers\Frontend\User\Wallet\UserWalletController;
use App\Http\Controllers\frontend\user\wallet\DepositController;
use App\Http\Controllers\frontend\user\wallet\TransferController;
use App\Http\Controllers\Frontend\User\Wallet\WithdrawController;
use App\Http\Controllers\frontend\user\wallet\WalletController;
use App\Http\Controllers\Backend\Auth\User\UserController;
/*
 * Frontend Controllers
 * All route names are prefixed with 'frontend.'.
 */

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/send', [ContactController::class, 'send'])->name('contact.send');
Route::get('getusers', [ContactController::class, 'getUsers'])->name('getusers');

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

        Route::get('verification', [DashboardController::class, '_verification'])->name('dashboard');

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

        
        Route::get('download/{id}', [UserController::class, 'download'])->name('download');


        Route::group(['namespace' => 'Wallet'], function () {

            Route::group(['prefix' => 'wallet'], function () {
              
                Route::get('/', [UserWalletController::class, 'index'])->name('wallet.index');
                Route::get('accounts', [UserWalletController::class, '_accounts'])->name('wallet.accounts');
                Route::get('account/create', [UserWalletController::class, 'create'])->name('wallet.account.create');
                Route::post('account/post', [UserWalletController::class, 'store'])->name('wallet.account.post');   

             
                //ajax call back
                Route::get('walletBalance/{id}', [WalletController::class, 'walletBalance']);

                //
                Route::get('overview', [WalletController::class, 'index'])->name('wallet.overview');
              
                Route::post('create', [WalletController::class, 'store'])->name('wallet.create');

                Route::get('cash-in', [DepositController::class, 'index'])->name('wallet.cash-in');
                Route::post('cash-in/post', [DepositController::class, 'store'])->name('wallet.cash-in.post');

                Route::get('withdraw', [WithdrawController::class, 'index'])->name('wallet.withdraw');

                Route::post('withdraw/post', [WithdrawController::class, 'store'])->name('wallet.withdraw.post');


            });


            // Route::group(['prefix' => 'wallet/deposit'], function () {
            //     Route::get('/', [DepositController::class, 'index'])->name('wallet.deposit.index');
            //     // Route::get('overt', [DepositController::class, 'index'])->name('wallet.deposit.index');
            //     // Route::get('create', [DepositController::class, 'create'])->name('wallet.deposit.create');
            //     // Route::post('post', [DepositController::class, 'store'])->name('wallet.deposit.post');
            //     // Route::get('getWallets', [DepositController::class, '_ge_wallets']);
            // });

            // Route::group(['prefix' => 'wallet/transfer'], function () {
            //     Route::get('/', [TransferController::class, 'index'])->name('wallet.transfer.index');
            // });

            // Route::group(['prefix' => 'wallet/withdraw'], function () {
            //     Route::get('/', [WithdrawController::class, 'index'])->name('wallet.withdraw.index');
            //     Route::post('post', [WithdrawController::class, 'store'])->name('wallet.withdraw.post');
            // });


            // Route::group(['prefix' => 'wallet/{wallet}'], function () { });
        });





        /*
         * User Profile Specific
         */
        Route::patch('profile/update', [ProfileController::class, 'update'])->name('profile.update');
    });
});
