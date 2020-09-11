<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CampaignService;
use App\Services\CategoryService;
use App\Services\UserService;
use App\Services\PostService;
use App\Services\DifficultService;

class HomeController extends Controller
{
    protected $campaign;
    protected $category;
    protected $user;
    protected $post;
    protected $difficult;

    public function __construct(CampaignService $campaign, CategoryService $category,UserService $user, PostService $post, DifficultService $difficult){
        $this->campaign = $campaign;
        $this->category = $category;
        $this->user = $user;
        $this->post = $post;
        $this->difficult = $difficult;
    }

    public function index(){
        $user = $this->user->listUser();
        $campaign = $this->campaign->getAllCampaigns();
        $post = $this->post->getAllPosts();
        $difficult = $this->difficult->getAll();
        $data = [
            'user' => count($user ?? []),
            'campaign' => count($campaign ?? []),
            'post' => count($post ?? []),
            'difficult' => count($difficult ?? [])
        ];
        return view('admin.index', $data);
    }
}
