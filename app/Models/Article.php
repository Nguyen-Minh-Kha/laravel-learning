<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
     * Un article appartien à un user 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
