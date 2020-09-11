<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\Handler;
use App\Services\CampaignService;

class CampaignController extends Controller
{

    protected $campaign;

    public function __construct(CampaignService $campaign){
        $this->campaign = $campaign;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $params = [
            'paginate' => 15,
        ];
        $data = $this->campaign->getAllCampaigns($params);
        return view('admin.campaign.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $campaign = $this->campaign->findCampaign($id, 'admin');
        if($campaign) 
            return view('admin.campaign.edit',compact('campaign'));
        abort(404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function deletes(Request $request){
        return json_encode($this->campaign->deletes($request->ids));
    }

    public function changeStatus($id){
        $data = $this->campaign->changeStatus($id);
        if($data){
            return redirect()->route('admin.campaign.index')->with('success','Campaign Updated!');
        }
        return redirect()->route('admin.campaign.index')->with('error','Failed to update!');
    }
}
