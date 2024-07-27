<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    //belongsToMany version
    // public function posts()
    // {
    //     return $this->belongsToMany(Post::class, 'post_tag', 'tag_id', 'post_id');
    //     // return $this->belongsToMany(Post::class);
    // }

    //Polymorphic version
    public function posts()
    {
        return $this->morphedByMany(Post::class, 'taggable');
    }

    public function videos()
    {
        // return $this->morphedByMany(Video::class, 'taggable');
        return $this->morphedByMany(Video::class, 'taggable', 'taggables');
    }
}
