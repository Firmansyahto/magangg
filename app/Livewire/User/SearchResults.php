<?php

namespace App\Livewire\User;

use Livewire\Component;

use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

class SearchResults extends Component
{
  public $keyword;
  public $unitKerja;

  public function mount($keyword)
  {
    $this->keyword = $keyword;
  }
 
  public function render()
  {
    $searchTerm = '%'.$this->keyword . '%';
    $unitKerja = Auth::user()->unit_kerja->id;
    

    // dd($unitKerja);

    $barangs = Barang::where([
      ['nama_barang', 'ilike', $searchTerm],
      ['unit_kerja_id', '=', $unitKerja],
    ])->orderBy('nama_barang', 'ASC')->paginate(10)->onEachSide(0);

    return view('livewire.user.search-results', compact('barangs'))->layout('layouts.app');
  }
}
