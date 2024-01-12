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
use App\Http\Controllers\ServiceBillController;



Auth::routes();





Route::get('/', [HomeController::class, 'index'])->name('home');



Route::get('/edit_profile', [HomeController::class, 'edit_profile'])->name('edit_profile');
Route::POST('/update_profile/{id}', [HomeController::class, 'update_profile'])->name('update_profile');
Route::get('/password_change/', [HomeController::class, 'update_password'])->name('update_password');





Route::get('/sales', [SalesController::class, 'index'])->name('sales.index');


Route::get('/findPrice', [InvoiceController::class, 'findPrice'])->name('findPrice');

Route::resource('customer', CustomerController::class);
Route::resource('product', ProductController::class);
Route::resource('invoice', InvoiceController::class);
Route::resource('project', ProjectController::class);
Route::resource('income', IncomeController::class);
Route::resource('supplier', SupplierController::class);
Route::resource('purchase', PurchaseController::class);
Route::resource('expense', ExpenseController::class);

Route::GET('/incomeitem/getincomitem', [IncomeController::class,'getitem'])->name('incomeitem.getitem');
Route::POST('/incomeitem/getincomitem', [IncomeController::class,'storeitem'])->name('incomeitem.storeitem');

Route::GET('/expenseitem/getitem', [ExpenseController::class,'getitem'])->name('expenseitem.getitem');
Route::POST('/expenseitem/getitem', [ExpenseController::class,'storeitem'])->name('expenseitem.storeitem');

Route::GET('/purchaseitem/getitem', [PurchaseController::class,'getitem'])->name('purchaseitem.getitem');
Route::POST('/purchaseitem/getitem', [PurchaseController::class,'storeitem'])->name('purchaseitem.storeitem');

Route::GET('/test/gettest', [PurchaseController::class,'gettest'])->name('test.gettest');
Route::GET('/test/getData', [PurchaseController::class,'getData'])->name('test.getData');







Route::GET('/servicebill', [ServiceBillController::class,'index'])->name('servicebill.index');
Route::GET('/servicebill/create', [ServiceBillController::class,'create'])->name('servicebill.create');
Route::POST('/servicebill', [ServiceBillController::class,'store'])->name('servicebill.store');
Route::GET('/servicebill/{id}', [ServiceBillController::class,'show'])->name('servicebill.show');
Route::GET('/servicebill/edit/{id}', [ServiceBillController::class,'edit'])->name('servicebill.edit');
Route::PUT('/servicebill/{id}', [ServiceBillController::class,'update'])->name('servicebill.update');
Route::DELETE('/servicebill/{id}', [ServiceBillController::class,'destroy'])->name('servicebill.destroy');





