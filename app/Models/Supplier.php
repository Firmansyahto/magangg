<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
      'kode_supplier',
      'nama_supplier',
      'telepon',
      'flag',
      'unit_kerja_id',
    ];

    function unit_kerja()
    {
      return $this->belongsTo(UnitKerja::class);
    }
}
