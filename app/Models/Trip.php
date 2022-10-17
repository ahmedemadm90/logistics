<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    protected $fillable = ['truck_no', 'truck_letter', 'trail_no', 'trail_letter','next_gate', 'state'];
    public function gate1()
    {
        return $this->hasOne(Gate1::class,'trip_id');
    }
    public function gate2()
    {
        return $this->hasOne(Gate2::class, 'trip_id');
    }
    public function gate3()
    {
        return $this->hasOne(Gate3::class, 'trip_id');
    }
}
