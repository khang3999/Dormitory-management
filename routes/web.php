<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/',[
    HomeController::class, 'index'
])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// Các trang admin
// trang thống kê
Route::get('admin/statistic', function () {
    return view('admin/statistic');
})->name('admin.statistic');    
// Trang quản lí sinh viên
Route::get('admin/students', function () {
    return view('admin/students');
})->name('admin.students');
// Trang quản lí phòng
// Route::get('admin/', function () {
//     return view('admin/rooms');
// })->name('admin.rooms');
// Trang quản lí bài viết
Route::get('admin/posts', function () {
    return view('admin/posts');
})->name('admin.posts');
// Trang quản lí đơn xin rút
Route::get('admin/studentOut', function () {
    return view('admin/student-out');
})->name('admin.studentOut');
// Trang quản lí đơn xin vào
Route::get('admin/studentIn', function () {
    return view('admin/student-in');
})->name('admin.studentIn');
//Trang login
Route::get('/myLogin', function () {
    return view('login');
})->name('myLogin');
// Trang register
Route::get('/myRegister', function () {
    return view('registerIn');
})->name('myRegister');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.rooms');
});

Route::resource("events", EventController::class);


require __DIR__.'/auth.php';
