<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comments extends Model
{  
    protected $fillable = [];

    public function post()
    {
        return $this->belongsTo(Movie::class);
    }
}
