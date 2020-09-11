<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CategoryService;
use App\Services\DonateService;

class PageController extends Controller
{
    //
    protected $donate;
    public function __construct(DonateService $donate){
        $this->donate = $donate;
    }

    public function donate(){
        $data = $this->donate->getAll();
        return view('admin.pages.donate', compact('data'));
    }

    public function comment(){
        return view('admin.pages.comment');
    }

}
