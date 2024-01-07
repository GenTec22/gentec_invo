<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\SalesController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\PurchaseController;



Auth::routes();





Route::get('/', [HomeController::class, 'index'])->name('home');



Route::get('/edit_profile', [HomeController::class, 'edit_profile'])->name('edit_profile');
Route::POST('/update_profile/{id}', [HomeController::class, 'update_profile'])->name('update_profile');
Route::get('/password_change/', [HomeController::class, 'update_password'])->name('update_password');




Route::resource('customer', CustomerController::class);
Route::resource('product', ProductController::class);
Route::resource('invoice', InvoiceController::class);
Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');


Route::get('/findPrice', [InvoiceController::class, 'findPrice'])->name('findPrice');



Route::GET('/project', [ProjectController::class,'index'])->name('project.index');
Route::GET('/project/create', [ProjectController::class,'create'])->name('project.create');
Route::POST('/project/create', [ProjectController::class,'store'])->name('project.store');
Route::GET('/project/show/{id}', [ProjectController::class,'show'])->name('project.show');
Route::GET('/project/edit/{id}', [ProjectController::class,'edit'])->name('project.edit');
Route::PUT('/project/{id}', [ProjectController::class,'update'])->name('project.update');
Route::DELETE('/project/{id}', [ProjectController::class,'destroy'])->name('project.destroy');

Route::GET('/income', [IncomeController::class,'index'])->name('income.index');
Route::GET('/income/create', [IncomeController::class,'create'])->name('income.create');
Route::POST('/income/create', [IncomeController::class,'store'])->name('income.store');
Route::GET('/income/show/{id}', [IncomeController::class,'show'])->name('income.show');
Route::GET('/income/edit/{id}', [IncomeController::class,'edit'])->name('income.edit');
Route::PUT('/income/{id}', [IncomeController::class,'update'])->name('income.update');
Route::DELETE('/income/{id}', [IncomeController::class,'destroy'])->name('income.destroy');
Route::GET('/incomeitem/getincomitem', [IncomeController::class,'getitem'])->name('incomeitem.getitem');
Route::POST('/incomeitem/getincomitem', [IncomeController::class,'storeitem'])->name('incomeitem.storeitem');


Route::GET('/expense', [ExpenseController::class,'index'])->name('expense.index');
Route::GET('/expense/create', [ExpenseController::class,'create'])->name('expense.create');
Route::POST('/expense/create', [ExpenseController::class,'store'])->name('expense.store');
Route::GET('/expense/show/{id}', [ExpenseController::class,'show'])->name('expense.show');
Route::GET('/expense/edit/{id}', [ExpenseController::class,'edit'])->name('expense.edit');
Route::PUT('/expense/{id}', [ExpenseController::class,'update'])->name('expense.update');
Route::DELETE('/expense/{id}', [ExpenseController::class,'destroy'])->name('expense.destroy');
Route::GET('/expenseitem/getitem', [ExpenseController::class,'getitem'])->name('expenseitem.getitem');
Route::POST('/expenseitem/getitem', [ExpenseController::class,'storeitem'])->name('expenseitem.storeitem');



Route::GET('/supplier', [SupplierController::class,'index'])->name('supplier.index');
Route::GET('/supplier/create', [SupplierController::class,'create'])->name('supplier.create');
Route::POST('/supplier/create', [SupplierController::class,'store'])->name('supplier.store');
Route::GET('/supplier/show/{id}', [SupplierController::class,'show'])->name('supplier.show');
Route::GET('/supplier/edit/{id}', [SupplierController::class,'edit'])->name('supplier.edit');
Route::PUT('/supplier/{id}', [SupplierController::class,'update'])->name('supplier.update');
Route::DELETE('/supplier/{id}', [SupplierController::class,'destroy'])->name('supplier.destroy');


Route::GET('/purchase', [PurchaseController::class,'index'])->name('purchase.index');
Route::GET('/purchase/create', [PurchaseController::class,'create'])->name('purchase.create');
Route::POST('/purchase/create', [PurchaseController::class,'store'])->name('purchase.store');
Route::GET('/purchase/show/{id}', [PurchaseController::class,'show'])->name('purchase.show');
Route::GET('/purchase/edit/{id}', [PurchaseController::class,'edit'])->name('purchase.edit');
Route::PUT('/purchase/{id}', [PurchaseController::class,'update'])->name('purchase.update');
Route::DELETE('/purchase/{id}', [PurchaseController::class,'destroy'])->name('purchase.destroy');
Route::GET('/purchaseitem/getitem', [PurchaseController::class,'getitem'])->name('purchaseitem.getitem');
Route::POST('/purchaseitem/getitem', [PurchaseController::class,'storeitem'])->name('purchaseitem.storeitem');


Route::GET('/test/gettest', [PurchaseController::class,'gettest'])->name('test.gettest');
