<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Penumpang;

class Pemesanan extends Model
{
    use HasFactory;

    public $table = 'pemesanans';

    protected $fillable = [
        'user_id',
        'penumpang_id',
        'nama_penumpang',
        'nik',
        'notelp_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function penumpang()
    {
        return $this->belongsTo(Penumpang::class , 'penumpang_id');
    }
}
