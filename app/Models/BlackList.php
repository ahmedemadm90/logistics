<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlackList extends Model
{
    use HasFactory;
    protected $fillable = ['driver_id','company','duration','block_date', 'to_date','active'];
    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }
}
