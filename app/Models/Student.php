<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function kelas()
    {
        return $this->belongsTo(StudentClass::class, 'class', 'id');
    }

    public function borrow()
    {
        return $this->hasMany(Borrowhistory::class, 'student_id', 'id');
    }
}
