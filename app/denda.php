<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class denda extends Model
{
    //
    protected $table='dendas';
    protected $fillable =['id_buku','id_user','jumlah_hari'];
}
