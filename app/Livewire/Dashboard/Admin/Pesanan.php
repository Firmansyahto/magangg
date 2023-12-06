<?php

namespace App\Livewire\Dashboard\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

use App\Models\Pesanan as PesananModel;
use App\Models\PesananDetail;

class Pesanan extends Component
{
  use WithPagination;

  public $searchTerm, $status_pesanan, $selected_status_pesanan;
  public $details, $order;
  public $sorting_data, $sorted;

  function mount()
  {
    if(!Auth::user()) { return redirect()->route('login'); }
  }

  public function render()
  {
    $searchTerm = '%'.$this->searchTerm . '%';

    if(!$this->status_pesanan)
    {
      $this->selected_status_pesanan = 'proses';
    }
    else
    {
      $this->selected_status_pesanan = $this->status_pesanan;;
    }

    if(!$this->sorting_data)
    {
      $this->sorted = 'created_at';
    }
    if($this->sorting_data)
    {
      $this->sorted = $this->sorting_data;
    }

    if($this->sorted == 'created_at')
    {
      $asce_deesce = 'DESC';
    }
    if($this->sorted == 'pemesan')
    {
      $asce_deesce = 'ASC';
    }

    $pesanans = PesananModel::where([['pemesan', 'ilike', $searchTerm], ['unit_kerja_id', Auth::user()->unit_kerja_id], ['status_pesanan', $this->selected_status_pesanan]])
    ->orWhere([['kode_pesanan', 'ilike', $searchTerm], ['unit_kerja_id', Auth::user()->unit_kerja_id], ['status_pesanan', $this->selected_status_pesanan]])
    ->orderBy($this->sorted, $asce_deesce)
    ->paginate(10)->onEachSide(0);

    return view('livewire.dashboard.admin.pesanan', compact('pesanans'))->layout('layouts.dashboard');
  }

  function resetSearch()
  {
    $this->searchTerm = null;
  }

  function getDetail($id)
  {
    $this->order = PesananModel::where('id', $id)->first();
    $this->details = PesananDetail::where('pesanan_id', $id)->get();
  }

  public function konfirmasiSetuju()
  {
    $this->order->update([
      'status_pesanan' => 'disetujui'
    ]);

    return redirect()->route('pesanan')->with('info-success', 'Pesanan telah berhasil di-setujui !');
  }

  public function konfirmasiTolak()
  {
    $this->order->update([
      'status_pesanan' => 'ditolak'
    ]);

    return redirect()->route('pesanan')->with('info-success', 'Pesanan telah berhasil di-tolak !');
  }
}
