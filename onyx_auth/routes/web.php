<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Auth::routes(['register' => false, 'reset' => false]);

Route::get('/dashboard', 'HomeController@index')->name('dashboard');


//Products
Route::resource('/products', 'ProductController');

// Clients
Route::resource('/clients', 'ClientController');

// Budgets
Route::resource('/budgets', 'BudgetController');
Route::post('/budgets/addProduct', 'BudgetController@addProduct');
Route::get('/budgets/excelExport/{id}', 'BudgetController@excelExport')->name('budgets.excelExport');
Route::get('/budgets/excelView/{id}', 'BudgetController@excelView')->name('budgets.excelView');
Route::get('/budgets/duplicate/{id}', 'BudgetController@duplicate')->name('budgets.duplicate');

// Invoices
Route::resource('/invoices', 'InvoiceController');
Route::post('/invoices/addProduct', 'InvoiceController@addProduct');
Route::get('/invoices/excelExport/{id}', 'InvoiceController@excelExport')->name('invoices.excelExport');
Route::get('/invoices/excelView/{id}', 'InvoiceController@excelView')->name('invoices.excelView');
Route::get('/invoices/duplicate/{id}', 'InvoiceController@duplicate')->name('invoices.duplicate');
