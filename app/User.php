<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model implements Authenticatable, AuthenticatableContract, CanResetPasswordContract {

    use \Illuminate\Auth\Authenticatable;

use Authenticatable,
    CanResetPassword;

use EntrustUserTrait;

    protected $table = 'users';
    protected $primaryKey = 'r_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['r_name', 'r_email', 'r_password', 'r_gender', 'r_country'];

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = ['r_password'];

    public function videos() {
        return $this->hasMany('App\Videos');
    }

}
