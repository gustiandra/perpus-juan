<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function bookcode()
    {
        return $this->hasMany(BookCode::class);
    }

    public function borrow()
    {
        return $this->hasMany(Borrowhistory::class, 'book_id', 'id');
    }
}
