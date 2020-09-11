<?php 

namespace App\Services;

use App\Category;

class CategoryService{

    public function getAllCategory(){
        return Category::where('parent_id', 1)->get();
    }

    public function getCategories(){
        return Category::with('group')->whereNotNull('parent_id')->orderBy('parent_id')->paginate(15);
    }

    public function getGroupCategory(){
        return Category::whereNull('parent_id')->orderBy('name','asc')->get();
    }

    public function createCategory($data){
        return Category::create($data);
    }

    public function delete($ids){
        $data = Category::select('id');

        //case  delete multiple category
        if(gettype($ids) == 'array'){
            $data = $data->whereIn('id', $ids);
            $newId = $data->get()->toArray();
            $result = $data->delete();
            Category::select('id')->whereIn('parent_id', $newId)->delete();
            return $result;
        }

        //case delete a category
        $data = $data->find($ids);
        Category::select('id')->where('id', $data->id)->delete();
        return $data->delete();
    }

}

?>