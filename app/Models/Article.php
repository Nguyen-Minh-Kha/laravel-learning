<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    /**
    * get route key name putting the slug in the route
    *  
    * @return string
    */
    public function getRouteKeyName()
    {
     return 'slug';
    }

    /**
     * Un article appartien à un user 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
