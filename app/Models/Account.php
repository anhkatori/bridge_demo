<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use PHPOpenSourceSaver\JWTAuth\Contracts\JWTSubject;

class Account extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'account';

    protected $fillable = [
        'full_name',
        'email',
        'password',
        'role',
        'class_id',
        'school_id',
        'school_year_id',
        'check_first_login',
        'usage_time',
        'status',
    ];
    public function is_email($email)	{
		if (filter_var($email, FILTER_VALIDATE_EMAIL))
		    return true;
		else
		    return false;
	}
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
