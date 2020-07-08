<?php

namespace App;

use App\Traits\Sluggable;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use Sluggable;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function sluggable()
    {
        return 'title';
    }
    
    public function scopeSearch($query, $search = null)
    {
        return $search 
            ? $query->where('title', 'like', "%{$search}%")
                    ->where('description', 'like', "%{$search}%")
            : null
        ;
    }

    public function posts()
    {
        return $this->belongsToMany(Post::class);
    }
}