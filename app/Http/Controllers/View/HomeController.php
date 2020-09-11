<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Handler;
use App\Services\CampaignService;
use App\Services\CategoryService;
use App\Services\UserService;
use App\Http\Requests\CampaignRequest;

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
        $data = [
            'listCampaign' => $listCampaign
        ];
        return view('view.home', $data);
    }

    public function about(){
        return view('view.pages.about');
    }

}
