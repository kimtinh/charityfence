<?php

namespace App\Http\Controllers\View;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CampaignService;
use App\Services\DonateService;

class DonateController extends Controller
{
    //
    protected $campaign;
    protected $donate;

    public function __construct(CampaignService $campaign, DonateService $donate){
        $this->campaign = $campaign;
        $this->donate = $donate;
    }
    public function donate($id){
        $campaign = $this->campaign->findCampaign($id);
        if(!$campaign)
            abort(404);
        return view('view.donate.index', compact('campaign'));
    }
    public function store(Request $request, $id){
        $result = $this->donate->create($request->all());
        if($result)
            return redirect()->route('view.campaign.detail', $id)->with('success', 'Ủng hộ thành công!');
        return redirect()->back()->with('error','Ủng hộ không thành công, vui lòng thử lại!');
    }
}
