<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'country',
        'question',
        'answer',
        'is_like_receive'
    ];

    public function getFullName() {
        return $this->first_name. ' '. $this->last_name;
    }

}
