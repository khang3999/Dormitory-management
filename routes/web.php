<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;


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
Route::get('admin/', [RoomController::class, 'index'])->name('admin.rooms');
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
    return view('admin/studentIn');
});
//Trang login
Route::get('/myLogin', function () {
    return view('login');
})->name('myLogin');
// Trang register
Route::get('/myRegister', function () {
    return view('registerIn');
})->name('myRegister');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('admin')->middleware('auth')->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('admin.rooms');
});

Route::resource("events", EventController::class);


require __DIR__.'/auth.php';
//lấy sinh viên trong phòng
Route::get('admin/rooms/{id}/students', [RoomController::class, 'getStudents']);
//lay sinh vien đăng kí ở  ktx
Route::get('/admin/student-in', [StudentController::class, 'getstudentIn'])->name('admin.student-in');
//lay sinh vien hiện ở  ktx
Route::get('/admin/students', [StudentController::class, 'getStudentInRightNow'])->name('admin.students');
//lay sinh vien ra khoi ktx
Route::get('/admin/student-out', [StudentController::class, 'getstudentOut'])->name('admin.student-out');

//Hiển thị thông tin sinh viên
Route::get('/students/{id}', [StudentController::class, 'show'])->name('students.show');
//updatte
Route::post('/update-room', [RoomController::class, 'updateRoom'])->name('update-room');
//lọc phòng 
Route::get('/api/rooms', [RoomController::class, 'index']);
Route::get('/rooms/all', [RoomController::class, 'getAllRooms'])->name('rooms.all');
Route::get('/rooms/layphongtrong', [RoomController::class, 'layphongtrong'])->name('rooms.layphongtrong');
Route::post('/student/updateduyetdon', [StudentController::class, 'duyetdon'])->name('student.duyetdon');
Route::post('/student/update', [StudentController::class, 'update'])->name('student.update');
Route::delete('/admin/student/{id}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::post('/users', [UserController::class, 'create'])->name('users.create');
Route::delete('/users/delete', [UserController::class, 'destroy'])->name('users.delete');