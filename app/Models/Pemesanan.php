<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;

    public $table = 'pemesanans';

    protected $fillable = [
        'nama_penumpang',
        'nik',
        'notelp_id'
    ];
}
