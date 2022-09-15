<?php

namespace App\Repository\Login;

interface ILoginRepository
{
  public function  Authentication($email , $password);
}
