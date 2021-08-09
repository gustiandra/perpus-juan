<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\BookCode;
use App\Models\Category;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $books = Book::latest()->get();
        // dd($books[0]->category->name);
        return view('book.index', [
            'title' => 'Buku',
            'aktif' => 'book',
            'books' => Book::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('book.form', [
            'title' => 'Tambah Buku',
            'aktif' => 'book',
            'url' => 'book.store',
            'categories' => Category::orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data =  $this->validate($request, [
            'title' => 'required',
            'isbn' => 'required',
            'author' => 'required',
            'publisher' => 'required',
            'category_id' => 'required',
            'qty' => 'required',
            'description' => 'required',
        ]);

        $bookId = Book::create([
            'title' => $data['title'],
            'isbn' => $data['isbn'],
            'author' => $data['author'],
            'publisher' => $data['publisher'],
            'category_id' => $data['category_id'],
            'description' => $data['description'],
        ]);
        // dd($bookId);
        for ($i = 0; $i < $data['qty']; $i++) {
            BookCode::create([
                'book_id' => $bookId['id'],
                'code' => $data['isbn'] . rand(0, 999),
            ]);
        }

        return redirect()->route('book.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
    }
}
