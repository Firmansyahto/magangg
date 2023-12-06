<?php

namespace App\Livewire\User;

use App\Models\Barang;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Home extends Component
{
  public function mount()
  {
    if(Auth::user()->role != 'staf') { Auth::logout(); }
  }

  public function render()
  {
    $new_barang = Barang::where([['unit_kerja_id', Auth::user()->unit_kerja->id], ['flag', null]])
    ->orderBy('created_at', 'DESC')->limit(10)->get();

    $popular_barang = Barang::where([['terjual', '>', 0], ['unit_kerja_id', Auth::user()->unit_kerja->id], ['flag', null]])
    ->orderBy('terjual', 'DESC')->limit(10)->get();

    return view('livewire.user.home', compact('new_barang','popular_barang'))->layout('layouts.app');
  }
}
