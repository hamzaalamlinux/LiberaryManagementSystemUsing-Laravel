<?php

namespace App\Http\Controllers\Users;

use App\Http\Controllers\Controller;
use App\Repository\Users\IUsersRepository;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    private IUsersRepository $repository;

    /**
     * @param IUsersRepository $repository
     */
    public function __construct(IUsersRepository $repository)
    {
        $this->repository = $repository;
    }

    public function GetUsers(){
          $list = $this->repository->GetUsers();
          return view('layouts.pages.Dashboard.Users.Users')->with('list' , $list);
    }

}
