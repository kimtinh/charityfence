<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $table = 'comment';
    protected $fillable = ['content','user_id','campaign_id'];

    public function campaign(){
        return $this->belongsTo('App\Campaign');
    }

    public function user(){
        return $this->belongsTo('App\User');
    }
}
