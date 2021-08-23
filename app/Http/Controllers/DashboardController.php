<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowhistory;
use App\Models\Student;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard', [
            'title' => 'Dashboard',
            'aktif' => 'dashboard',
            'books' => Book::latest()->get(),
            'students' => Student::latest()->get(),
            'borrows' => Borrowhistory::where('returned_at', null)->get(),
        ]);
    }
}
