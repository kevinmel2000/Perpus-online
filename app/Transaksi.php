<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    //
     protected $table='transaksis';
    protected $fillable =['tgl_pengembalian','tgl_peminjaman','status','id_buku','id_peminjam'];
    public $timestamps = false;
}
