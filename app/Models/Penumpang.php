<?php

namespace App\Models;

use App\Models\Kereta;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penumpang extends Model
{
    use HasFactory;

    public $table = 'penumpangs';

    protected $fillable = [
        'nama_penumpang',
        'user_id',
        'kereta_id',
        'kelas',
        'total',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function kereta()
    {
        return $this->belongsTo(Kereta::class, 'kereta_id');
    }

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class, 'penumpang_id');
    }
}
