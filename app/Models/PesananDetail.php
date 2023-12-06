<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
  use HasFactory;

  protected $fillable = [
    'quantity',
    'total_harga_barang',
    'pesanan_id',
    'barang_id',
  ];

  function barang()
  {
    return $this->belongsTo(Barang::class);
  }
}
