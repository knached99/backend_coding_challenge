<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;
class AdminModel extends Model implements Authenticatable

{
    use HasFactory;

    protected $table = 'admins';
    protected $primaryKey = 'adminID';

    protected $fillable = [
        'name',
        'email',
        'password'
    ];

        // Hidden fields for protecting admin data 

    protected $hidden = ['password'];



    public $timestamps = false; // disable timestamps 

    public function getAuthIdentifierName()
{
    return 'adminID';
}

public function getAuthIdentifier()
{
    return $this->getKey();
}

public function getAuthPassword()
{
    return $this->password;
}

public function getRememberToken()
{
    return null; // not implemented
}

public function setRememberToken($value)
{
    // not implemented
}

public function getRememberTokenName()
{
    return null; // not implemented
}

}