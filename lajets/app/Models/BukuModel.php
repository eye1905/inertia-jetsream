<?php

namespace App\Models;
use Carbon;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuModel extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
    ];
    
    protected $casts = [
        'created_at'  => 'date:Y-m-d H:i:s',
        'updated_at'  => 'date:Y-m-d H:i:s'
    ];

    function getTimeFromCreatedAt($date) {
        return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('H:i:s');
    }
}
