<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Borrowhistory extends Model
{
    use HasFactory;
    protected $table = 'borrow_histories';
    protected $guarded = [];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function bookcode()
    {
        return $this->belongsTo(BookCode::class, 'book_code_id', 'id');
    }
}
