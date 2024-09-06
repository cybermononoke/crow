<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\BirdseyeController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\ShopController;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/guest', function () {
    return view('guest');
})->name('guest');

Route::get('/shop', function () {
    return view('shop');
})->name('shop');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // ACCOUNTS (move to auth)
    Route::get('/accounts', [AccountController::class, 'show'])->name('accounts');
    Route::get('/accounts/create', [AccountController::class, 'create'])->name('accounts.create');
    Route::post('/accounts/store', [AccountController::class, 'store'])->name('accounts.store');

    // BUDGETS
    Route::get('/budgets', [BudgetController::class, 'index'])->name('budgets.index');
    Route::get('/budgets/create', [BudgetController::class, 'create'])->name('budgets.create');
    Route::post('/budgets', [BudgetController::class, 'store'])->name('budgets.store');
    Route::get('/budgets/{budget}', [BudgetController::class, 'show'])->name('budgets.show');
    Route::get('/budgets/{budget}/edit', [BudgetController::class, 'edit'])->name('budgets.edit');
    Route::put('/budgets/{budget}', [BudgetController::class, 'update'])->name('budgets.update');
    Route::delete('/budgets/{budget}', [BudgetController::class, 'destroy'])->name('budgets.destroy');

    // SPENDING
    Route::get('/spendings/create', [SpendingController::class, 'create'])->name('spendings.create');
    Route::post('/spendings', [SpendingController::class, 'store'])->name('spendings.store');

    // BIRDSEYE
    Route::get('/birdseye', function () {
        return view('birdseye');
    })->name('birdseye');
    // Route::get('/birdseye', [BirdseyeController::class, 'birdseye'])->name('birdseye');
    Route::get('/birdseye', [BirdseyeController::class, 'index'])->name('birdseye');


    // PRODUCTS
    Route::get('/shop', [ShopController::class, 'index'])->name('shop');
});




require __DIR__ . '/auth.php';
