<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\StudentClass;
use App\Models\SubClass;
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
            'name' => 'required',
            'class' => 'required',
            'subclass' => 'required',
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
        //
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
            'subclass' => 'required',
            'year' => 'required'
        ]);

        $student->update([
            'name' => $request->name,
            'class' => $request->class,
            'subclass' => $request->subclass,
            'year' => $request->year,
        ]);

        return redirect()->route('student.index')->withSuccess("Berhasil mengubah kelas: $request->name");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }
}
