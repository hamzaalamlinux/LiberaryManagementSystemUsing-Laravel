<?php

namespace App\Http\Controllers\Panelty;

use App\Http\Controllers\Controller;
use App\Repository\Panelty\IPaneltyRepository;
use Illuminate\Http\Request;

class GetPaneltyController extends Controller
{
    private  IPaneltyRepository $repository;

    public function __construct(IPaneltyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function GetPanelties(){

            $list = $this->repository->GetPanelties();
            if(!$list){
                return view('layouts.pages.Dashboard.Panelty.GetPanelties')->with('message', "Sorry No data Found!");
            }
            return view('layouts.pages.Dashboard.Panelty.GetPanelties')->with('list', $list);
    }
}

