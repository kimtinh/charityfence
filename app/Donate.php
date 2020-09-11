<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    //
    protected $table = 'donate';
    protected $fillable = ['price','message','campaign_id','phone','email','name'];

    public function campaign(){
        return $this->belongsTo('App\Campaign');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
