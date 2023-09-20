<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class mobil extends Model
{
    use HasFactory;
    protected $table='mobil';
    protected $fillable=[
        'namaMobil',
        'tipeMobil',
        'deskripsi',
        'gambarMobil',
        'biayaHarian',
        'biayaMingguan',
        'status'
    ];
    
}
