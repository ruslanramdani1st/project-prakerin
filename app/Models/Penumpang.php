<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Kereta;
use App\Models\Asal;
use App\Models\Tujuan;

class Penumpang extends Model
{
    use HasFactory;

    public $table = 'penumpangs';

    protected $fillable = [
        'nama_penumpang',
        'user_id',
        'kereta_id',
        'asal_berangkat',
        'tujuan_berangkat',
        'kelas'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function asal()
    {
        return $this->belongsTo(Asal::class, 'asal_id');
    }

    public function tujuan()
    {
        return $this->belongsTo(Tujuan::class, 'tujuan_id');
    }

    public function kereta()
    {
        return $this->belongsTo(Kereta::class, 'kereta_id');
    }
}
