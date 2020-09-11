<?php 

namespace App\Services;

use App\Donate;
use App\Campaign;

class DonateService{
    public function getAll(){
        return Donate::with('campaign', 'user')->paginate(15);
    }
    public function create($data){
        
        $donate = Donate::create($data);
        if($donate){
            $campaign = Campaign::find($data['campaign_id']);
            $campaign->price_total += $data['price'];
            $campaign->save();
            return $donate;
        }
        return false;
    }
}