<?php

namespace App\Livewire\Dashboard\Admin;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithFileUploads;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

use App\Models\SatuanBarang;
use App\Models\UnitKerja;
use App\Models\Supplier;
use App\Models\Barang as BarangModel;

class Barang extends Component
{
  use WithPagination, WithFileUploads;
  protected $paginationTheme = 'bootstrap';

  public $searchTerm, $supplier_id, $barang_id, $barangedit;
  public $unit_kerja_id, $funit_kerja_id, $sorting_data, $sorted;
  public $kode_barang, $nama_barang, $deskripsi, $stok, $thumbnail, $thumbnail_edit, $harga, $satuan_barang;
  public $archive_count, $notification_message;
  public $suppliers, $selected_satuan, $selected_supplier, $selected_unit_kerja;

  function resetInput()
  {
    $this->reset(['searchTerm', 'supplier_id', 'barang_id', 'barangedit', 'unit_kerja_id', 'sorting_data', 'kode_barang',  'nama_barang', 'deskripsi', 'stok', 'thumbnail', 'thumbnail_edit', 'harga', 'satuan_barang', 'selected_satuan', 'selected_supplier', 'selected_unit_kerja']);
  }

  function mount()
  {
    if(!Auth::user()) { return redirect()->route('login'); }
  }

  public function render()
  {
    if (Auth::user()->role == 'superadmin')
    {
      if($this->unit_kerja_id)
      {
        $this->suppliers = Supplier::where([['flag', null], ['unit_kerja_id', $this->unit_kerja_id]])->orderBy('nama_supplier', 'ASC')->get();
      }
    }
    elseif (Auth::user()->role == 'admin gudang')
    {
      $this->suppliers = Supplier::where([['flag', null], ['unit_kerja_id', Auth::user()->unit_kerja_id]])->orderBy('nama_supplier', 'ASC')->get();
    }

    if($this->supplier_id)
    {
      $supri = Supplier::find($this->supplier_id);
      $this->selected_supplier = '['.$supri->kode_supplier.'] '.$supri->nama_supplier;
    }

    if($this->unit_kerja_id)
    {
      $uks = UnitKerja::find($this->unit_kerja_id);
      $this->selected_unit_kerja = '['.$uks->kode_unit.'] '.$uks->nama_unit;
    }

    $this->selected_satuan = $this->satuan_barang;

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
    if($this->sorted == 'nama_barang')
    {
      $asce_deesce = 'ASC';
    }

    if(Auth::user()->role == 'superadmin')
    {
      if(!$this->funit_kerja_id)
      {
        $barangs = BarangModel::where(
        [
          ['flag', null],
          ['nama_barang', 'ilike', $searchTerm]
        ])->orderBy($this->sorted, $asce_deesce)->paginate(10, ['*'], 'barang')->onEachSide(0);
      }
      else
      {
        $barangs = BarangModel::where(
        [
          ['flag', null],
          ['nama_barang', 'ilike', $searchTerm],
          ['unit_kerja_id', $this->funit_kerja_id],
        ])->orderBy($this->sorted, $asce_deesce)->paginate(10, ['*'], 'barang')->onEachSide(0);
      }

      $this->archive_count = BarangModel::where('flag', 'archived')->count();
      $archieves_data = BarangModel::where('flag', 'archived')->orderBy('updated_at', 'DESC')->paginate(10, ['*'], 'archieves')->onEachSide(0);
    }

    elseif(Auth::user()->role == 'admin gudang')
    {
      $barangs = BarangModel::where(
      [
        ['flag', null],
        ['nama_barang', 'ilike', $searchTerm],
        ['unit_kerja_id', Auth::user()->unit_kerja->id],
      ])->orderBy($this->sorted, $asce_deesce)->paginate(10, ['*'], 'barang')->onEachSide(0);

      $this->archive_count = BarangModel::where([['flag', 'archived'], ['unit_kerja_id', Auth::user()->unit_kerja->id]])->count();
      $archieves_data = BarangModel::where([['flag', 'archived'], ['unit_kerja_id', Auth::user()->unit_kerja->id]])->orderBy('updated_at', 'DESC')->paginate(10, ['*'], 'archieves')->onEachSide(0);
    }

    $office_units = UnitKerja::where('flag', null)->orderBy('nama_unit', 'ASC')->get();
    $satuan_barangs = SatuanBarang::orderBy('satuan', 'ASC')->get();

    return view('livewire.dashboard.admin.barang', compact('barangs', 'archieves_data', 'office_units', 'satuan_barangs'))
    ->layout('layouts.dashboard');
  }

  public function resetSearch()
	{
		$this->searchTerm = '';
	}

  function store()
  {
    sleep(1);

    // $this->validate([
    //   'kode_barang' => 'required|max:4',
    //   'nama_barang' => 'required',
    //   'deskripsi' => 'required',
    //   'stok' => 'required',
    //   'thumbnail' => 'required|image|max:1000',
    //   'harga' => 'required',
    //   'supplier_id' => 'required',
    // ]
    // ,[
    //   'file.required' => 'You have to choose the file!',
    //   'type.required' => 'You have to choose type of the file!'
    // ]
    // );

    if (Auth::user()->role == 'superadmin')
    {
      $uk_id = $this->unit_kerja_id;
    }
    elseif(Auth::user()->role == 'admin gudang')
    {
      $uk_id = Auth::user()->unit_kerja->id;
    }

    $supplier = Supplier::where('id', $this->supplier_id)->first();
    $code_barang = $supplier->kode_supplier. '-' .$this->kode_barang;

    if(BarangModel::where([['unit_kerja_id', $uk_id], ['supplier_id', $this->supplier_id], ['kode_barang', $code_barang]])->exists() or
       BarangModel::where([['unit_kerja_id', $uk_id], ['supplier_id', $this->supplier_id], ['nama_barang', $this->nama_barang]])->exists())
    {
      $this->notification_message = 'Barang Gagal Dibuat, Data Sudah Ada !';
      $this->dispatch('dataAddedFailed');
      $this->resetInput();
    }
    else
    {
      $slug = str_ireplace( array(' - ', '. '), ' ' ,$this->nama_barang);
      $slug = str_ireplace( array('.'), '-' ,$slug);
      $slug = str_ireplace( array(' / '), '/' ,$slug);
      $slug = str_ireplace( array('/'), '-' ,$slug);
      $slug = str_ireplace( array(' ',), '-' ,$slug);
      $slug = str_ireplace( array(','), '' ,$slug);

      if($this->thumbnail)
      {
        $path = 'foto/'.$supplier->nama_supplier.'/'.$this->nama_barang;
        $imageName = 'foto_' . $slug . '.' . $this->thumbnail->extension();
        Storage::putFileAs(
          'public/'.$path, $this->thumbnail, $imageName
        );
      }
      else
      {
        $path = null;
        $imageName = null;
      }

      BarangModel::create([
        'kode_barang' => $code_barang,
        'nama_barang' => $this->nama_barang,
        'deskripsi' => $this->deskripsi,
        'stok' => $this->stok,
        'harga' => $this->harga,
        'satuan' => $this->satuan_barang,
        'path' => $path,
        'thumbnail' => $imageName,
        'slug' => $slug,
        'supplier_id' => $this->supplier_id,
        'unit_kerja_id' => $uk_id,
      ]);

      $this->notification_message = 'Barang Berhasil Dibuat !';
      $this->dispatch('dataAddedSuccess');
      $this->resetInput();
    }
  }

  function deleteId($id)
  {
    $this->barang_id = $id;
  }

  function edit($id)
  {
    $this->barang_id = $id;
    $barang = BarangModel::where('id', $id)->first();
    $this->barangedit = $barang;

    $kode_barang = str_ireplace( array($barang->supplier->kode_supplier, '-'), '' ,$barang->kode_barang);

    $this->kode_barang = $kode_barang;
    $this->nama_barang = $barang->nama_barang;
    $this->deskripsi = $barang->deskripsi;
    $this->stok = $barang->stok;
    $this->harga = $barang->harga;

    $this->unit_kerja_id = $barang->unit_kerja_id;
    $this->supplier_id = $barang->supplier_id;
    $this->satuan_barang = $barang->satuan;
  }

  public function deleteThumbnail($id)
  {
    sleep(1);

    $barang = BarangModel::where('id', $id)->first();

    $path = 'storage/'.$barang->path.'/'.$barang->thumbnail;

    File::delete($path);

    $barang->update([
      'thumbnail' => null
    ]);

    $this->notification_message = 'Thumbnail Berhasil Dihapus !';
    $this->dispatch('dataDeletedSuccess');
    $this->resetInput();
  }

  function update()
  {
    sleep(1);

    // $this->validate([
    //   'kode_barang' => 'required|max:5',
    //   'nama_barang' => 'required',
    //   'deskripsi' => 'required',
    //   'stok' => 'required',
    //   'satuan_barang' => 'required',
    //   'harga' => 'required',
    //   'supplier_id' => 'required',
    // ]);

    $barang = BarangModel::where('id', $this->barang_id)->first();
    $supplier = Supplier::where('id', $this->supplier_id)->first();

    $kode_barang = $supplier->kode_supplier.'-'.$this->kode_barang;

    if(BarangModel::where([
        ['unit_kerja_id', $barang->unit_kerja_id],
        ['supplier_id', $this->supplier_id],
        ['kode_barang', $kode_barang]])->exists() AND
       BarangModel::where([
        ['unit_kerja_id', $barang->unit_kerja_id],
        ['supplier_id', $this->supplier_id],
        ['nama_barang', $this->nama_barang]])->exists())
    {
      if($this->deskripsi != $barang->deskripsi  or
         $this->satuan_barang != $barang->satuan or
         $this->stok != $barang->stok or
         $this->harga != $barang->harga)
      {
        $barang->update([
          'deskripsi' => $this->deskripsi,
          'satuan' => $this->satuan_barang,
          'stok' => $this->stok,
          'harga' => $this->harga,
        ]);

        $this->notification_message = 'Barang Berhasil Di Update !';
        $this->dispatch('dataEditedSuccess');
        $this->resetInput();
      }
      else
      {
        $this->notification_message = 'Barang Gagal Di Update, Data Sudah Ada !';
        $this->dispatch('dataEditedFailed');
        $this->resetInput();
      }
    }
    else
    {
      $slug = str_ireplace( array(' - ', '. ', ','), ' ' ,$this->nama_barang);
      $slug = str_ireplace( array(','), '' ,$slug);
      $slug = str_ireplace( array('.'), '-' ,$slug);
      $slug = str_ireplace( array(' / '), '/' ,$slug);
      $slug = str_ireplace( array('/'), '-' ,$slug);
      $slug = str_ireplace( array(' ',), '-' ,$slug);

      // $oldPath = 'foto/'.$supplier->nama_supplier.'/'.$barang->nama_barang;
      // $path = 'foto/'.$supplier->nama_supplier.'/'.$this->nama_barang;

      // $imageName = 'foto_' . $slug . '.' . $this->thumbnail->extension();

      // if($this->nama_barang == $barang->nama_barang)
      // {
      //   Storage::putFileAs(
      //     'public/'.$path, $this->thumbnail, $imageName
      //   );
      // }
      // elseif($this->nama_barang != $barang->nama_barang)
      // {
      //   Storage::putFileAs(
      //     'public/'.$path, $this->thumbnail, $imageName
      //   );

      //   File::copyDirectory($oldPath, $path);

      //   $deletePath = 'storage/'.$oldPath;
      //   File::deleteDirectory($deletePath);
      // }

      $barang->update([
        'kode_barang' => $kode_barang,
        'nama_barang' => $this->nama_barang,
        'deskripsi' => $this->deskripsi,
        'stok' => $this->stok,
        'harga' => $this->harga,
        'slug' => $slug,
        'satuan' => $this->satuan_barang,
        'supplier_id' => $this->supplier_id,
        'unit_kerja_id' => $this->unit_kerja_id,
      ]);

      $this->notification_message = 'Barang Berhasil Di Update !';
      $this->dispatch('dataEditedSuccess');
      $this->resetInput();
    }
  }

  function updateThumbnail()
  {
    sleep(1);

    $this->validate([
      'thumbnail' => 'required|image|max:1000',
    ]);

    $barang = BarangModel::where('id', $this->barang_id)->first();
    $supplier = Supplier::where('id', $this->supplier_id)->first();

    $slug = str_ireplace( array(' - ', '. '), ' ' ,$this->nama_barang);
    $slug = str_ireplace( array(','), '' ,$slug);
    $slug = str_ireplace( array('.'), '-' ,$slug);
    $slug = str_ireplace( array(' / '), '/' ,$slug);
    $slug = str_ireplace( array('/'), '-' ,$slug);
    $slug = str_ireplace( array(' ',), '-' ,$slug);

    $path = 'foto/'.$supplier->slug.'/'.$barang->slug;

    $imageName = 'foto_' . $barang->slug . '.' . $this->thumbnail->extension();

    Storage::putFileAs(
      'public/'.$path, $this->thumbnail, $imageName
    );

    $barang->update([
      'path' => $path,
      'thumbnail' => $imageName,
    ]);

    $this->notification_message = 'Thumbnail Berhasil Di Update !';
    $this->dispatch('dataEditedThumbnailSuccess');
    $this->resetInput();
  }

  function delete()
  {
    sleep(1);

    $barang = BarangModel::where('id', $this->barang_id)->first();
    $barang->update([
      'flag' => 'archived'
    ]);

    $this->notification_message = 'Barang Berhasil Di Archived !';
    $this->dispatch('dataArchivedSuccess');
    $this->resetInput();
  }

  function restore($id)
  {
    sleep(1);

    $barang = BarangModel::where('id', $id)->first();
    $barang->update([
      'flag' => null
    ]);

    $this->notification_message = 'Barang Berhasil Dipulihkan !';
    $this->dispatch('dataRestoredSuccess');
    $this->resetInput();
  }

  function permanentDelete()
  {
    sleep(1);

    $barang = BarangModel::where('id', $this->barang_id)->delete();

    $this->notification_message = 'Barang Berhasil Dihapus Permanent !';
    $this->dispatch('dataDeletedSuccess');
    $this->resetInput();
  }
}
