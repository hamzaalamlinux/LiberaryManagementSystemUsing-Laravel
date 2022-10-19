<?php

namespace App\Repository\UserRoles;

interface IUserRolesRepository
{
    public function AddRoles($role , $user);
}
