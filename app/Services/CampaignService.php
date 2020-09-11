<?php 

namespace App\Services;

use App\Campaign;
use App\Helpers\Handler;
use Storage;

class CampaignService{

    public function createCampaign($data){
        // active campaign
        if(isset($data['images'])){
            $data['images'] = Handler::uploadFile($data['images'], 'campaign');
        }
        //create campaign
        $result = Campaign::create($data);
        return $result ?? false;
    }

    public function findCampaign($id, $type=""){
        if($type=="admin"){
            return Campaign::with(['user', 'difficult_situation', 'category'])->find($id);
        }
        // find campaign with status = 1
            $data = Campaign::with('user')->where('status', Campaign::ACTIVE)->find($id);
        return $data;
    }

    public function getAllCampaigns($params=[]){
        $select = '*';
        // if params select empty then select query select *
        if(isset($params['select']))
            $select = $params['select'];
        $data = Campaign::with('user')->select($select)->orderBy('created_at','asc');

        if(isset($params['where']))
            $data = $data->where($params['where']);

        if(isset($params['search']) && trim($params['search']) != "")
            $data = $data->where('name', 'like', '%'.$params['search'].'%');
            
        if(isset($params['paginate'])){
            $data = $data->paginate($params['paginate']);
            if( isset( $params['search']) && trim($params['search']) != "" ){
                $data = $data->appends(['search' => $params['search']]);
            }
        }
        else{
            $data = $data->get();
            if(isset($params['take']))
                $data = $data->take($params['take']);
        }
        return $data;
    }

    public function deletes($ids){
        if(gettype($ids) === 'array'){
            $list = Campaign::select('id', 'images')->whereIn('id', $ids);
            foreach($list->get() as $item){
                Handler::deleteFile($item->images);
            }
            return $list->delete();
        }
        $campaign = Campaign::select('id', 'images')->find($ids);
        Handler::deleteFile($campaign->images);
        return $campaign->delete();
    }

    public function changeStatus($id){
        $data = Campaign::find($id);
        if($data){
            $data->status = !$data->status;
            $data->save();
            return $data;
        }
        return false;
    }
    
    public function getListByUser($id){
        $list = Campaign::where('user_id', $id)->orderBy('created_at','asc')->paginate(15);
        return $list;
    }

    public function updateCampaign($id, $data){
        $campaign = Campaign::find($id);
        if(isset($data['images'])){
            Handler::deleteFile($campaign->images);
            $data['images'] = Handler::uploadFile($data['images'], 'campaign');
        }
        $campaign->name = $data['name'];
        $campaign->content = $data['content'];
        $campaign->description = $data['description'];
        $campaign->images = $data['images'];
        $campaign->date_end = $data['date_end'];
        $campaign->amount = $data['amount']??$campaign->amount;
        $campaign->category_id = $data['category_id'];
        $campaign->video = $data['video'];
        $campaign->save();
        return $campaign;
    }

}

?>