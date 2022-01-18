<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Kereta;
use App\Models\Penumpang;

class Tujuan extends Model
{
    use HasFactory;

    protected $table = "tujuans";

    public function Kereta()
    {
    	return $this->belongsToMany(Kereta::class,'tujuan_id');
    }

}
