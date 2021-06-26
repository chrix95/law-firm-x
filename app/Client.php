<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Client extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'client_id', 'firstname', 'lastname', 'email', 'legal_counsel', 'dob', 'image', 'case_detail', 'last_date_reminder',
    ];

    protected $hidden = [
        'remember_token', 'email',
    ];

}
