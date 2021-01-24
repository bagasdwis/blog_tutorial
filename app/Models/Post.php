<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;

	protected $fillable = ['judul','kategori_id','deskripsi','konten','gambar','slug','user_id','status'];
    protected $table = 'post';

    public function kategori(){
    	return $this->belongsTo('App\Models\Kategori');
    }

    public function tag(){
    	return $this->belongsToMany('App\Models\Tag');
    }

    public function user(){
    	return $this->belongsTo('App\Models\User');
    }
}
