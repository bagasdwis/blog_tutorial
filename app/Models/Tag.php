<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $fillable = ['nama_tag','slug'];
    protected $table = 'tag';

    public function post(){
    	return $this->belongsToMany('App\Models\Post');
    }

    public function getRouteKeyName()
	{
	    return 'slug';
	}
}
