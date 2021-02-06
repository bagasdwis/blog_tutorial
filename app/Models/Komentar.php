<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Komentar extends Model
{
    protected $guarded = [];
    protected $table = 'komentar';
    
    public function child()
    {
        return $this->hasMany(Komentar::class, 'parent_id');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }

    public function post(){
    	return $this->belongsTo('App\Models\Post');
    }
}

