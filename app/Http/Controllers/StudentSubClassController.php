<?php

namespace App\Http\Controllers;

use App\Models\SubClass;
use Illuminate\Http\Request;

class StudentSubClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student_subclass.index', [
            'aktif' => 'subclass',
            'title' => 'Kelas',
            'subClasses' => SubClass::orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'name' => 'required'
        ]);
        SubClass::create($request->all());
        return redirect()->route('studentsubclass.index')->withSuccess("Berhasil menambah sub kelas: $request->name");
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
        $studentSubClass = SubClass::where('id', $id)->first();
        $this->validate($request, [
            'name' => 'required',
        ]);

        $studentSubClass->update([
            'name' => $request->name
        ]);

        return redirect()->route('studentsubclass.index')->withSuccess("Berhasil mengubah sub kelas: $request->name");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentSubClass = SubClass::where('id', $id)->first();
        $name = $studentSubClass->name;
        $studentSubClass->delete();
        return redirect()->route('studentsubclass.index')->withSuccess("Berhasil menghapus sub kelas: $name");
    }
}
