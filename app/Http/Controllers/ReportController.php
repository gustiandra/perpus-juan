<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowhistory;
use App\Models\Student;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function topBook()
    {
        dd(Book::withCount('borrowed')->get());

        // return view('report.bestbook', [
        //     'books' => Borrowhistory::withCount('book_id')->get(),
        // ]);
    }

    public function topStudent()
    {
        $students = Student::withCount('borrow')
            ->orderBy('borrow_count', 'desc')
            ->get();

        return view('report.topstudent', [
            'aktif' => 'top-student',
            'title' => 'Murid Teraktif',
            'students' => $students
        ]);
    }
}
