<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penumpang;
use App\Models\User;

class Transaksi extends Model
{
    use HasFactory;

    public $table = 'transaksis';

    protected $fillable = [
        'user_id',
        'penumpang_id',
        'jumlah',
        'no_telp',
        'total'
    ];

    public function user()
    {
        return $this->belongsTo(User::class , 'user_id');
    }

    public function penumpang()
    {
        return $this->hasMany(Penumpang::class, 'penumpang_id');
    }
}
