<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Book;

class Rating extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['book_id', 'user_id', 'rating'];

     public function book()
    {
      return $this->belongsTo(User::class);
    }

     public function book()
    {
      return $this->belongsTo(Book::class);
    }
}
