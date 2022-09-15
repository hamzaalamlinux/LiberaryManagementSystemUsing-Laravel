<?php
/**Created By Hamza Alam */
namespace  App\Repository\Login;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EloquentLoginRepository implements IloginRepository {
    private  User $user;
    public function __construct(User $model)
    {
        $this->user = $model;
    }

    public function Authentication($email , $password){
       return Auth::attempt(['email' => $email , 'password' => $password]);
    }
}

?>
