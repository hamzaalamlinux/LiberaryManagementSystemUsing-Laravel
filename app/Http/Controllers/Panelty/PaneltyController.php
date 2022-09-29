<?php

namespace App\Http\Controllers\Panelty;

use App\Http\Controllers\Controller;
use App\Repository\Books\IBookRepository;
use App\Repository\Panelty\IPaneltyRepository;
use Illuminate\Http\Request;

class PaneltyController extends Controller
{
    private  IPaneltyRepository $repository;

    public function __construct(IPaneltyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function GetPanelties(){
        $list = $this->repository->Panelties();
        return view('layouts.pages.Dashboard.Panelty.Panelties')->with('list' , $list);
    }
}
