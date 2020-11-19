<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
      'category_id',
      'title',
      'content',
    ];

    function user() {
        return $this->belongsTo(User::class);
    }

    function category() {
        return $this->belongsTo(Category::class);
    }
}
