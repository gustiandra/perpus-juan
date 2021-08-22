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
        $books = Book::withCount('borrow')
            ->orderBy('borrow_count', 'desc')
            ->get();

        return view('report.topbook', [
            'aktif' => 'top-book',
            'title' => 'Buku Favorit',
            'books' => $books,
        ]);
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

    public function report()
    {

        $reports = Borrowhistory::latest()->get();

        return view('report.report', [
            'aktif' => 'report',
            'title' => 'Laporan',
            'reports' => $reports
        ]);
    }
}
