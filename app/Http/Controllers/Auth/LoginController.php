<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use App\Models\User;
use App\Models\ProfileUser;

class LoginController extends Controller
{
	use AuthenticatesUsers;

	protected $redirectTo = RouteServiceProvider::HOME;

	protected function redirectTo()
	{
		// if(auth()->user()->role == 1)
		// {
		// 	return route('admin');
		// }
		// elseif(auth()->user()->role == 2)
		// {
		// 	return route('admin');
		// }
	}

	public function __construct()
	{
		$this->middleware('guest')->except('logout');
	}

	public function index()
	{
		return view('login');
	}

	public function login(Request $request)
	{
		$validation = $this->validate($request, [
			'email' => 'required|email',
			'password' => 'required',
      'g-recaptcha-response' => 'required'
		]);

		if (!auth()->attempt($request->only('email','password'), $request->remember))
		{
			return back()->with('status-failed','Login Gagal, Email atau Password Salah');
		}

		if(Auth::user()->role == 'staf')
		{
			return redirect()->route('home');
		}
		else if(Auth::user()->role == 'superadmin')
		{
			return redirect()->route('register', ['slug' => 'semua']);
		}
		else if(Auth::user()->role == 'admin gudang')
		{
			return redirect()->route('supplier');
		}
	}

  public function register(Request $request)
  {
    $this->validate($request, [
			'nama_lengkap' => 'required',
			'nama_panggilan' => 'required',
      'email' => 'required|email',
			'password' => 'required',
			'no_wa' => 'required',
			'no_ktp' => 'required',
			'status_pernikahan' => 'required',
			'alamat_ktp' => 'required',
			'alamat_kantor' => 'required',
    ]);

    if(!ProfileUser::where(
      [
        ['nama_lengkap', $request->nama_lengkap],
        ['no_wa', $request->no_wa],
        ['no_ktp', $request->no_ktp]
      ])->exists())
    {
      $slug = str_ireplace( array(' - ', '. '), ' ' ,$request->nama_lengkap);
      $slug = str_ireplace( array('.'), '-' ,$slug);
      $slug = str_ireplace( array(' ',), '-' ,$slug);
      $slug = strtolower($slug);

      $user = User::create([
        'name' => $request->nama_lengkap,
        'slug' => $slug,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => 'user',
      ]);

      $user->attachRole('user');

      $profile = ProfileUser::create([
        'nama_lengkap' => $request->nama_lengkap,
        'nama_panggilan' => $request->nama_panggilan,
        'no_wa' => $request->no_wa,
        'no_ktp' => $request->no_ktp,
        'status_pernikahan' => $request->status_pernikahan,
        'alamat_ktp' => $request->alamat_ktp,
        'alamat_kantor' => $request->alamat_kantor,
        'user_id' => $user->id,
      ]);
    }

    return redirect()->route('login');
  }

	public function logout()
	{
		auth()->logout();
		return redirect()->route('home');
	}
}
