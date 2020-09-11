<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CampaignService;
use App\Services\CategoryService;
use App\Services\UserService;
use App\Http\Requests\CampaignRequest;

class CampaignController extends Controller
{
    //
    private $campaign;
    private $category;
    private $user;

    public function __construct(CampaignService $campaign, CategoryService $category,UserService $user){
        $this->campaign = $campaign;
        $this->category = $category;
        $this->user = $user;
    }

    public function createCampaign(){
        $listCate = $this->category->getAllCategory();
        return view('view.campaign.create', compact('listCate'));
    }

    public function storeCampaign(CampaignRequest $request){
        $result = $this->campaign->createCampaign($request->all());
        if($result)
            return redirect()->route('view.explore')->with('success', 'Đã tạo chiến dịch, đang chờ admin phê duyệt!');
        return redirect()->back()->with('error','Cannot Create Campaign!');
    }

    public function detail($id){
        $data = $this->campaign->findCampaign($id);
        if(!$data)
            return redirect()->back()->with('error','Chiến dịch không tồn tại hoặc đang chờ admin phê duyệt!');
        return view('view.campaign.detail', compact('data'));
    }
    public function explore(Request $request){
        $params = [
            'where' => [
                            ['status', 1],
                            ['date_end', '>=', Date('Y-m-d')]
                        ],
            'paginate' => 12,
            'search' => $request->search
        ];
        $data = $this->campaign->getAllCampaigns($params);
        return view('view.campaign.index', compact('data'));
    }

    public function edit($id){
        $campaign = $this->campaign->findCampaign($id, "admin");
        $listCate = $this->category->getAllCategory();
        $data = [
            'campaign' => $campaign,
            'listCate' => $listCate
        ];
        return view('view.campaign.edit', $data);
    }

    public function update($id, CampaignRequest $request){
        $result = $this->campaign->updateCampaign($id, $request->all());
        if($result){
            if($result->status === 0)
                return redirect()->route('view.profile-campaign', Auth()->user()->id)->with('success', 'Đã sửa chiến dịch, đang chờ admin phê duyệt!');
            return redirect()->route('view.campaign.detail', $result->id)->with('success', 'Sửa chiến dịch thành công!');
        }
        return redirect()->back()->with('error', 'Sửa chiến dịch không thành công!');
    }

}
