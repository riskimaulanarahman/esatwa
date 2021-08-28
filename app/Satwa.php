<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Satwa extends Model
{
    protected $table = "satwa";
    protected $primaryKey = "idSatwa";
    protected $guarded = ['idSatwa'];
    public $timestamps = false;

    public function lokasi()
    {
        return $this->belongsTo('App\LokasiWisata','id_lokasi','id');
    }
}
