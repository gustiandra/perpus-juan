<?php

namespace App\Http\Controllers;

use App\Models\BookCode;
use Illuminate\Http\Request;

class BookCodeController extends Controller
{
    public function destroy(Request $request, BookCode $bookcode)
    {
        $title = $bookcode->code;
        $bookcode->delete();
        return redirect()->route('book.index')->withSuccess("Berhasil menghapus kode buku: $title");
    }

    public function update(Request $request, BookCode $bookcode)
    {
        $this->validate($request, [
            'code' => 'required'
        ]);
        $bookcode->update($request->all());
        return redirect()->route('book.index')->withSuccess("Berhasil mengubah kode buku: $request->code");
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'code' => 'required',
            'book_id' => 'required'
        ]);
        BookCode::create($request->all());
        return redirect()->route('book.index')->withSuccess("Berhasil menambahkan kode buku: $request->code");
    }
}
