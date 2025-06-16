<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\AppointmentScheduledController;
use App\Http\Controllers\AppointmentHistoryController;
use App\Http\Controllers\allInvoiceController;




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



Route::get('/login', [LoginController::class, 'showLogin'])->name('auth.login');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/dashboard', [LoginController::class, 'dashboard'])->name('dashboard');
 Route::get('/sidebar',[LoginController::class,'sidebar'])->name('sidebar');
Route::get('/customer', [LoginController::class, 'customer'])->name('customer');
Route::get('/customer/create', [LoginController::class, 'create_customer'])->name('create-customer');
Route::get('/customer/mailing', [LoginController::class, 'mailing'])->name('mailing');
Route::get('/main', [LoginController::class, 'main'])->name('main');
Route::get('/appointment', [LoginController::class, 'appointment'])->name('appointment');
Route::get('/assign_appointment', [LoginController::class, 'assign_appointment'])->name('assign-appointment');
Route::get('/invoice', [LoginController::class, 'invoice'])->name('invoice');
Route::get('/report', [LoginController::class, 'report'])->name('report');
Route::get('/reminder', [LoginController::class, 'reminder'])->name('reminder');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/appointment', [LoginController::class, 'appointment'])->name('appointment');
Route::get('/appointment_history', [LoginController::class, 'appointment_history'])->name('appointment_history');
Route::get('/appointment_schedule', [LoginController::class, 'appointment_schedule'])->name('appointment_schedule');
Route::get('/pending', [LoginController::class, 'pending'])->name('pending');
Route::get('/mailers', [LoginController::class, 'mailers'])->name('mailers');
Route::get('/mailing_list', [LoginController::class, 'mailing_list'])->name('mailing_list');
Route::get('/email_send', [LoginController::class, 'email_send'])->name('email_send');
Route::get('/monthly', [LoginController::class, 'monthly'])->name('monthly');
Route::get('/today_activity', [LoginController::class, 'today_activity'])->name('today_activity');
Route::get('/mailing', [LoginController::class, 'mailing'])->name('mailing');
// Route::get('/inventory', [ProductController::class, 'index'])->name('inventory.index');
Route::post('invoice/store-inventory', [ProductController::class, 'store'])->name('inventory.store');
Route::get('invoice/view-inventory', [ProductController::class, 'index'])->name('inventory.index');
Route::get('/issues', [LoginController::class, 'issues'])->name('issues');

Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoices.index');
Route::get('/invoices/fetch', [InvoiceController::class, 'fetch'])->name('invoices.fetch');
Route::post('/invoices', [InvoiceController::class, 'store'])->name('invoices.store');
Route::get('/invoice', [LoginController::class, 'invoice'])->name('invoice');
Route::get('/allinvoice', [LoginController::class, 'allinvoice'])->name('allinvoice');
Route::get('/invoices/fetch', [InvoiceController::class, 'fetch'])->name('invoices.fetch');



Route::get('/allinvoices', [AllInvoiceController::class, 'index'])->name('allinvoices.index');
Route::get('/get-invoices', [AllInvoiceController::class, 'getInvoices'])->name('allinvoices.data');

Route::get('/appointmenthistory', [AppointmentHistoryController::class, 'index'])->name('appointmenthistory.index');
Route::post('/appointmenthistory/store', [AppointmentHistoryController::class, 'store'])->name('appointmenthistory.store');
Route::get('/appointmenthistory/list', [AppointmentHistoryController::class, 'list'])->name('appointmenthistory.list');





Route::get('/appointments', [AppointmentScheduledController::class, 'index'])->name('appointments.index');
Route::get('/appointments/data', [AppointmentScheduledController::class, 'getAppointments'])->name('appointments.data');






Route::post('/appointments', [AppointmentController::class, 'store'])->name('appointments.store');
Route::get('/appointments/list', [AppointmentController::class, 'list'])->name('appointments.list');



Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');
Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
Route::delete('/customers/{id}', [CustomerController::class, 'destroy'])->name('customers.destroy');
Route::get('/customers/{id}', [CustomerController::class, 'show']);
Route::post('/upload-document', [CustomerController::class, 'uploadDocument'])->name('upload.document');



// Route::get('/login', function () {
//     return view('layout.login');
// });


// Route::get('/dashboard', function () {
//     return view('layout.dashboard');
// }) ->name('dashboard') ;
// Route::get('/login', function () {
//     return view('layout.login');
// }) ->name('login') ;

// Route::get('/customer', function () {
//     return view ('layout.customer');
// })-> name('customer');
// Route::get('/main', function () {
//     return view ('layout.main');
// })-> name("main");

// Route::get('customer/mailing', function () {
//     return view ('layout.mailing');
// });

