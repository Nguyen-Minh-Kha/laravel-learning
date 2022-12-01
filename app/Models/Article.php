<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Article extends Model
{
    use HasFactory;

    // protected $fillable = ['title', 'user_id', 'slug', 'content', 'category_id']; // fillable array

    /**
     * [] everything is fillable, or everything except value inside the array
     *
     * 
     */
    protected $guarded = ['user_id', 'category_id', 'slug'];

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
     *  
     */
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    /**
     * Un article appartien à un user 
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class)->withDefault([
            'name' => 'anonymous category',
        ]);
    }
}
