<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    protected $fillable = ['nama_kategori','slug'];
	
    protected $table = 'kategori';

    public function post(){
    	return $this->hasMany('App\Models\Post');
    }

    public function getRouteKeyName()
	{
	    return 'slug';
	}
}
