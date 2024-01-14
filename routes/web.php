<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::get('/register', function () {
    if (session()->has('email')) {
        return redirect('/');
    }
    return view('register');
});

Route::get('/login', function () {
    if (session()->has('email')) {
        return redirect('/');
    }
    return view('login');
});

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/', [StudentController::class, 'index']);

Route::get('/logout', [UserController::class, 'logout'])->name('logout');

Route::get('/add_student', [StudentController::class, 'add_student_page']);
Route::post('/add_student', [StudentController::class, 'add_student']);
Route::get('/{studentId}', [StudentController::class, 'view_student']);

Route::get('/edit_profile/{studentId}', [StudentController::class, 'edit_student_page']);
Route::patch('/edit_profile/{studentId}', [StudentController::class, 'edit_student'])->name("edit_student");
Route::delete('/delete/{studentId}', [StudentController::class, 'delete_student'])->name('delete_student');