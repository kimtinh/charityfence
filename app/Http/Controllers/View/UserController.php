<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CampaignService;
use App\Services\CategoryService;
use App\Services\UserService;
use App\Services\PostService;
use App\Http\Requests\CampaignRequest;
use App\Helpers\Handler;
use Storage;

class UserController extends Controller
{
    //
    protected $campaign;
    protected $category;
    protected $user;
    protected $post;

    public function __construct(CampaignService $campaign, CategoryService $category,UserService $user, PostService $post){
        $this->campaign = $campaign;
        $this->category = $category;
        $this->user = $user;
        $this->post = $post;
    }

    public function profile($id){
        $user = $this->user->findUser($id, 'profile');
        if(!$user)
            abort(404);
        return view('view.profile.index', compact('user'));
    }
    public function editProfile(Request $request, $id){
        $user = $this->user->updateProfileUser($id, $request->all());
        if($user)
            return redirect()->route('view.profile', $id)->with('success', 'Updated Profile Success!');
        return redirect()->back()->with('error', 'Cannot Be Updated!');
    }

    public function campaign($id){
        $list = $this->campaign->getListByUser($id);
        $data = [
            'list' => $list,
            'id' => $id
        ];
        return view('view.profile.campaign', $data);
    }

    public function articles($id){
        $list = $this->post->getListByUser($id);
        $data = [
            'list' => $list,
            'id' => $id
        ];
        return view('view.profile.articles', $data);
    }

    public function deleteCampaign($id){
        $result = $this->campaign->deletes($id);
        if($result)
            return redirect()->route('view.profile-campaign', auth()->user())->with('success','Delete Success!');
        return redirect()->back()->with('error','Failed To Delete Campaign!');
    }

    public function deleteArticles($id){
        $result = $this->post->deletes($id);
        if($result)
            return redirect()->route('view.profile-articles', auth()->user())->with('success','Delete Success!');
        return redirect()->back()->with('error','Failed To Delete Campaign!');
    }

}
