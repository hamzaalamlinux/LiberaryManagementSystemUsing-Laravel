<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Repository\Registeration\IRegisterRepository;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private  IRegisterRepository $repository;
    public function __construct(IRegisterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function Save(){

        $this->repository->Save("hamza" , "alamhamza873@gmail.com" , "123");
    }
}
