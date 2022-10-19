<?php

namespace App\Repository\Roles;

use App\Models\Role;

class EloquentRoles implements IRolesRepository
{
   private Role $model;

    /**
     * @param Role $model
     */
    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function GetRoles()
    {
       return $this->model::all();
    }
}
