<?php 

namespace App\Services;

use App\Donate;

class DonateService{
    public function getAll(){
        return Donate::with('campaign', 'user')->paginate(15);
    }
}