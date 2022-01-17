<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Asal;
use App\Models\Tujuan;
use App\Models\Penumpang;

class Kereta extends Model
{
    use HasFactory;

    public $table = 'keretas';

    protected $fillable = [
        'nomor_polisi',
        'nama_kereta',
        'tanggal_berangkat',
        'asal_id',
        'tujuan_id',
        'harga'
    ];

    public function asal()
    {
    	return $this->belongsTo(Asal::class,'asal_id');
    }

    public function tujuan()
    {
    	return $this->belongsTo(Tujuan::class,'tujuan_id');
    }

    public function penumpang()
    {
    	return $this->belongsToMany(Penumpang::class,'kereta_id');
    }
}
