<?php

namespace App\Models;

use App\Models\Penumpang;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;

    public $table = 'transaksis';

    protected $fillable = [
        'user_id',
        'penumpang_id',
        'jumlah',
        'no_telp',
        'total',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function penumpang()
    {
        return $this->belongsTo(Penumpang::class, 'penumpang_id');
    }
}
