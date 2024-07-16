<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;


Route::get('/', [
    HomeController::class, 'index'          
])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
                        
//Trang LOGIN
Route::get('/myLogin', [HomeController::class, 'create'])->name('myLogin');
Route::post('/myLogin', [HomeController::class, 'store']);

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
    // ADMIN index
    Route::get('/', [AdminController::class, 'index'])->name('admin.rooms');
    //lấy sinh viên trong phòng
    Route::get('rooms/{id}/students', [RoomController::class, 'getStudents']);
    //lay sinh vien đăng kí ở  ktx
    Route::get('student-in', [StudentController::class, 'getstudentIn'])->name('admin.student-in');
    //lay sinh vien hiện ở  ktx
    Route::get('students', [StudentController::class, 'getStudentInRightNow'])->name('admin.students');
    //lay sinh vien ra khoi ktx
    Route::get('student-out', [StudentController::class, 'getstudentOut'])->name('admin.student-out');

    Route::get('/studentsExport', [ExportController::class, 'studentsExport'])->name('export.students');
    Route::get('/roomsExport', [ExportController::class, 'roomsExport'])->name('export.rooms');
});

Route::resource("events", EventController::class);


require __DIR__ . '/auth.php';

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