<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'country'];

    public function user()
    {
        // return $this->belongsTo(User::class, 'uid', 'id');
        return $this->belongsTo(User::class, 'user_id');
        // return $this->belongsTo(User::class);
    }
}
