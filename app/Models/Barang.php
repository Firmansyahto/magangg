<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';
    protected $fillable = [
      'kode_barang',
      'nama_barang',
      'deskripsi',
      'stok',
      'harga',
      'path',
      'thumbnail',
      'slug',
      'flag',
      'satuan',
      'supplier_id',
      'unit_kerja_id',
    ];

    function supplier()
    {
      return $this->belongsTo(Supplier::class);
    }

    function unit_kerja()
    {
      return $this->belongsTo(UnitKerja::class);
    }
}
