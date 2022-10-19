<?php

namespace App\Http\Controllers\Roles;

use App\Http\Controllers\Controller;
use App\Http\Requests\RolesRequest;
use App\Repository\UserRoles\IUserRolesRepository;
use Illuminate\Http\Request;

class AddRoleController extends Controller
{
    private  IUserRolesRepository $repository;

    /**
     * @param IUserRolesRepository $repository
     */
    public function __construct(IUserRolesRepository $repository)
    {
        $this->repository = $repository;
    }

    public  function  AddRole(RolesRequest $request){

        $request->validated();
        try {
            $role = $request->input('role');
            $user = $request->input('user');
            $this->repository->AddRoles($role, $user);
            return  redirect('/Role')->with('success' ,'Your Request Successfully Inserted');
        }
        catch (\Exception $exception){
            return redirect('/Role')->with('message' , $exception->getMessage());
        }
    }
}
