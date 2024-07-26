<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PostTag extends Pivot
{
    use HasFactory;

    protected $table = 'post_tag';

    public static function boot()
    {
        parent::boot();

        //trigger events from pivot
        static::created(function ($item) {
            // dd('created pivot event', $item);
        });

        static::deleted(function ($item) {
            // dd('deleted pivot event', $item);
        });
    }
}
