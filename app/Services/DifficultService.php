<?php 

namespace App\Services;
use App\DifficultSituation as Difficult;

class DifficultService{

    public function getAll($params=[]){
        $data = new Difficult();
        if(isset($params['paginate']))
            $data = $data->paginate($params['paginate']);
        else
            $data = $data->get();
        return $data;
    }

    public function create($data){
        return Difficult::create($data);
    }
    public function find($id){
        return Difficult::find($id);
    }

    public function update($id, $data){
        $campaign = $this->find($id);
        return $campaign->update($data);
    }

    public function deletes($ids){
        if(gettype($ids) === 'array'){
            return Difficult::select('id', 'images')->whereIn('id', $ids)->delete();
        }
        return Difficult::select('id', 'images')->delete();
    }
    
}

?>