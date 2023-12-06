<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\Pesanan;

class OrderStatus extends Component
{
  public $currentPesanan;
  
  public function render()
  {
    $process = Pesanan::where([['status_pesanan', 'proses'], ['user_id', Auth::user()->id]])->orderBy('created_at', 'DESC')->get();
    $confirmed = Pesanan::where([
      ['status_pesanan', 'disetujui'],
      ['user_id', Auth::user()->id]
    ])->orWhere([
      ['status_pesanan', 'ditolak'],
      ['user_id', Auth::user()->id]
    ])->orderBy('created_at', 'DESC')->get();

    return view('livewire.user.order-status', compact('process', 'confirmed'))->layout('layouts.app');
  }

  public function showPesanan($id)
  {
      $this->currentPesanan = Pesanan::find($id);
  }

  public function getDetailTransaction()
  {

  }
}
