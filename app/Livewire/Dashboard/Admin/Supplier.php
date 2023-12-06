<?php

namespace App\Livewire\Dashboard\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Barang;
use App\Models\UnitKerja;
use App\Models\Supplier as SupplierModel;

class Supplier extends Component
{
	use WithPagination;
	protected $paginationTheme = 'bootstrap';

  public $searchTerm, $supplier_id;
  public $kode_supplier, $nama_supplier, $country_code = 62, $telepon;
  public $unit_kerja_id, $funit_kerja_id, $sorting_data, $sorted, $selected_filter, $selected_unit;
  public $kode_unit, $archive_count, $notification_message;

  function mount()
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
    if($this->sorted == 'nama_supplier')
    {
      $asce_deesce = 'ASC';
    }

    if(Auth::user()->role == 'superadmin')
    {
      if($this->funit_kerja_id)
      {
        $fuk = UnitKerja::find($this->funit_kerja_id);
        $this->selected_filter = '['.$fuk->kode_unit.'] '.$fuk->nama_unit;
      }

      if($this->unit_kerja_id)
      {
        $uk = UnitKerja::find($this->unit_kerja_id);
        $this->kode_unit = $uk->kode_unit;
        $this->selected_unit = '['.$this->kode_unit.'] '.$uk->nama_unit;
      }

      if(!$this->funit_kerja_id)
      {
        $suppliers = SupplierModel::where(
        [
          ['flag', null],
          ['nama_supplier', 'ilike', $searchTerm]
        ])->orWhere(
        [
          ['flag', null],
          ['kode_supplier', 'ilike', $searchTerm]
        ])->orderBy($this->sorted, $asce_deesce)->paginate(10, ['*'], 'suppliers')->onEachSide(0);
      }
      else
      {
        $suppliers = SupplierModel::where(
        [
          ['flag', null],
          ['nama_supplier', 'ilike', $searchTerm],
          ['unit_kerja_id', $this->funit_kerja_id],
        ])->orWhere(
        [
          ['flag', null],
          ['kode_supplier', 'ilike', $searchTerm],
          ['unit_kerja_id', $this->funit_kerja_id],
        ])->orderBy($this->sorted, $asce_deesce)->paginate(10, ['*'], 'suppliers')->onEachSide(0);
      }

      $this->archive_count = SupplierModel::where('flag', 'archived')->count();
      $archieves_data = SupplierModel::where('flag', 'archived')->orderBy('updated_at', 'DESC')->paginate(10, ['*'], 'archieves')->onEachSide(0);
    }

    elseif(Auth::user()->role == 'admin gudang')
    {
      $suppliers = SupplierModel::where(
      [
        ['flag', null],
        ['nama_supplier', 'ilike', $searchTerm],
        ['unit_kerja_id', Auth::user()->unit_kerja->id],
      ])->orWhere(
      [
        ['flag', null],
        ['kode_supplier', 'ilike', $searchTerm],
        ['unit_kerja_id', $this->funit_kerja_id],
      ])->orderBy($this->sorted, $asce_deesce)->paginate(10, ['*'], 'suppliers')->onEachSide(0);

      $this->archive_count = SupplierModel::where([['flag', 'archived'], ['unit_kerja_id', Auth::user()->unit_kerja->id]])->count();
      $archieves_data = SupplierModel::where([['flag', 'archived'], ['unit_kerja_id', Auth::user()->unit_kerja->id]])->orderBy('updated_at', 'DESC')->paginate(10, ['*'], 'archieves')->onEachSide(0);
    }

    $office_units = UnitKerja::where('flag', null)->orderBy('nama_unit', 'ASC')->get();

    return view('livewire.dashboard.admin.supplier', compact('suppliers', 'archieves_data', 'office_units'))->layout('layouts.dashboard');
  }

  public function resetSearch()
	{
		$this->searchTerm = '';
	}

  function store()
  {
    sleep(1);

    if(!Auth::user()->role == 'superadmin')
    {
      $this->validate([
        'kode_supplier' => 'required|max:4',
        'nama_supplier' => 'required',
        'telepon' => 'required',
      ]);
    }
    else
    {
      $this->validate([
        'unit_kerja_id' => 'required',
        'kode_supplier' => 'required|max:4',
        'nama_supplier' => 'required',
        'telepon' => 'required',
      ]);
    }

    if(Auth::user()->role == 'superadmin')
    {
      $uk_id = $this->unit_kerja_id;
      $theUk = UnitKerja::find($this->unit_kerja_id);
      $code_supplier = $theUk->kode_unit. '-' .$this->kode_supplier;
    }
    elseif(Auth::user()->role == 'admin gudang')
    {
      $uk_id = Auth::user()->unit_kerja->id;
      $code_supplier = Auth::user()->unit_kerja->kode_unit. '-' .$this->kode_supplier;
    }

    if(SupplierModel::where([['unit_kerja_id', $this->unit_kerja_id], ['kode_supplier', $code_supplier]])->exists() or
    SupplierModel::where([['unit_kerja_id', $this->unit_kerja_id], ['nama_supplier', $this->nama_supplier]])->exists())
    {
      $this->notification_message = 'Supplier Gagal Dibuat, Data Sudah Ada !';
      $this->dispatch('dataAddedFailed');
      $this->resetInput();
    }
    else
    {
      $no_telp = $this->country_code.$this->telepon;

      SupplierModel::create([
        'kode_supplier' => $code_supplier,
        'nama_supplier' => $this->nama_supplier,
        'telepon' => $no_telp,
        'unit_kerja_id' => $uk_id,
      ]);

      $this->notification_message = 'Supplier Berhasil Dibuat !';
      $this->dispatch('dataAddedSuccess');
      $this->resetInput();
    }
  }

  function edit($id)
  {
    $this->supplier_id = $id;
    $supplier = SupplierModel::where('id', $this->supplier_id)->first();

    // dd($supplier->unit_kerja->kode_unit);

    $kode_supplier = str_ireplace( array($supplier->unit_kerja->kode_unit, '-'), '' ,$supplier->kode_supplier);
    $telepon = str_ireplace( array(62), '' ,$supplier->telepon);

    $this->unit_kerja_id = $supplier->unit_kerja_id;
    $this->kode_supplier = $kode_supplier;
    $this->nama_supplier = $supplier->nama_supplier;
    $this->telepon = $telepon;
  }

  function update()
  {
    sleep(1);

    $supplier = SupplierModel::where('id', $this->supplier_id)->first();

    if($this->unit_kerja_id == $supplier->unit_kerja_id)
    {
      $kode_unit = $supplier->unit_kerja->kode_unit;
    }
    else
    {
      $kode_unit = $this->kode_unit;
    }

    $telepon = $this->country_code.$this->telepon;
    $kode_supplier = $kode_unit.'-'.$this->kode_supplier;

    if(SupplierModel::where([['unit_kerja_id', $this->unit_kerja_id], ['kode_supplier', $kode_supplier]])->exists() AND
    SupplierModel::where([['unit_kerja_id', $this->unit_kerja_id], ['nama_supplier', $this->nama_supplier]])->exists())
    {
      if($telepon != $supplier->telepon)
      {
        $supplier->update([
          'telepon' => $telepon,
        ]);

        $this->notification_message = 'Supplier Berhasil Di Update !';
        $this->dispatch('dataEditedSuccess');
        $this->resetInput();
      }
      else
      {
        $this->notification_message = 'Supplier Gagal Di Update, Data Sudah Ada !';
        $this->dispatch('dataEditedFailed');
        $this->resetInput();
      }
    }
    else
    {
      if($supplier->kode_supplier != $kode_supplier)
      {
        $barang = Barang::where([['supplier_id', $this->supplier_id], ['unit_kerja_id', $supplier->unit_kerja->id]])->get();
        foreach ($barang as $barangKey => $barangValue)
        {
          $old_kode_barang = str_ireplace( array($supplier->kode_supplier, '-'), '' ,$barang[$barangKey]['kode_barang']);
          $new_kode_barang = $kode_supplier.'-'.$old_kode_barang;

          $barang[$barangKey]->update([
            'kode_barang' => $new_kode_barang
          ]);
        }
      }

      $supplier->update([
        'kode_supplier' => $kode_supplier,
        'nama_supplier' => $this->nama_supplier,
        'telepon' => $telepon,
        'unit_kerja_id' => $this->unit_kerja_id,
      ]);

      $this->notification_message = 'Supplier Berhasil Di Update !';
      $this->dispatch('dataEditedSuccess');
      $this->resetInput();
    }
  }

  function delete()
  {
    sleep(1);

    $supp_edit = SupplierModel::where('id', $this->supplier_id)->first();
    $supp_edit->update([
      'flag' => 'archived'
    ]);

    $barang = Barang::where([['supplier_id', $this->supplier_id], ['unit_kerja_id', $supp_edit->unit_kerja->id]])->get();
    foreach($barang as $barangKey => $barangValue)
    {
      $barang[$barangKey]->update([
        'flag' => 'archived'
      ]);
    }

    $this->notification_message = 'Suppllier Berhasil Di Archived !';
    $this->dispatch('dataArchivedSuccess');
    $this->resetInput();
  }

  function restore($id)
  {
    sleep(1);

    $supp_edit = SupplierModel::where('id', $id)->first();
    $supp_edit->update([
      'flag' => null
    ]);

    $barang = Barang::where([['supplier_id', $id], ['unit_kerja_id', $supp_edit->unit_kerja->id]])->get();
    foreach($barang as $barangKey => $barangValue)
    {
      $barang[$barangKey]->update([
        'flag' => null
      ]);
    }

    $this->notification_message = 'Supplier Berhasil Dipulihkan !';
    $this->dispatch('dataRestoredSuccess');
    $this->resetInput();
  }

  function permanentDelete()
  {
    sleep(1);

    $supp_edit = SupplierModel::where('id', $this->supplier_id)->first();

    $barang = Barang::where([['supplier_id', $this->supplier_id], ['unit_kerja_id', $supp_edit->unit_kerja->id]])->get();
    foreach($barang as $barangKey => $barangValue)
    {
      Barang::where('unit_kerja_id', $barang[$barangKey]['unit_kerja_id'])->delete();
    }

    $supp_edit->delete();

    $this->notification_message = 'Supplier Berhasil Dihapus Permanent !';
    $this->dispatch('dataDeletedSuccess');
    $this->resetInput();
  }

  function resetInput()
  {
    $this->reset(['searchTerm', 'supplier_id', 'kode_supplier', 'nama_supplier', 'telepon', 'unit_kerja_id', 'funit_kerja_id', 'sorting_data', 'selected_filter', 'selected_unit', 'kode_unit']);
  }
}
