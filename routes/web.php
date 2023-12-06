<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

use App\Livewire\User\Home;
use App\Livewire\User\Cart;
use App\Livewire\User\Contact;
use App\Livewire\User\UserProfile;
use App\Livewire\User\OrderStatus;
use App\Livewire\User\ProductDetail;
use App\Livewire\User\AllProduct;
use App\Livewire\User\SearchResults;

use App\Livewire\Dashboard\Superadmin\Register;
use App\Livewire\Dashboard\Superadmin\UnitKerja;

use App\Livewire\Dashboard\Admin\Supplier;
use App\Livewire\Dashboard\Admin\SatuanBarang;
use App\Livewire\Dashboard\Admin\Barang;
use App\Livewire\Dashboard\Admin\KelolaFotoBarang;
use App\Livewire\Dashboard\Admin\Pesanan;


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login/sign-in', [LoginController::class, 'login'])->name('signin');
Route::post('/account/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function() {

});

// Middleware for Staf
Route::group(['middleware' => ['auth', 'role:staf']], function()
{
  Route::get('/', Home::class)->name('home');
  Route::get('/{slug}/detail', ProductDetail::class)->name('product-detail');
  Route::get('/status-pesanan', OrderStatus::class)->name('status-pesanan');
  Route::get('/keranjang', Cart::class)->name('cart');
  Route::get('/{slug}/profile', UserProfile::class)->name('user-profile');
  Route::get('/hubungi-kami', Contact::class)->name('contact');
  Route::get('/product/sort/{slug}', AllProduct::class)->name('all-product');
  Route::get('/search/{keyword}/results', SearchResults::class)->name('search-result');
});
// End

// Middleware for Superadmin
Route::group(['middleware' => ['auth', 'role:superadmin']], function()
{
  Route::get('/dashboard/unit-kerja', UnitKerja::class)->name('unit-kerja');
  Route::get('/dashboard/register/{slug}', Register::class)->name('register');
});
// End

// Middleware for Admin Gudang
Route::group(['middleware' => ['auth', 'role:admin gudang']], function()
{

});
// End

// Middleware for Superadmin & Admin Gudang
Route::group([
  ['middleware' => ['auth', 'role:admin gudang']],
  ['middleware' => ['auth', 'role:superadmin']]], function()
{
  Route::get('/dashboard/supplier', Supplier::class)->name('supplier');
  Route::get('/dashboard/satuan-barang', SatuanBarang::class)->name('satuan-barang');
  Route::get('/dashboard/barang', Barang::class)->name('barang');
  Route::get('/dashboard/barang/{slug}/kelola', KelolaFotoBarang::class)->name('kelola-barang');
  Route::get('/dashboard/pesanan', Pesanan::class)->name('pesanan');
});
// End
