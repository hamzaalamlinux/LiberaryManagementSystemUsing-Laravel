<?php

namespace App\Http\Controllers\Panelty;

use App\Http\Controllers\Controller;
use App\Repository\Panelty\IPaneltyRepository;
use Illuminate\Http\Request;

class UpdatePaneltyController extends Controller
{
    private  IPaneltyRepository $repository;

    public function __construct(IPaneltyRepository $repository)
    {
        $this->repository = $repository;
    }

    public function Update(Request $request){
        try {
            $panelty = $request->input('panelty');
            $this->repository->Update($panelty);
            return json_encode(array('status' => 200 , 'message' => "successfully updated"));
        }
        catch (\Exception $exception) {

            return json_encode(array('status' => 400 , 'message' => $exception->getMessage()));
        }
    }
    //
}
