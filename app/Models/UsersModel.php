<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable;

class UsersModel extends Model implements Authenticatable
{
    use HasFactory;

    protected $table = 'users';
    protected $primaryKey = 'id';
   
    protected $fillable = [
        'name',
        'email',
        'employee_id'
    ];

    protected $casts = [
        'id'=>'integer'
    ];

    public function getAuthIdentifierName()
    {
        return 'id';
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
    

?>