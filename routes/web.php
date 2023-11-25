<?php

use App\Http\Controllers\customController\ClassesController;
use App\Http\Controllers\customController\StudentsController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->middleware(['verified'])->name('home');

//all about email verification
Route::get('/email/verify/{id}/{hash}',[HomeController::class,'verify'])->middleware(['auth', 'signed'])->name('verification.verify');

Route::get('/email/verify', [HomeController::class,'verify_notice'])->middleware('auth')->name('verification.notice');

Route::post('/email/verification-notification',[HomeController::class,'verify_resend'])->middleware(['auth'])->name('verification.resend');

// change password routes

Route::get('/change/password',[HomeController::class,'changePassView'])->middleware(['auth','verified'])->name('change.password');

Route::post('/password/update',[HomeController::class,'updatePass'])->middleware(['auth'])->name('update.password');


//showing add classes view
Route::get('/classes/showAll',[ClassesController::class,'index'])->name('all.class');
Route::get('/classes/add',[ClassesController::class,'addClass'])->name('add.class');
Route::post('/classes/add/done',[ClassesController::class,'store'])->name('store.class');

//edit and update classes
Route::get('/classes/edit/{id}',[ClassesController::class,'edit'])->middleware(['auth','verified'])->name('classes.edit');
Route::post('/classes/update/{id}',[ClassesController::class,'update'])->middleware(['auth','verified'])->name('update.class');
//delete class
Route::post('/classess/delete',[ClassesController::class,'delete'])->name('classes.delete');

//showing all students
Route::get('/students/show/view',[StudentsController::class,'index'])->name('students.all');
Route::get('/students/add',[StudentsController::class,'view'])->name('students.add');
Route::post('/students/store',[StudentsController::class,'store'])->name('students.store');
