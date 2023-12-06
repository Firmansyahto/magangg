<?php

namespace App\Livewire\User;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class AllProduct extends Component
{
    public $slug;

    public function render()
    {
        $new_barang = Barang::where([['unit_kerja_id', Auth::user()->unit_kerja->id], ['flag', null]])
        ->orderBy('created_at', 'DESC')->get();

        $popular_barang = Barang::where([['terjual', '>', 0], ['unit_kerja_id', Auth::user()->unit_kerja->id], ['flag', null]])
        ->orderBy('terjual', 'DESC')->get();
        return view('livewire.user.all-product', compact('new_barang','popular_barang'))->layout('layouts.app');
    }
    
    public function mount($slug)
    {
        $this->slug = $slug;
    }
}
