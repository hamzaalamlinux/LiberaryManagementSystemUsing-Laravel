<?php

namespace App\Repository\Users;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EloquentUsers implements IUsersRepository
{
    private User $_model;

    /**
     * @param User $_model
     */
    public function __construct(User $_model)
    {
        $this->_model = $_model;
    }

    public function GetUsers()
    {
        return $this->_model::all()->where('status' , '=' , '0');
    }

    public function AddUser($name , $email , $password)
    {
        $this->_model->fill([
            'name' =>  $name,
            'email' => $email,
            'password' => Hash::make($password)
        ])->save();
    }

    public function Delete($id)
    {
        $result = $this->_model->where('id' , $id)->update(['status' => 1]);
        return $result;
    }
}
