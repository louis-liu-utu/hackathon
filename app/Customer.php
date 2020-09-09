<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $fillable = [
      'first_name',
      'last_name',
      'email',
      'country',
      'device',
      'ip'
    ];

    public function getFullName() {
        return $this->first_name. ' '. $this->last_name;
    }
}
