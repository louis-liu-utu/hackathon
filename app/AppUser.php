<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
    protected $fillable = ['nick_name','app_user_id','invited_num','email','invited_times'];

}
