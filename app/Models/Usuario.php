<?php

namespace App\Models;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;

class Usuario extends Model implements AuthenticatableContract
{
    use Authenticatable;

    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = ['login', 'password', 'active', 'role_id'];

    /**
     *
     * @var array
     */
    protected $hidden = ['password'];

    public function setPasswordAttribute($value){
        $this->attributes['password'] = bcrypt($value);
    }

}
