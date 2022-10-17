<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    protected $fillable = [
        'trip_id',
        'gate1in','gate1in_driver_name','gate1in_licence_no',
        'gate2in','gate2in_driver_name','gate2in_licence_no',
        'gate2out','gate2out_driver_name','gate2out_licence_no',
        'gate3in','gate3in_driver_name','gate3in_licence_no',
        'gate3out','gate3out_driver_name','gate3out_licence_no',
        'gate4out'
    ];
    public function trip()
    {
        return $this->belongsTo(Trip::class);
    }
}
