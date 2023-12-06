<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnitKerja extends Model
{
    use HasFactory;

    protected $table = 'unit_kerja';

    protected $fillable = [
      'kode_unit',
      'nama_unit',
      // 'alamat',
      // 'telepon',
      // 'email',
      'slug',
      'flag',
    ];
}
