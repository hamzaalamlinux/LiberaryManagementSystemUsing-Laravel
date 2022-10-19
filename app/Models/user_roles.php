<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class user_roles extends Model
{
    protected  $table = 'role_user';
    protected $fillable = ['user_id', 'role_id', 'status'];
    use HasFactory;
}
