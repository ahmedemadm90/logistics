<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gate3 extends Model
{
    use HasFactory;
    protected $fillable = ['trip_id', 'driver_name', 'licence_no'];
    public function trip()
    {
        return $this->belongsTo(Trip::class, 'trip_id');
    }
}
