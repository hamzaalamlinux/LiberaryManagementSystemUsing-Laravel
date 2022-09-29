<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class books extends Model
{
    use HasFactory;

    public function scopePanelty($query){
        return $query->where('booksrequest.status' , '=' , '3');
    }

  public function UserWiseRequest($query , $userid){
      return $query->where('booksrequest.userid' , '=' , $userid);
  }


}
