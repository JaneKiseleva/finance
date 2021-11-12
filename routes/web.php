<?php

use App\Http\Controllers\CashflowController;
use App\Http\Controllers\ChangePasswordController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FinalOperationController;
use App\Http\Controllers\OperationExpenditureController;
use App\Http\Controllers\OperationIncomeController;
use App\Http\Controllers\TargetController;
use App\Http\Controllers\UserController;
use App\Services\CommandCashflow;
use Illuminate\Support\Facades\Route;

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

require __DIR__.'/auth.php';


//cashflow
Route::get('/cashflow', [CashflowController::class, 'index'])->middleware(['auth'])->name('cashflow');

//profile

Route::get('/profile', [UserController::class, 'index'])->middleware(['auth'])->name('profile');
Route::get('/profile/{user}/edit', [UserController::class, 'edit'])->middleware(['auth']);
Route::patch('/profile/{user}', [UserController::class, 'update'])->middleware(['auth']);
Route::get('/profile/{user}/change', [UserController::class, 'createChangePassword'])->middleware(['auth'])->name('profile.change-password');
Route::post('/profile/sendLink', [UserController::class, 'sendPasswordLink'])->middleware(['auth'])->name('profile.send-link');

//dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth'])->name('dashboard');
Route::post('/dashboard', [DashboardController::class, 'store'])->middleware(['auth']);

//operations - income
Route::get('/operations/income', [OperationIncomeController::class, 'index'])->middleware(['auth'])->name('operations.income');
Route::post('/operations/income', [OperationIncomeController::class, 'store'])->middleware(['auth']);
Route::get('/operations/income/create', [OperationIncomeController::class, 'create'])->middleware(['auth']);
Route::get('/operations/income/{operation}/edit', [OperationIncomeController::class, 'edit'])->middleware(['auth']);
Route::patch('/operations/income/{operation}', [OperationIncomeController::class, 'update'])->middleware(['auth']);
Route::delete('/operations/income/{operation}', [OperationIncomeController::class, 'destroy'])->middleware(['auth']);
Route::get('/operations/incomes', [FinalOperationController::class, 'showIncomes'])->middleware(['auth']);

//operations - expenditure
Route::get('/operations/expenditure', [OperationExpenditureController::class, 'index'])->middleware(['auth'])->name('operations.expenditure');
Route::post('/operations/expenditure', [OperationExpenditureController::class, 'store'])->middleware(['auth']);
Route::get('/operations/expenditure/create', [OperationExpenditureController::class, 'create'])->middleware(['auth']);
Route::get('/operations/expenditure/{operation}/edit', [OperationExpenditureController::class, 'edit'])->middleware(['auth']);
Route::patch('/operations/expenditure/{operation}', [OperationExpenditureController::class, 'update'])->middleware(['auth']);
Route::delete('/operations/expenditure/{operation}', [OperationExpenditureController::class, 'destroy'])->middleware(['auth']);
Route::get('/operations/expenditures', [FinalOperationController::class, 'showExpenditures'])->middleware(['auth']);

//targets
Route::get('/target', [TargetController::class, 'index'])->middleware(['auth'])->name('target');
Route::post('/target', [TargetController::class, 'store'])->middleware(['auth']);
Route::get('/target/create', [TargetController::class, 'create'])->middleware(['auth']);
Route::get('/target/{target}/edit', [TargetController::class, 'edit'])->middleware(['auth']);
Route::patch('/target/{target}', [TargetController::class, 'update'])->middleware(['auth']);
Route::delete('/target/{target}', [TargetController::class, 'destroy'])->middleware(['auth']);
Route::get('/targets', [TargetController::class, 'show'])->middleware(['auth']);

//finalOperation

//Route::get('/final', [FinalOperationController::class, 'monthsOfFiveYear']);
//Route::get('/final1', [FinalOperationController::class, 'getOperationsIncome']);
