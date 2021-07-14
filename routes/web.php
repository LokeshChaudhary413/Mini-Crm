<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
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

// Login Routes
Route::get('/', [AuthController::class, 'index']);
Route::get('admin/register', [AuthController::class, 'register']);
Route::post('/admin/register_process', [AuthController::class, 'register_process'])->name('admin/register_process');

Route::get('admin/logout', [AuthController::class, 'logout']);
Route::post('admin/auth', [AuthController::class, 'auth'])->name('admin.auth');
Route::group(['middleware'=>'admin_auth'],function(){

    Route::get('admin/dashboard', [AuthController::class, 'dashboard']);

    // Company  Routes
    Route::get('admin/companies', [CompanyController::class, 'show']);
    Route::get('admin/company/addCompany', [CompanyController::class, 'create']);
    Route::post('admin/company/submit', [CompanyController::class, 'store'])->name('admin/company/submit');
    Route::get('admin/company/editCompany/{id}', [CompanyController::class, 'edit']);
    Route::post('admin/company/update', [CompanyController::class, 'update'])->name('admin/company/update');
    Route::get('admin/company/deleteCompany/{id}', [CompanyController::class, 'destroy']);

    // Employee Routes
    Route::get('admin/employees', [EmployeeController::class, 'show']);
    Route::get('admin/employee/addEmployee', [EmployeeController::class, 'create']);
    Route::post('admin/employee/sumbit', [EmployeeController::class, 'store'])->name('admin/employee/submit');
    Route::get('admin/employee/editEmployee/{id}', [EmployeeController::class, 'edit']);
    Route::post('admin/employee/update', [EmployeeController::class, 'update'])->name('admin/employee/update');
    Route::get('admin/employee/deleteEmployee/{id}', [EmployeeController::class, 'destroy']);
    
});