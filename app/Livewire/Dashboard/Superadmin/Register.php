<?php

namespace App\Livewire\Dashboard\Superadmin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

use App\Models\User;
use App\Models\UnitKerja;

class Register extends Component
{
  use WithFileUploads;

	use WithPagination;
	protected $paginationTheme = 'bootstrap';

  public $unit_kerja_id, $user_id, $sorting_data, $sorted;
	public $name, $email, $password, $role, $jabatan, $foto;
  public $filter_unit_kerja_id, $filter_unit, $role_select;
	public $searchTermUnit, $searchTerm;
  public $archive_count, $notification_message;

  public $funit_kerja_id, $selected_filter, $selected_unit;

  function mount($slug)
  {
    if(!Auth::user()) { return redirect()->route('login'); }

    $this->filter_unit = $slug;
    $this->selected_filter = 'semua';

    if($slug != 'semua')
    {
      $unit_kerja = UnitKerja::where('slug', $slug)->first();

      $this->filter_unit_kerja_id = $unit_kerja->id;
      $this->selected_filter = '['.$unit_kerja->kode_unit.'] '.$unit_kerja->nama_unit;
    }

  }

  function refreshButton()
  {
    if($this->funit_kerja_id)
    {
      $uk = UnitKerja::where('id', $this->funit_kerja_id)->first();

      if($uk)
      {
        $slug = $uk->slug;
      }
      elseif($this->funit_kerja_id == 99999999999)
      {
        $slug = 'semua';
      }

      return redirect()->route('register', ['slug' => $slug]);
    }
  }

	public function render()
	{
    $searchTerm = '%'.$this->searchTerm . '%';
    $searchTermUnit = '%'.$this->searchTermUnit . '%';

    $this->refreshButton();

    if($this->unit_kerja_id)
    {
      $uk = UnitKerja::find($this->unit_kerja_id);
      $this->selected_unit = '['.$uk->kode_unit.'] '.$uk->nama_unit;
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
    if($this->sorted == 'name')
    {
      $asce_deesce = 'ASC';
    }

    if(!$this->filter_unit_kerja_id)
    {
      if(!$this->role_select)
      {
        $users = User::where([['name', 'ilike', $searchTerm], ['flag', null]])
        ->orWhere([['jabatan', 'ilike', $searchTerm], ['flag', null]])
        ->orWhere([['email', 'ilike', $searchTerm], ['flag', null]])
        ->orderBy($this->sorted, $asce_deesce)
        ->paginate(10, ['*'], 'users');
      }
      else
      {
        $users = User::where([['name', 'ilike', $searchTerm], ['role', $this->role_select], ['flag', null]])
        ->orWhere([['jabatan', 'ilike', $searchTerm], ['role', $this->role_select], ['flag', null]])
        ->orWhere([['email', 'ilike', $searchTerm], ['role', $this->role_select], ['flag', null]])
        ->orderBy($this->sorted, $asce_deesce)
        ->paginate(10, ['*'], 'users');
      }
    }
    else
    {
      if(!$this->role_select)
      {
        $users = User::where([['name', 'ilike', $searchTerm], ['unit_kerja_id', $this->filter_unit_kerja_id], ['flag', null]])
        ->orWhere([['jabatan', 'ilike', $searchTerm], ['unit_kerja_id', $this->filter_unit_kerja_id], ['flag', null]])
        ->orWhere([['email', 'ilike', $searchTerm], ['unit_kerja_id', $this->filter_unit_kerja_id], ['flag', null]])
        ->orderBy($this->sorted, $asce_deesce)
        ->paginate(10, ['*'], 'users');
      }
      else
      {
        $users = User::where([['name', 'ilike', $searchTerm], ['role', $this->role_select], ['unit_kerja_id', $this->filter_unit_kerja_id], ['flag', null]])
        ->orWhere([['jabatan', 'ilike', $searchTerm], ['role', $this->role_select], ['unit_kerja_id', $this->filter_unit_kerja_id], ['flag', null]])
        ->orWhere([['email', 'ilike', $searchTerm], ['role', $this->role_select], ['unit_kerja_id', $this->filter_unit_kerja_id], ['flag', null]])
        ->orderBy($this->sorted, $asce_deesce)
        ->paginate(10, ['*'], 'users');
      }
    }

    $office_units = UnitKerja::where([['kode_unit', 'ilike', $searchTermUnit], ['flag', null]])
    ->orWhere([['nama_unit', 'ilike', $searchTermUnit], ['flag', null]])
    ->orderBy('nama_unit', 'ASC')->get();

    $this->archive_count = User::where('flag', 'archived')->count();
    $archieves_data = User::where('flag', 'archived')->orderBy('updated_at', 'DESC')->paginate(10, ['*'], 'archives');

		return view('livewire.dashboard.superadmin.register', compact('users', 'office_units', 'archieves_data'))->layout('layouts.dashboard');
	}

  public function resetSearch()
	{
		$this->searchTerm = '';
	}

	public function store()
	{
    sleep(1);

		$this->validate([
			'unit_kerja_id' => 'required',
			'name' => 'required',
			'email' => 'required|unique:users|email',
			'password' => 'required',
			'role' => 'required',
			'jabatan' => 'required',
		]);

    if(User::where([['unit_kerja_id', $this->unit_kerja_id], ['name', $this->name]])->exists() or
       User::where([['unit_kerja_id', $this->unit_kerja_id], ['email', $this->email]])->exists())
    {
      $this->notification_message = 'User Gagal Dibuat, Data Sudah Ada !';
      $this->dispatch('dataAddedFailed');
      $this->resetInput();
    }
    else
    {
      if($this->foto)
      {
        $path = 'foto/'.$this->jabatan.'/'.$this->name;
        $imageName = 'foto_' . $this->name . '.' . $this->foto->extension();
        Storage::putFileAs(
          'public/'.$path, $this->foto, $imageName
        );
      }
      else
      {
        $path = null;
        $imageName = null;
      }

      $slug = str_ireplace( array(' - ', '. '), ' ' ,$this->name);
      $slug = str_ireplace( array('.'), '-' ,$slug);
      $slug = str_ireplace( array(' ',), '-' ,$slug);
      $slug = strtolower($slug);

      $user = User::create([
        'unit_kerja_id' => $this->unit_kerja_id,
        'name' => $this->name,
        'email' => $this->email,
        'password' => Hash::make($this->password),
        'role' => $this->role,
        'jabatan' => $this->jabatan,
        'path' => $path,
        'foto' => $imageName,
        'slug' => $slug
      ]);

      $user->assignRole($this->role);

      $this->notification_message = 'User Gagal Dibuat, Data Sudah Ada !';
      $this->dispatch('dataAddedSuccess');
      $this->resetInput();
      // return redirect()->route('register', ['slug' => $this->filter_unit])->with('info-success', 'Data Berhasil Ditambahkan !');
    }
	}

	public function edit($id)
	{
    $this->user_id = $id;

    $user = User::where('id', $id)->first();

    $this->unit_kerja_id = $user->unit_kerja->id;
    $this->name = $user->name;
    $this->email = $user->email;
    $this->role = $user->role;
    $this->jabatan = $user->jabatan;
	}

	public function update()
	{
    sleep(1);

    $user = User::where('id', $this->user_id)->first();

    $this->validate([
      'unit_kerja_id' => 'required',
      'name' => 'required',
      'email' => 'required|email',
      'jabatan' => 'required',
      'role' => 'required',
    ]);

    if(User::where([['unit_kerja_id', $this->unit_kerja_id], ['name', $this->name]])->exists() AND
       User::where([['unit_kerja_id', $this->unit_kerja_id], ['email', $this->email]])->exists())
    {
      if($this->jabatan != $user->jabatan)
      {
        $user->update([
          'jabatan' => $this->jabatan,
        ]);

        $this->notification_message = 'User Berhasil Di Update !';
        $this->dispatch('dataEditedSuccess');
        $this->resetInput();
      }
      else
      {
        $this->notification_message = 'User Gagal Di Update, Data Sudah Ada !';
        $this->dispatch('dataEditedFailed');
        $this->resetInput();
      }
    }
    else
    {
      $user->update([
        'unit_kerja_id' => $this->unit_kerja_id,
        'name' => $this->name,
        'email' => $this->email,
        'jabatan' => $this->jabatan,
      ]);

      $this->notification_message = 'User Berhasil Di Update !';
      $this->dispatch('dataEditedSuccess');
      $this->resetInput();
    }
	}

	public function delete()
	{
    sleep(1);

    $user = User::where('id', $this->user_id)->first();
    $user->update([
      'flag' => 'archived'
    ]);

    $this->notification_message = 'User Berhasil Di Archived !';
    $this->dispatch('dataArchivedSuccess');
    $this->resetInput();
    // return redirect()->route('register', ['slug' => $this->filter_unit])->with('info-success', 'User Berhasil Dihapus !');
	}

  function restore($id)
  {
    sleep(1);

    $user = User::where('id', $id)->first();
    $user->update([
      'flag' => null
    ]);

    $this->notification_message = 'User Berhasil Dipulihkan !';
    $this->dispatch('dataRestoredSuccess');
    $this->resetInput();
    // return redirect()->route('register', ['slug' => $this->filter_unit])->with('info-success', 'User Berhasil Di-restore !');
  }

  function permanentDelete()
  {
    sleep(1);

    $unit_edit = User::where('id', $this->user_id)->delete();

    $this->notification_message = 'User Berhasil Dihapus Permanent !';
    $this->dispatch('dataDeletedSuccess');
    $this->resetInput();
    // return redirect()->route('register', ['slug' => $this->filter_unit])->with('info-success', 'User Berhasil Dihapus Permanen !');
  }

  function resetInput()
  {
    $this->reset(['unit_kerja_id', 'user_id', 'sorting_data', 'name', 'email', 'password', 'role', 'jabatan', 'foto', 'role_select', 'searchTermUnit', 'searchTerm', 'unit_kerja_id', 'funit_kerja_id']);
  }
}
