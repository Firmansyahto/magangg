<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

use App\Models\Barang;
use App\Models\Cart;

class ProductDetail extends Component 
{
  public $slug, $jumlah_pesan = 1;

  public function mount($slug)
  {
    $this->slug = $slug;
  }

  public function render()
  {
    $barang = Barang::where('slug', $this->slug)->first();
    return view('livewire.user.product-detail', compact('barang'))->layout('layouts.app');
  }

  public function increase()
  {
    $this->jumlah_pesan++;
  }

  public function decrease()
  {
    if ($this->jumlah_pesan > 0) {
      $this->jumlah_pesan--;
    }
  }


  public function toChart()
  {
    $this->validate([
      'jumlah_pesan' => 'required'
    ]);

    $barang = Barang::where('slug', $this->slug)->first();
    $cart = Cart::where('user_id', Auth::user()->id)->where('barang_id', $barang->id)->first();

    if($this->jumlah_pesan <= $barang->stok)
    {
      if ($cart) {
        $cart->quantity += $this->jumlah_pesan;
        $cart->total_harga += $this->jumlah_pesan * $barang->harga;
        $cart->update();
      } else {
        $total_harga = $barang->harga * $this->jumlah_pesan;

        $cart = Cart::create([
          'quantity' => $this->jumlah_pesan,
          'total_harga' => $total_harga,
          'user_id' => Auth::user()->id,
          'barang_id' => $barang->id,
        ]);
      }

      return redirect()->route('cart')->with('info-success', 'Barang berhasil ditambahkan kedalam keranjang !');
    }

    else
    {
      return redirect()->route('product-detail', ['slug' => $this->slug])->with('info-failed', 'Gagal memasukan barang ke keranjang, stok tidak mencukupi !');
    }
  }

}
