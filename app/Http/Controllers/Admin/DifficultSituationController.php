<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\DifficultService;
use App\Http\Requests\DifficultRequest;

class DifficultSituationController extends Controller
{

    protected $difficult;

    public function __construct(DifficultService $difficult){
        $this->difficult = $difficult;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $params = [
            'paginate' => 15,
        ];
        $data = $this->difficult->getAll($params);
        return view('admin.difficult.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.difficult.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DifficultRequest $request)
    {
        //
        $result = $this->difficult->create($request->all());
        if($result)
            return redirect()->route('admin.difficult.index')->with('success','Tạo thành công!');
        return redirect()->back()->with('error','Tạo không thành công!')->withInput();
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
        $data = $this->difficult->find($id);
        return view('admin.difficult.edit', compact('data'));     
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DifficultRequest $request, $id)
    {
        //
        $result = $this->difficult->update($id, $request->all());
        if($result)
            return redirect()->route('admin.difficult.index')->with('success','Cập nhật thành công!');
        return redirect()->back()->with('error','Tạo nhật không thành công!')->withInput();
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
        return json_encode($this->difficult->deletes($request->ids));
    }
}
