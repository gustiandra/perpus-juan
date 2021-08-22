<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCode;
use App\Models\Borrowhistory;
use App\Models\Student;
use Illuminate\Http\Request;

class BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('borrow.index', [
            'aktif' => 'onBorrow',
            'title' => 'Buku Sedang Dipinjam',
            'borrows' => Borrowhistory::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('borrow.create', [
            'aktif' => 'borrow',
            'title' => 'Peminjaman Buku',
            'students' => Student::all(),
            'books' => Book::all()
        ]);
    }

    public function getBookCode(Request $request)
    {
        $book_codes = BookCode::where("book_id", $request->book_id)->where("on_loan", 0)->pluck('code', 'id');
        return response()->json($book_codes);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'student_id' => 'required|numeric',
            'book_code_id' => 'required|numeric'
        ]);

        $bookcode = BookCode::findOrFail($request->book_code_id);
        $bookcode->update([
            'on_loan' => 1,
        ]);

        Borrowhistory::create($request->except('book_id'));
        $book       = $bookcode->book->title;
        $student    = Student::findOrFail($request->student_id)->name;

        return redirect()->route('borrow.create')->withSuccess("Berhasil melakukan peminjaman $book oleh $student");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
