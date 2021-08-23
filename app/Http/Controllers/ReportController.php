<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrowhistory;
use App\Models\Student;
use PDF;
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

    public function topBookPDF()
    {
        $books = Book::withCount('borrow')
            ->orderBy('borrow_count', 'desc')
            ->get();

        $pdf = PDF::loadview('report.topbook_pdf', ['books' => $books]);
        return $pdf->stream();
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

    public function topStudentPDF()
    {
        $students = Student::withCount('borrow')
            ->orderBy('borrow_count', 'desc')
            ->get();

        $pdf = PDF::loadview('report.topstudent_pdf', ['students' => $students]);
        return $pdf->stream();
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

    public function reportPDF()
    {

        $reports = Borrowhistory::latest()->get();

        $pdf = PDF::loadview('report.report_pdf', ['reports' => $reports]);
        return $pdf->stream();
    }
}
