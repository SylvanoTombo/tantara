<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    protected $guarded = [];

    public function scopeShared($query)
    {
        return $query->where('shared', 1);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
