<?php

namespace App\Livewire\User;

use Carbon\Carbon;

use Livewire\Component;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

use App\Models\Barang;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Cart as CartModel;

class Cart extends Component
{
  public $myOrder = [];
  public $total_jenis, $total_barang, $total_harga;

  public function render()
  {
    $carts = CartModel::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

    // foreach($carts as $cartKey => $cartValue)
    // {
    //   $this->myOrder[] = $carts[$cartKey]['id'];
    // }

    $this->ringkasanPesanan();

    // dd($this->total_harga);

    return view('livewire.user.cart', compact('carts'))->layout('layouts.app');
  }

  public function ringkasanPesanan()
  {

    if($this->myOrder)
    {
      $getOrder = CartModel::whereIn('id', $this->myOrder)->get();

      $this->total_jenis = count($getOrder);
      $this->total_barang = $getOrder->sum('quantity');
      $this->total_harga = $getOrder->sum('total_harga');
    }
    else
    {
      $this->total_jenis = null;
      $this->total_barang = null;
      $this->total_harga = null;
    }
  }

  public function orderNow()
  {
    $order = CartModel::whereIn('id', $this->myOrder)->get();
    // To Reduce Stock
    foreach($order as $ordKey => $ordValue)
    {
      $barang = Barang::where('id', $order[$ordKey]['barang_id'])->get();

      foreach($barang as $barangKey => $barangValue)
      {
        $barang[$barangKey]->update([
          'stok' => $barang[$barangKey]['stok'] - $order[$ordKey]['quantity'],
        ]);
      }
    }
    // End
    

    // Automatic get Today Date
    $now = Carbon::now()->locale('id');
    $now->settings(['formatFunction' => 'translatedFormat']);
    // End

    // Create Pesanan
    $pesanan = Pesanan::create([
      'kode_pesanan' => Str::random(10),
      'tanggal_pesanan' => $now->format('Y-m-d'),
      'total_harga' => $this->total_harga,
      'status_pesanan' => 'proses',
      'pemesan' => Auth::user()->name,
      'user_id' => Auth::user()->id,
      'unit_kerja_id' => Auth::user()->unit_kerja_id,
    ]);
    // End

    // Create Detail for Pesanan
    foreach($order as $orderKey => $orderValue)
    {
      $detail = PesananDetail::create([
        'quantity' => $order[$orderKey]['quantity'],
        'total_harga_barang' => $order[$orderKey]['total_harga'],
        'pesanan_id' => $pesanan->id,
        'barang_id' => $order[$orderKey]['barang_id'],
      ]);
    }
    // End

    // Delete Selected Cart
    foreach($order as $orKey => $orValue)
    {
      CartModel::where('id', $order[$orKey]['id'])->delete();
    }
    // End
    return redirect()->route('status-pesanan')->with('info-success', 'Pesanan telah diajukan, silahkan tunggu validasi admin !');
  }

  public function increaseQuantity($cartId)
  {
    $cart = CartModel::find($cartId);
    $cart->update(['quantity' => $cart->quantity + 1]);
    $cart->update(['total_harga' => $cart->quantity * $cart->barang->harga]);
  }

  public function decreaseQuantity($cartId)
  {
    $cart = CartModel::find($cartId);
    if ($cart->quantity > 1) {
      $cart->update(['quantity' => $cart->quantity - 1]);
      $cart->update(['total_harga' => $cart->quantity * $cart->barang->harga]);
    }
  }

  public function updateQuantity($cartId, $quantity)
  {
    $cart = CartModel::find($cartId);
    $cart->quantity = $quantity;
    $cart->save();
  }

  public function deleteCartItem($cartId)
  {
    $cart = CartModel::find($cartId);
    $cart->delete();
  }

}
