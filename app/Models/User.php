<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function admins(){
        return $this->hasMany(Admin::class);
    }
    public function requests(){
        return $this->hasMany(Request::class);
    }
    public function stakeholders(){
        return $this->hasMany(Stakeholder::class);
    }
}
