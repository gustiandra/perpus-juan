<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentClass;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $student = Student::latest()->get();
        // dd($student[0]->year);
        return view('student.index', [
            'aktif' => 'student',
            'title' => 'Murid',
            'students' => Student::latest()->get(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('student.form', [
            'aktif' => 'student',
            'title' => 'Tambah Murid',
            'url'       => 'student.store',
            'classes' => StudentClass::orderBy('name', 'asc')->get(),
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
        $this->validate($request, [
            'name' => 'required',
            'class' => 'required',
            'no_absen' => 'required',
            'nisn' => 'required',
            'year' => 'required'
        ]);
        Student::create($request->all());
        return redirect()->route('student.index')->withSuccess("Berhasil menambahkan murid: $request->name");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(Student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(Student $student)
    {
        return view('student.form', [
            'aktif'     => 'student',
            'title'     => 'Ubah Murid',
            'classes'   => StudentClass::orderBy('name', 'asc')->get(),
            'url'       => 'student.update',
            'student'   => $student,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Student $student)
    {
        $this->validate($request, [
            'name' => 'required',
            'class' => 'required',
            'no_absen' => 'required',
            'nisn' => 'required',
            'year' => 'required'
        ]);

        $student->update([
            'name' => $request->name,
            'class' => $request->class,
            'no_absen' => $request->no_absen,
            'nisn' => $request->nisn,
            'year' => $request->year,
        ]);

        return redirect()->route('student.index')->withSuccess("Berhasil mengubah murid: $request->name");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        $name = $student->name;
        $student->delete();

        return redirect()->route('student.index')->withSuccess("Berhasil menghapus murid: $name");
    }
}
