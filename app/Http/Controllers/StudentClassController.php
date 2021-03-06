<?php

namespace App\Http\Controllers;

use App\Models\StudentClass;
use App\Models\SubClass;
use Illuminate\Http\Request;

class StudentClassController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('student_class.index', [
            'aktif' => 'class',
            'title' => 'Kelas',
            'classes' => StudentClass::orderBy('name', 'asc')->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        StudentClass::create($request->all());
        return redirect()->route('studentclass.index')->withSuccess("Berhasil menambahkan kelas: $request->name");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function show(StudentClass $studentClass)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function edit(StudentClass $studentClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $studentClass = StudentClass::where('id', $id)->first();
        $this->validate($request, [
            'name' => 'required',
        ]);

        $studentClass->update([
            'name' => $request->name
        ]);

        return redirect()->route('studentclass.index')->withSuccess("Berhasil mengubah kelas: $request->name");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StudentClass  $studentClass
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $studentClass = StudentClass::where('id', $id)->first();
        $name = $studentClass->name;
        $studentClass->delete();
        return redirect()->route('studentclass.index')->withSuccess("Berhasil menghapus kelas: $name");
    }
}
