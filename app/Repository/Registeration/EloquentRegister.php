<?php
/** created by hamza */
namespace App\Repository\Registeration;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Testing\Fluent\Concerns\Has;

class EloquentRegister implements IRegisterRepository
{
    private  User $model;
    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function Save($name , $email , $password)
    {
        $this->model->fill([
           'name' => "hamza",
           'email' => "alamhamza873@gmail.com",
           'password' => Hash::make("123")
        ])->save();
    }
}
