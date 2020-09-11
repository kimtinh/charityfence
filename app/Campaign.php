<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    //
    protected $table = 'campaign';
    protected $fillable = ['name','status','content','images','date_end','bank_account','amount','user_id','category_id','video', 'description','price_total'];

    const ACTIVE = 1;
    const DISABLE = 0;

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function difficult_situation(){
        return $this->belongsTo('App\DifficultSituation');
    }

    public function category(){
        return $this->belongsTo('App\Category');
    }

    public function donate(){
        return $this->hasMany('App\Donate');
    }
}
