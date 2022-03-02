<?php

namespace App\Model;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
        'eyelet',
        'title',
        'content',
        'slug',
        'user_id',
        'created_at',
        'updated_at',
    ];

    //1 to *
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    //1 to * con categorie
    public function category()
    {
        return $this->belongsTo('App\Model\Category');
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function createSlug($title)
    {
        $slug = Str::slug($title, '-');

        $oldPost = Post::where('slug', $slug)->first();

        $counter = 0;
        while ($oldPost) {
            $newSlug = $slug . '-' . $counter;
            $oldPost = Post::where('slug', $newSlug)->first();
            $counter++;
        }

        return (empty($newSlug)) ? $slug : $newSlug;
    }
}
