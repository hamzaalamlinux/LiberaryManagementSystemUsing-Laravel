<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Repository\Roles\IRolesRepository;
use App\Repository\Users\EloquentUsers;
use App\Repository\Users\IUsersRepository;
use Illuminate\Http\Request;

class RoleControlelr extends Controller
{

    private  IUsersRepository $repository;
    private  IRolesRepository $IRolesRepository;
    public function __construct(IUsersRepository $repository , IRolesRepository $IRolesRepository)
    {
        $this->repository = $repository;
        $this->IRolesRepository = $IRolesRepository;
    }

    public function GetRoles(){
        $users = $this->repository->GetUsers();
        $roles = $this->IRolesRepository->GetRoles();
        return view('layouts.pages.Dashboard.Roles.AddRole' , compact(['users' , 'roles']));
    }
}
