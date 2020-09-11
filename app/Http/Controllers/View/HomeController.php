<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Handler;
use App\Services\CampaignService;
use App\Services\CategoryService;
use App\Services\UserService;
use App\Http\Requests\CampaignRequest;
use App\Http\Requests\ChangePasswordRequest;

class HomeController extends Controller
{
    //
    protected $campaign;
    protected $category;
    protected $user;

    public function __construct(CampaignService $campaign, CategoryService $category,UserService $user){
        $this->campaign = $campaign;
        $this->category = $category;
        $this->user = $user;
    }
    public function index(){
        $params = [
            'take' => 8,
            'where' => [
                ['status', 1],
                ['date_end', '>=', Date('d-m-Y')]
            ],
        ];
        $listCampaign = $this->campaign->getAllCampaigns($params);
        $paramsTop3 = [
            'take' => 3,
            'where' => [
                'status' => 1,
                ['date_end', '>=', Date('d-m-Y')],
                ['price_total', '>', 0]
            ]
        ];
        $campaignsTop3 = $this->campaign->getAllCampaigns($paramsTop3);
        $data = [
            'listCampaign' => $listCampaign,
            'campaignsTop3' => $campaignsTop3
        ];
        return view('view.home', $data);
    }

    public function about(){
        return view('view.pages.about');
    }

    public function changePassword(){
        return view('auth.change-password');
    }

    public function updatePassword(ChangePasswordRequest $request){
        $result = $this->user->changePassword($request->all());
        if($result)
            return redirect()->route('view.index')->with('success','Đổi mật khẩu thành công!');
        return redirect()->back()->with('error','Sai mật khẩu!')->withInput();
    }

}
