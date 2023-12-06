<?php

namespace App\Livewire\Dashboard\Superadmin;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Supplier;
use App\Models\Barang;
use App\Models\UnitKerja as UnitKerjaModel;

class UnitKerja extends Component
{
	use WithPagination;
	protected $paginationTheme = 'bootstrap';

  public $searchTerm, $unit_id;
  public $kode_unit, $nama_unit, $alamat, $telepon, $email;
  public $sorting_data, $sorted;
  public $archive_count, $notification_message;

  public function mount()
  {
    if(!Auth::user()) { return redirect()->route('login'); }
  }

  public function render()
  {
    $searchTerm = '%'.$this->searchTerm . '%';

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
    if($this->sorted == 'nama_unit')
    {
      $asce_deesce = 'ASC';
    }

    $office_units = UnitKerjaModel::where([['kode_unit', 'ilike', $searchTerm], ['flag', null]])
    ->orWhere([['nama_unit', 'ilike', $searchTerm], ['flag', null]])
    ->orderBy($this->sorted, $asce_deesce)
    ->paginate(10, ['*'], 'offices')->onEachSide(0);

    $this->archive_count = UnitKerjaModel::where('flag', 'archived')->count();
    $archieves_data = UnitKerjaModel::where('flag', 'archived')->orderBy('updated_at', 'DESC')->paginate(10, ['*'], 'archives')->onEachSide(0);

    return view('livewire.dashboard.superadmin.unit-kerja', compact('office_units', 'archieves_data'))->layout('layouts.dashboard');
  }

  public function resetSearch()
	{
		$this->searchTerm = '';
	}

  function store()
  {
    sleep(1);

    $this->validate([
      'kode_unit' => 'required|max:3',
      'nama_unit' => 'required',
    ]);

    if(UnitKerjaModel::where('nama_unit', $this->nama_unit)->exists() or UnitKerjaModel::where('kode_unit', $this->kode_unit)->exists())
    {
      $this->notification_message = 'Unit Kerja Gagal Dibuat, Data Sudah Ada !';
      $this->dispatch('dataAddedFailed');
      $this->resetInput();
      // return redirect()->route('unit-kerja')->with('info-failed', 'Unit Kerja dengan nama unit atau kode unit yang sama telah tersedia !');
    }
    else
    {
      $slug = str_ireplace( array(' - ', '. '), ' ' ,$this->nama_unit);
      $slug = str_ireplace( array('.'), '-' ,$slug);
      $slug = str_ireplace( array(' ',), '-' ,$slug);
      $slug = strtolower($slug);

      UnitKerjaModel::create([
        'kode_unit' => $this->kode_unit,
        'nama_unit' => $this->nama_unit,
        'slug' => $slug,
        'alamat' => $this->alamat,
        'telepon' => $this->telepon,
        'email' => $this->email,
      ]);

      $this->notification_message = 'Unit Kerja Berhasil Dibuat !';
      $this->dispatch('dataAddedSuccess');
      $this->resetInput();
      // return redirect()->route('unit-kerja')->with('info-success', 'Unit Kerja Berhasil Ditambahkan !');
    }
  }

  function edit($id)
  {
    $this->unit_id = $id;
    $unit_kerja = UnitKerjaModel::where('id', $this->unit_id)->first();

    $this->kode_unit = $unit_kerja->kode_unit;
    $this->nama_unit = $unit_kerja->nama_unit;
    $this->alamat = $unit_kerja->alamat;
    $this->telepon = $unit_kerja->telepon;
    $this->email = $unit_kerja->email;
  }

  function update()
  {
    sleep(1);

    $unit_edit = UnitKerjaModel::where('id', $this->unit_id)->first();

    $this->validate([
      'kode_unit' => 'required|max:3',
      'nama_unit' => 'required',
    ]);

    if($this->kode_unit != $unit_edit->kode_unit or $this->nama_unit != $unit_edit->nama_unit)
    {
      if(UnitKerjaModel::where('nama_unit', $this->nama_unit)->exists() AND
         UnitKerjaModel::where('kode_unit', $this->kode_unit)->exists())
      {
        $this->notification_message = 'Unit Kerja Gagal Di Update, Data Sudah Ada !';
        $this->dispatch('dataEditedFailed');
        $this->resetInput();
      }
      else
      {
        if($unit_edit->kode_unit != $this->kode_unit)
        {
          $supplier = Supplier::where('unit_kerja_id', $this->unit_id)->get();
          foreach($supplier as $supplierKey => $supplierValue)
          {
            $old_kode_supplier = str_ireplace( array($unit_edit->kode_unit, '-'), '' ,$supplier[$supplierKey]['kode_supplier']);
            $new_kode_supplier = $this->kode_unit.'-'.$old_kode_supplier;

            $barang = Barang::where([['unit_kerja_id', $this->unit_id], ['supplier_id', [$supplier[$supplierKey]['id']] ]])->get();
            foreach($barang as $barangKey => $barangValue)
            {
              $sup_kod = $unit_edit->kode_unit.'-'.$old_kode_supplier;
              $old_kode_barang = str_ireplace( array($sup_kod, '-'), '' ,$barang[$barangKey]['kode_barang']);
              $new_kode_barang = $new_kode_supplier.'-'.$old_kode_barang;

              $barang[$barangKey]->update([
                'kode_barang' => $new_kode_barang
              ]);
            }

            $supplier[$supplierKey]->update([
              'kode_supplier' => $new_kode_supplier
            ]);
          }
        }

        $unit_edit->update([
          'kode_unit' => $this->kode_unit,
          'nama_unit' => $this->nama_unit,
        ]);

        $this->notification_message = 'Unit Kerja Berhasil Di Update !';
        $this->dispatch('dataEditedSuccess');
        $this->resetInput();
      }
    }
    else
    {
      $this->notification_message = 'Tidak Ada Perubahan Yang Dilakukan';
      $this->dispatch('dataEditedFailed');
      $this->resetInput();
    }
  }

  function delete()
  {
    sleep(1);

    $unit_edit = UnitKerjaModel::where('id', $this->unit_id)->first();
    $unit_edit->update([
      'flag' => 'archived'
    ]);

    $user = User::where('unit_kerja_id', $this->unit_id)->get();
    foreach($user as $userKey => $userValue)
    {
      $user[$userKey]->update([
        'flag' => 'archived'
      ]);
    }

    $supplier = Supplier::where('unit_kerja_id', $this->unit_id)->get();
    foreach($supplier as $supplierKey => $supplierValue)
    {
      $supplier[$supplierKey]->update([
        'flag' => 'archived'
      ]);
    }

    $barang = Barang::where('unit_kerja_id', $this->unit_id)->get();
    foreach($barang as $barangKey => $barangValue)
    {
      $barang[$barangKey]->update([
        'flag' => 'archived'
      ]);
    }

    $this->notification_message = 'Unit Kerja Berhasil Di Archived !';
    $this->dispatch('dataArchivedSuccess');
    $this->resetInput();
    // return redirect()->route('unit-kerja')->with('info-success', 'Unit Kerja Berhasil Di Archived !');
  }

  function restore($id)
  {
    sleep(1);

    $unit_edit = UnitKerjaModel::where('id', $id)->first();
    $unit_edit->update([
      'flag' => null
    ]);

    $user = User::where('unit_kerja_id', $id)->get();
    foreach($user as $userKey => $userValue)
    {
      $user[$userKey]->update([
        'flag' => null
      ]);
    }

    $supplier = Supplier::where('unit_kerja_id', $id)->get();
    foreach($supplier as $supplierKey => $supplierValue)
    {
      $supplier[$supplierKey]->update([
        'flag' => null
      ]);
    }

    $barang = Barang::where('unit_kerja_id', $id)->get();
    foreach($barang as $barangKey => $barangValue)
    {
      $barang[$barangKey]->update([
        'flag' => null
      ]);
    }

    $this->notification_message = 'Unit Kerja Berhasil Dipulihkan !';
    $this->dispatch('dataRestoredSuccess');
    $this->resetInput();
    // return redirect()->route('unit-kerja')->with('info-success', 'Unit Kerja Berhasil Di-restore !');
  }

  function permanentDelete()
  {
    sleep(1);

    $unit_edit = UnitKerjaModel::find($this->unit_id)->delete();

    $user = User::where('unit_kerja_id', $this->unit_id)->get();
    foreach($user as $userKey => $userValue)
    {
      User::where('unit_kerja_id', $user[$userKey]['unit_kerja_id'])->delete();
    }

    $supplier = Supplier::where('unit_kerja_id', $this->unit_id)->get();
    foreach($supplier as $supplierKey => $supplierValue)
    {
      Supplier::where('unit_kerja_id', $supplier[$supplierKey]['unit_kerja_id'])->delete();
    }

    $barang = Barang::where('unit_kerja_id', $this->unit_id)->get();
    foreach($barang as $barangKey => $barangValue)
    {
      Barang::where('unit_kerja_id', $barang[$barangKey]['unit_kerja_id'])->delete();
    }

    $this->notification_message = 'Unit Kerja Berhasil Dihapus Permanent !';
    $this->dispatch('dataDeletedSuccess');
    $this->resetInput();
    // return redirect()->route('unit-kerja')->with('info-success', 'Unit Kerja Berhasil Dihapus Permanen !');
  }

  function resetInput()
  {
    $this->reset(['unit_id', 'kode_unit', 'nama_unit', 'alamat', 'telepon', 'email', 'sorting_data']);
  }
}
