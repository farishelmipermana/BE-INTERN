<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function users(){
        return $this->belongsTo(User::class, 'user_id');
    }

    public function vehicles(){
        return $this->belongsTo(Vehicle::class, 'vehicle_id');
    }

    public function stakeholders(){
        return $this->belongsTo(Stakeholder::class, 'stakeholder_id');
    }
}
