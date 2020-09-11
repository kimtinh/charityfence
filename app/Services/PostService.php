<?php

namespace App\Services;
use App\Post;
use App\Helpers\Handler;

class PostService{

    public function create($data){
        if(isset($data['image'])){
            $path = Handler::uploadFile($data['image'], 'post');
            $data['image'] = $path;
        }
        return Post::create($data);
    }
    public function findPost($id){
        return Post::find($id);
    }
    public function getListByUser($id){
        return Post::where('user_id', $id)->orderBy('created_at','asc')->paginate(15);
    }

    public function deletes($ids){
        if(gettype($ids) === 'array'){
            $listPost = Post::select('id', 'image')->whereIn('id', $ids);
            foreach($listPost->get() as $post){
                Handler::deleteFile($post->image);
            }
            return $listPost->delete();
        }
        $post = Post::select('id','image')->find($ids);
        Handler::deleteFile($post->image);
        return $post->delete();
    }

    public function update($id, $data){
        $post = Post::find($id);
        if( isset($data['image']) && $post->image != $data['image']){
            Handler::deleteFile($post->image);
            $data['image'] = Handler::uploadFile($data['image'], 'post');
        }
        return $post->update($data);
    }
    public function getAllPosts($params=[]){
        $select = '*';
        if(isset($params['select']))
            $select = $params['select'];
        $data = Post::with('user')->select($select)->orderBy('created_at','asc');

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
        else
            $data = $data->get();
        return $data;
    }
}

?>