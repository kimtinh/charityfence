<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Donate extends Model
{
    //
    protected $table = 'donate';
    protected $fillable = ['price','message','user_id','campaign_id'];

    public function campaign(){
        return $this->belongsTo('App\Campaign');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
