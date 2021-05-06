<?php

// Use Controller
use App\Http\Controllers\StaffController;

// Use Madel (ฐานข้อมูล)
use App\Models\Staff;


use Illuminate\Routing\RouteRegistrar;
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


// Return หน้าWelcome
Route::get('/', function () {
    return view('welcome');
});


// การจัดการ Insert และ Edit ในหน้าเดียวกัน
Route::prefix('Staff_page')->group(function () {
    Route::get('/', [StaffController::class, 'index'])->name('staff');
    Route::get('add', [StaffController::class, 'formadd'])->name('formadd');
    Route::get('edit', [StaffController::class, 'edit'])->name('formedit');
});


// การจัดการข้อมูล
Route::post('/Staff_page/store', [StaffController::class, 'store'])->name('addstaff');
// Route::post('/Staff/adddepartment',[StaffController::class,'adddepartment'])->name('adddepartment');
Route::get('/Staff_page/eidt/{id}', [StaffController::class, 'edit']);
Route::post('/Staff/update/{id}', [StaffController::class, 'update']);
Route::get('/Staff/delete/{id}', [StaffController::class, 'delete']);


// ค้นหาข้อมูล
Route::post('/Staff_page/search', [StaffController::class, 'search'])->name('search');

// อัพโหลดไฟล์อีกTb
Route::post('/Staff_page/uploadfile', [StaffController::class, 'uploadfile']);
