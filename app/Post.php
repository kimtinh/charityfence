<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    protected $table = 'post';
    protected $fillable = ['name','content','user_id','view_total','image'];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
