<?php
/** Created by Hamza Alam */
namespace App\Repository\Users;

interface IUsersRepository
{
  public function GetUsers();

  public function AddUser($name , $email , $password);

  public function Delete($id);
}
