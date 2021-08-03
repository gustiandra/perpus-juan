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

    public function subkelas()
    {
        return $this->belongsTo(SubClass::class, 'subclass', 'id');
    }
}
