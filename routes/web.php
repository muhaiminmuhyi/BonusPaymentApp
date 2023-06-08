<?php

use App\Http\Controllers\Auth\RedirectAuthenticatedUsersController;
use App\Http\Controllers\Buruh;
use App\Http\Controllers\BuruhController;
use App\Http\Controllers\IncomeTransaction;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('auth')->group(function () {
    Route::get('/redirectAuthenticatedUsers', [RedirectAuthenticatedUsersController::class, "home"]);

    //dashboard
    Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');

    //profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //income transactions
    Route::resource('/income_transactions', IncomeTransaction::class);

    //worker
    Route::resource('/worker', BuruhController::class);

    
        // Route::group(['middleware' => 'checkRole:guest'], function() {
        //     Route::get('/dashboard', function () {return view('dashboard');})->name('dashboard');
        //     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
        //     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        //     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
        // });


});

require __DIR__.'/auth.php';
