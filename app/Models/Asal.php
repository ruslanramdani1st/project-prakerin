<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kereta;
use App\Models\Penumpang;


class Asal extends Model
{
    use HasFactory;

    protected $table = "asals";

    protected $fillable = [
        'kota_asal',
    ];

    public function kereta()
    {
    	return $this->belongsToMany(Kereta::class,'asal_id');
    }

    public function penumpang()
    {
    	return $this->belongsToMany(Penumpang::class,'asal_id');
    }
}
