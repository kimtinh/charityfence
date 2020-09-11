<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DifficultSituation extends Model
{
    //
    protected $table = 'difficult_situation';
    protected $fillable = ['name','address','phone','description'];

    public function campaign(){
        return $this->belongsTo('App\Campaign');
    }
}
