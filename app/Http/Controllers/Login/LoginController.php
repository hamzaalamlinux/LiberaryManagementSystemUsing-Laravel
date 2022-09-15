<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Repository\Login\IloginRepository;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    private IloginRepository $repository;
    //
    public function __construct(IloginRepository $repository)
    {
        $this->repository = $repository;
    }

    public  function  Authentication(LoginRequest $request){
        $request->validated();
        $email = $request->input('email');
        $password = $request->input('password');
        $valid = $this->repository->Authentication($email , $password);
        if($valid == 1){
//            return redirect('')
        }else{
            return  "Not Login Successfully";
        }
    }
}
