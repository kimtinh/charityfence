<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;
use App\Services\PostService;
use Storage;

class ArticleController extends Controller
{
    //
    protected $post;
    public function __construct(PostService $post){
        $this->post = $post;
    }
    public function articles(Request $request){
        $params = [
            'paginate' => 12,
            'search' => $request->search
        ];
        $data = $this->post->getAllPosts($params);
        return view('view.articles.index', compact('data'));
    }
    public function detailArticles($id){
        $post = $this->post->findPost($id);
        if($post)
            return view('view.articles.detail',compact('post'));
        abort(404);
    }
    
    public function create(){
        return view('view.articles.create');
    }

    public function store(PostRequest $request){
        $result = $this->post->create($request->all());
        if($result)
            return redirect()->route('view.articles.detail', $result->id)->with('success',"Tạo thành công!");
        return redirect()->back()->with('error','Failed To Create Post. Try To Again!');
    }

    public function edit($id){
        $post = $this->post->findPost($id);
        if($post)
            return view('view.articles.edit',compact('post'));
        abort(404);
    }

    public function update($id, PostRequest $request){
        $result = $this->post->update($id, $request->all());
        if($result)
            return redirect()->route('view.articles.detail', $id)->with('success',"Cập nhật thành công!");
        return redirect()->back()->with('error','Lỗi cập nhật, thử lại!');
    }

}
