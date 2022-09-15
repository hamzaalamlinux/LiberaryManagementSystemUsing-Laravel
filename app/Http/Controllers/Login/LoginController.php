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

    public  function  Authentication(){
//        $request->validated();
        return $this->repository->Authentication("email" , "123");
    }
}
