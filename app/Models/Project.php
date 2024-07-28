<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function users()
    {
        //TODO
        // return $this->hasMany(User::class);
        return $this->belongsToMany(User::class);
    }

    public function tasks(){
        // return $this->hasManyThrough(Task::class, User::class);
        return $this->hasManyThrough(
            Task::class,
            User::class,
            'project_id', //foreign key in users table
            'user_id', //foreign key in task table
            'id' //local key in projects table
        );

        // return $this->hasManyThrough(
        //     Task::class,
        //     Team::class,
        //     'project_id', //foreign key in users table
        //     'user_id', //foreign key in task table
        //     'id', //local key in projects table
        //     'user_id'
        // );
    }

    public function task(){
        // return $this->hasManyThrough(Task::class, User::class);
        return $this->hasOneThrough(Task::class, User::class, 'project_id', 'user_id');
    }

}
