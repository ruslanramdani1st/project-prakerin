<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Penumpang;

class Transaksi extends Model
{
    use HasFactory;

    public $table = 'transaksis';

    protected $fillable = [
        'penumpang_id',
        'jumlah',
        'no_telp',
        'total'
    ];

    public function penumpang()
    {
        return $this->hasMany(Penumpang::class, 'penumpang_id');
    }
}
