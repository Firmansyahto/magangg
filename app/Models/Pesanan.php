<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $table = 'pesanan';
    protected $fillable = [
      'kode_pesanan',
      'tanggal_pesanan',
      'total_harga',
      'status_pesanan',
      'pemesan',
      'keterangan',
      'user_id',
      'unit_kerja_id',
    ];

    function barang()
    {
      return $this->belongsTo(Barang::class);
    }

    function user()
    {
      return $this->belongsTo(User::class);
    }
}
