<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\UsersFormRequest;
use App\Repository\Users\IUsersRepository;
use Illuminate\Http\Request;

class AddUsersController extends Controller
{

    private IUsersRepository $repository;
    public function __construct(IUsersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function AddUsers(UsersFormRequest $request){
        $request->validated();
        $name  = $request->input('name');
        $email = $request->input('email');
        $password = $request->input('password');
        try {
            $this->repository->AddUser($name, $email, $password);
            return redirect('GetUsers');
        }
        catch (\Exception $exception){
            return   redirect('/AddUserForm')->with('message' ,$exception->getMessage());
        }

    }
}
