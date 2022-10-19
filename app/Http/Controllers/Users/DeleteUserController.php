<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Repository\Users\IUsersRepository;
use Illuminate\Http\Request;

class DeleteUserController extends Controller
{
    private IUsersRepository $repository;
    public function __construct(IUsersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function Delete(Request $request){

        try {
            $this->repository->Delete($request->input('userid'));
            return json_encode(array('status' => 200 , 'message' => "User Deleted Successfully"));
        }
        catch (\Exception $exception){
            return json_encode(array('status' => 400 , 'message' =>$exception->getMessage()));
        }
    }
}
