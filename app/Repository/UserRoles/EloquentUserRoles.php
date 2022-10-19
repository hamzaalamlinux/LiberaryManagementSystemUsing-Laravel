<?php
/** created by hamaz alam */
namespace App\Repository\UserRoles;

use App\Models\user_roles;
use Illuminate\Support\Facades\Hash;

class EloquentUserRoles implements IUserRolesRepository
{
    private user_roles $model;

    /**
     * @param user_roles $model
     */
    public function __construct(user_roles $model)
    {
        $this->model = $model;
    }

    public function AddRoles($role , $user)
    {
        $this->model->fill([
            'user_id' => $user,
            'role_id' => $role,
            'status' => 1

        ])->save();
    }
}
