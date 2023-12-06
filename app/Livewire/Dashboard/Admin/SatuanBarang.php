<?php

namespace App\Livewire\Dashboard\Admin;

use Livewire\Component;
use Livewire\WithPagination;

use Illuminate\Support\Facades\Auth;

use App\Models\SatuanBarang as SatuanBarangModel;

class SatuanBarang extends Component
{
	use WithPagination;
	protected $paginationTheme = 'bootstrap';

  public $searchTerm, $satuan_id, $satuan;
  public $sorting_data, $sorted;
  public $archive_count, $notification_message;

  public $mySelected = [], $selectAll = false, $firstId = NULL;

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
    if($this->sorted == 'satuan')
    {
      $asce_deesce = 'ASC';
    }

    $satuan_barangs = SatuanBarangModel::where([['satuan', 'ilike', $searchTerm], ['flag', null]])
    ->orderBy($this->sorted, $asce_deesce)
    ->paginate(10, ['*'], 'satuan')->onEachSide(0);

    // $this->firstId = $satuan_barangs[0]->id;

    // $this->updatedMySelected();
    // $this->updateSelectAll();

    $this->archive_count = SatuanBarangModel::where('flag', 'archived')->count();
    $archieves_data = SatuanBarangModel::where('flag', 'archived')->orderBy('updated_at', 'DESC')->paginate(10, ['*'], 'archieves')->onEachSide(0);

    return view('livewire.dashboard.admin.satuan-barang', compact('satuan_barangs', 'archieves_data'))->layout('layouts.dashboard');
  }

  public function resetSelected()
  {
    $this->mySelected = [];
    $this->selectAll = false;
  }

  public function deleteAll()
  {
    $getCoy = SatuanBarangModel::whereIn('id', $this->mySelected)->get();
    dd($getCoy);
  }

  public function updateSelectAll()
  {
    if($this->selectAll == 'true')
    {
      $this->mySelected = SatuanBarangModel::where('id', '>=', $this->firstId)->limit(3)->pluck('id');
    }
    else
    {
      $this->mySelected = [];
    }
  }

  public function updatedMySelected()
  {
    if(count($this->mySelected) == 10)
    {
      $this->selectAll = true;
    }
    else
    {
      $this->selectAll = false;
    }
  }

  public function resetSearch()
	{
		$this->searchTerm = '';
	}

  function store()
  {
    sleep(1);

    $this->validate([
      'satuan' => 'required',
    ]);

    if(SatuanBarangModel::where('satuan', $this->satuan)->exists())
    {
      $this->notification_message = 'Satuan Barang Gagal Dibuat, Data Sudah Ada !';
      $this->dispatch('dataAddedFailed');
      $this->resetInput();
    }
    else
    {
      SatuanBarangModel::create([
        'satuan' => $this->satuan,
        'user_id' => Auth::user()->id
      ]);

      $this->notification_message = 'Satuan Barang Berhasil Dibuat !';
      $this->dispatch('dataAddedSuccess');
      $this->resetInput();
    }
  }

  function edit($id)
  {
    $this->satuan_id = $id;
    $satuan = SatuanBarangModel::find($id);

    $this->satuan = $satuan->satuan;
  }

  function update()
  {
    sleep(1);

    $satuan = SatuanBarangModel::where('id', $this->satuan_id)->first();

    $this->validate([
      'satuan' => 'required',
    ]);

    if(SatuanBarangModel::where('satuan', $this->satuan)->exists())
    {
      $this->notification_message = 'Satuan Barang Gagal Di Update, Data Sudah Ada !';
      $this->dispatch('dataEditedFailed');
      $this->resetInput();
    }
    else
    {
      $satuan->update([
        'satuan' => $this->satuan,
      ]);

      $this->notification_message = 'Satuan Barang Berhasil Di Update !';
      $this->dispatch('dataEditedSuccess');
      $this->resetInput();
    }

  }

  function delete()
  {
    sleep(1);

    $satuan = SatuanBarangModel::where('id', $this->satuan_id)->first();
    $satuan->update([
      'flag' => 'archived'
    ]);

    $this->notification_message = 'Satuan Barang Berhasil Di Archived !';
    $this->dispatch('dataArchivedSuccess');
    $this->resetInput();
  }

  function restore($id)
  {
    sleep(1);

    $satuan = SatuanBarangModel::where('id', $id)->first();
    $satuan->update([
      'flag' => null
    ]);

    $this->notification_message = 'Satuan Barang Berhasil Dipulihkan !';
    $this->dispatch('dataRestoredSuccess');
    $this->resetInput();
  }

  function permanentDelete()
  {
    sleep(1);

    SatuanBarangModel::where('id', $this->satuan_id)->delete();

    $this->notification_message = 'Satuan Barang Berhasil Dihapus Permanent !';
    $this->dispatch('dataDeletedSuccess');
    $this->resetInput();
  }

  function resetInput()
  {
    $this->reset(['searchTerm', 'satuan_id', 'satuan', 'sorting_data']);
  }
}
