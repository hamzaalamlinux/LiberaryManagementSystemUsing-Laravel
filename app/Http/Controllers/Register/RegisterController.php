<?php

namespace App\Http\Controllers\Register;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Repository\Registeration\IRegisterRepository;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    private  IRegisterRepository $repository;
    public function __construct(IRegisterRepository $repository)
    {
        $this->repository = $repository;
    }

    public function Save(RegisterRequest $request){
        $request->validated();
        $name  = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        try {
           $this->repository->Save($name, $email, $password);
            return redirect('/')->with('success' , 'Your account register successfully');
        }
        catch (\Exception $exception){
            return   redirect('/')->with('message' ,$exception->getMessage());
        }

    }


}
