<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\Rating;

class Book extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['user_id', 'title', 'description'];

    public function user()
    {
      return $this->belongsTo(User::class);
    }

     public function ratings()
    {
      return $this->hasMany(Rating::class);
    }
}
