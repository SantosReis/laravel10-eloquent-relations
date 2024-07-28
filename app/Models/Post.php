<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'title'];

    public function user()
    {
        return $this->belongsTo(User::class)->withDefault([
            'name' => 'Guest User'
        ]);
    }

    //Pivot version
    public function tags()
    {
        // return $this->belongsToMany(Tag::class, 'post_tag', 'post_id', 'tag_id');
        return $this->belongsToMany(Tag::class)
            ->using(PostTag::class) //ref to pivot table
            ->withTimestamps()
            ->withPivot('status'); //setup pivot fields
    }

    //Polymorphic version
    public function tagsMorph()
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }

    public function comments()
    {
        return $this->morphMany(Comment::class, 'commentable');
    }

    public function comment()
    {
        return $this->morphOne(Comment::class, 'commentable');
        // return $this->morphOne(Comment::class, 'commentable')->latest();
    }


}
