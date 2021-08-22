<?php

use App\Http\Controllers\BookCodeController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\BorrowController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\StudentClassController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentSubClassController;
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

Route::get('/', [function () {
    return view('welcome');
}]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Class
    Route::get('/kelas-murid', [StudentClassController::class, 'index'])->name('studentclass.index');
    Route::post('/kelas-murid', [StudentClassController::class, 'store'])->name('studentclass.store');
    Route::put('/kelas-murid/{id}', [StudentClassController::class, 'update'])->name('studentclass.update');
    Route::delete('/kelas-murid/{id}', [StudentClassController::class, 'destroy'])->name('studentclass.destroy');

    // Student
    Route::get('/murid', [StudentController::class, 'index'])->name('student.index');
    Route::get('/murid/tambah', [StudentController::class, 'create'])->name('student.create');
    Route::post('/murid', [StudentController::class, 'store'])->name('student.store');
    Route::get('/murid/{student}', [StudentController::class, 'edit'])->name('student.edit');
    Route::put('/murid/{student}', [StudentController::class, 'update'])->name('student.update');
    Route::delete('/murid/{student}', [StudentController::class, 'destroy'])->name('student.destroy');

    // Category
    Route::get('/kategori-buku', [CategoryController::class, 'index'])->name('category.index');
    Route::post('/kategori-buku', [CategoryController::class, 'store'])->name('category.store');
    Route::put('/kategori-buku/{id}', [CategoryController::class, 'update'])->name('category.update');
    Route::delete('/kategori-buku/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');



    // Book
    Route::get('/buku', [BookController::class, 'index'])->name('book.index');
    Route::get('/buku/tambah', [BookController::class, 'create'])->name('book.create');
    Route::post('/buku', [BookController::class, 'store'])->name('book.store');
    Route::get('/buku/{book}', [BookController::class, 'edit'])->name('book.edit');
    Route::put('/buku/{book}', [BookController::class, 'update'])->name('book.update');
    Route::delete('/buku/{book}', [BookController::class, 'destroy'])->name('book.destroy');

    Route::post('/kode-buku', [BookCodeController::class, 'store'])->name('book-code.store');
    Route::delete('/kode-buku/{bookcode}', [BookCodeController::class, 'destroy'])->name('book-code.destroy');
    Route::put('/kode-buku/{bookcode}', [BookCodeController::class, 'update'])->name('book-code.update');


    // Peminjaman Buku
    Route::get('/borrow', [BorrowController::class, 'index'])->name('borrow.index');
    Route::get('/borrow/create', [BorrowController::class, 'create'])->name('borrow.create');
    Route::post('/borrow', [BorrowController::class, 'store'])->name('borrow.store');
    Route::get('/get-book-code', [BorrowController::class, 'getBookCode'])->name('get-book-code');
});



Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
