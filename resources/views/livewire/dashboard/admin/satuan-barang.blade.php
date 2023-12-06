@section('satuan-barang-active') active @endsection

@section('css')
 <style>
  .column-scrolled
  {
    overflow-x: scroll !important;
    white-space: nowrap;
  }

  /* width */
  .column-scrolled::-webkit-scrollbar {
    width: 10px;
    height: 5px
  }

  /* Track */
  .column-scrolled::-webkit-scrollbar-track {
    /* box-shadow: inset 0 0 5px grey; */
    border-radius: 10px;
  }

  /* Handle */
  .column-scrolled::-webkit-scrollbar-thumb {
    background: #2e6bb0;
    border-radius: 10px;
  }

  /* Handle on hover */
  .column-scrolled::-webkit-scrollbar-thumb:hover {
    background: #2e6bb08e;
  }
 </style>

 <style>
  .secondContainer
  {
    max-height: 450px !important;
    overflow-y: scroll !important;
  }

  /* width */
  .secondContainer::-webkit-scrollbar {
    width: 10px;
    height: 15px
  }

  /* Handle */
  .secondContainer::-webkit-scrollbar-thumb {
    background: #E0E0E0;
    border: 1px solid #000;
  }

  /* Handle on hover */
  .secondContainer::-webkit-scrollbar-thumb:hover {
    background: #E0E0E08e;
  }
 </style>
@endsection

@section('breadcrumb')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 ms-3">
  <ol class="breadcrumb font-poppins">
    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item text-main" aria-current="page">Daftar Satuan Barang</li>
  </ol>
</nav>
@endsection

<div>
  {{-- @dump($firstId)
  @dump($selectAll)
  @dump($mySelected) --}}

    {{-- Toast Notification --}}
    {{-- Failed Notification --}}
    <button type="button" class="btn btn-primary d-none" id="failedToastBtn">Show live toast</button>

    <div wire:ignore class="toast-container position-fixed end-0 px-4">
      <div id="failedToast" class="toast dark-shadow-r0 p-1" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body bg-white"
        style="border-left: 5px solid #d75452;">
          <div class="d-flex align-items-start">

            <div class="font-poppins ms-2" style="color: #48484896;">
              <div class="d-flex flex-column align-items-start">

                <div class="d-flex align-items-center">
                  <div class="font-poppins me-2 text-danger"
                  style="font-size: 18px;">
                    Failed
                  </div>
                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#d75452" style="height: 25px; width: 25px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>

                <div style="font-size: 14px;" style="white-space: normal; word-wrap: break-word">
                  <textarea wire:model.live="notification_message" style="resize: none;" class="border-0 bg-white" cols="30" rows="2" disabled></textarea>
                </div>
              </div>
            </div>

            <button type="button" class="btn text-dark p-0 ms-auto" data-bs-dismiss="toast" aria-label="Close">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 25px; width: 25px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>

    </div>
    {{-- End --}}

    {{--  Success Notification --}}
    <button type="button" class="btn btn-primary d-none" id="successToastBtn">Show live toast</button>

    <div wire:ignore class="toast-container position-fixed end-0 px-4">
      <div id="successToast" class="toast dark-shadow-r0 p-1" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-body bg-white"
        style="border-left: 5px solid #64BF6A;">
          <div class="d-flex align-items-start">

            <div class="font-poppins ms-2" style="color: #48484896;">
              <div class="d-flex flex-column align-items-start">

                <div class="d-flex align-items-center">
                  <div class="font-poppins me-2 text-success"
                  style="font-size: 18px;">
                    Success
                  </div>

                  <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#64BF6A" style="height: 25px; width: 25px;">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>

                <div style="font-size: 14px;" style="white-space: normal; word-wrap: break-word">
                  <textarea wire:model.live="notification_message" style="resize: none;" class="border-0 bg-white" cols="30" rows="2" disabled></textarea>
                </div>
              </div>
            </div>

            <button type="button" class="btn text-dark p-0 ms-auto" data-bs-dismiss="toast" aria-label="Close">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 25px; width: 25px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>
          </div>
        </div>
      </div>
    </div>
    {{-- End --}}
  {{-- End --}}

  <div class="card position-relative" style="border-left: 1px solid #888; border-right: 1px solid #888; border-bottom: 1px solid #888;">
    <div wire:target="store, update, delete, restore, permanentDelete" wire:loading class="position-absolute h-100 w-100" style="z-index: 9999; background: #7f7f7f80;">
      <div class="d-flex align-items-center p-3 position-absolute" style="top: 40%; left: 40%;">
        <img src="{{ asset('img/Loading.gif') }}" style="width: 120px; height: auto;">
        <div class="text-blue font-poppins text-uppercase" style="font-size: 32px;"> Loading </div>
      </div>
    </div>

    <div style="border-top: 5px solid #BA0B2F;"></div>
    {{-- Card Header --}}
    <div class="border-bottom mt-3 pb-3 mt-lg-0 pb-lg-0">
      <div class="d-flex align-items-center">
        <div class="card-title ps-3 mt-3 font-poppins text-uppercase" style="border-left: 5px solid #0058A8; letter-spacing: 4px;">
          Daftar Satuan Barang
        </div>

        {{-- Search Bar --}}
        <div class="border border-dark mx-auto my-3 px-2 py-1 rounded-pill d-none d-lg-flex">
          <div class="d-flex align-items-center position-relative">
            <svg height="25px" width="25px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>

            <input type="text" wire:model.live.debounce.300ms="searchTerm" class="form-control form-control-sm rounded-pill border-0 pe-4" style="box-shadow: none !important; min-width: 400px;" placeholder="Cari Satuan Barang">

            @if($this->searchTerm)
              <svg style="position: absolute; right: 0; cursor: pointer;" height="25px" width="25px" class="text-danger" wire:click.prevent="resetSearch()" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            @endif
          </div>
        </div>
        {{-- End --}}

        <div class="ms-auto ms-lg-0 d-flex align-items-center">
          {{-- Mobile Search Icon --}}
          <div class="border border-dark rounded-pill p-1 me-2 d-flex d-lg-none">
            <button type="button" class="btn btn-sm btn-secondary btn-border rounded-pill" data-bs-toggle="collapse" data-bs-target="#collapseExample">
              <div class="d-flex align-items-center">
                <svg height="25px" width="25px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
              </div>
            </button>
          </div>
          {{-- End --}}

          <div class="border border-dark rounded-pill p-1 me-3">
            <button type="button" class="btn btn-sm btn-main btn-border rounded-pill" data-bs-toggle="modal" data-bs-target="#tambahData">
              <div class="d-flex align-items-center">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 25px; width: 25px;">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>

                <span class="d-none d-md-block">Tambah Data</span>
              </div>
            </button>

          </div>
        </div>

      </div>
    </div>
    {{-- End --}}

    {{-- Table Body --}}
    <div class="card-body">
      <div wire:ignore class="collapse d-lg-none" id="collapseExample">
        {{-- Search Bar --}}
        <div class="border border-dark mx-auto my-3 px-2 py-1 rounded-pill">
          <div class="d-flex align-items-center position-relative">
            <svg height="25px" width="25px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>

            <input type="text" wire:model.live.debounce.300ms="searchTerm" class="form-control form-control-sm rounded-pill border-0 pe-4 w-100" style="box-shadow: none !important;" placeholder="Cari berdasarkan Kode atau Nama Unit Kerja">

            @if($this->searchTerm)
              <svg style="position: absolute; right: 0; cursor: pointer;" height="25px" width="25px" class="text-danger" wire:click.prevent="resetSearch()" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            @endif
          </div>
        </div>
        {{-- End --}}
      </div>

      <div class="d-flex align-items-center text-start ps-3 font-poppins px-3 py-2 w-fit mb-3 rounded" style="border: 1px solid #8888888e;">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
          </svg>
          <span>Archived Data : <span class="text-primary ms-1"> {{$archive_count}} </span></span>
        </div>
        @if ($archive_count > 0 )
        <span> <button class="btn btn-sm btn-outline-blue rounded-pill ms-3" data-bs-toggle="modal" data-bs-target="#archievedData"> Lihat Data </button> </span>
        @endif
      </div>

      <div class="rounded p-3" style="border: 1px solid #8888888e;">
        {{-- Sorting & Filter --}}
        <div class="d-lg-flex justify-content-between align-items-center mb-3">
          {{-- <div class="d-flex align-items-center">
            <input class="form-check-input" type="checkbox" wire:model.live="selectAll">
            <input type="hidden" wire:model.live="firstId" value="{{ $satuan_barangs[0]->id }}">

            <button class="btn btn-danger text-white ms-3"
            wire:click.prevent="deleteAll" onclick="confirm('yakin ?')" @if (!$mySelected) disabled @endif
            >
              Delete
            </button>

            <button class="d-none" id="resetMySelected" wire:click="resetSelected"> resetMySelected </button>
          </div> --}}

          <div class="d-lg-flex align-items-center ms-auto me-3">
            {{-- Sort --}}
            <div class="d-flex align-items-center">
              <div class="me-1 mt-1 font-poppins" style="min-width: 5em;">Urutkan :</div>
              <select wire:model.live.debounce.300ms="sorting_data" class="form-control form-control-sm form-select border border-dark" style="width: 100%;">
                <option value="created_at"> Berdasarkan Pembuatan </option>
                <option value="satuan"> Berdasarkan Satuan Barang </option>
              </select>
            </div>
            {{-- End --}}
          </div>
        </div>
        {{-- End --}}

        @if ($satuan_barangs->count() > 0)
        <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl secondContainer">
          <table class="table table-hover text-center border table-striped font-poppins">
            <thead class="bg-secondary text-white font-weight-bold sticky-top">
              <tr>
                {{-- <th></th> --}}
                <th>No.</th>
                <th style="min-width: 200px;">Satuan Barang</th>
                <th> # </th>
              </tr>
            </thead>

            <tbody>
              @foreach ($satuan_barangs as $satuan)
              <tr>
                {{-- <td>
                  <input class="form-check-input" type="checkbox" wire:model.live="mySelected" value="{{ $satuan->id }}">
                </td> --}}
                <td class="pt-3">{{ $satuan_barangs->firstItem() + $loop->index }}.</td>
                <td class="pt-3" style="min-width: 150px;"> {{ $satuan->satuan }} </td>
                <td>
                  <div class="d-flex justify-content-center">
                    <div class="border border-secondary rounded-pill p-1 w-fit d-flex">
                      <button class="btn btn-secondary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#editData" wire:click="edit({{ $satuan->id }})">
                        <div class="d-flex align-items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                          </svg>
                          <span class="ms-1 d-none d-lg-flex">Edit Data</span>
                        </div>
                      </button>

                      <button class="btn btn-red-2 rounded-pill btn-sm ms-3" data-bs-toggle="modal" data-bs-target="#deleteData" wire:click="edit({{ $satuan->id }})">
                        <div class="d-flex align-items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                          </svg>
                          <span class="ms-1 d-none d-lg-flex">Hapus Data</span>
                        </div>
                      </button>
                    </div>
                  </div>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>

          <div class="paginateContainer d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-center mt-2 mb-2 mx-2">
            <span>
              Showing {{ $satuan_barangs->firstItem() }} to {{ $satuan_barangs->lastItem() }} of total {{$satuan_barangs->total()}} entries
            </span>
            <span>
              {!! $satuan_barangs->links() !!}
            </span>
          </div>

        </div>
        @else
        <div class="d-flex flex-column align-items-center">
          <img src="{{ asset('img/no-data.PNG') }}" class="img-fluid">
          <span class="font-poppins text-uppercase text-center" style="font-size: 20px;">Data kosong, silahkan tambah data baru</span>
        </div>
        @endif
      </div>
    </div>
    {{-- End --}}
  </div>

  <!-- Modal Add -->
  <div wire:loading.remove wire:ignore.self class="modal fade" id="tambahData" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-md">
      <div class="modal-content">
        <div class="modal-header bg-main text-white">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Tambah Satuan Barang</h1>
          <button type="button" class="border-0" data-bs-dismiss="modal" style="background: transparent;">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#fff" style="height: 30px; width: 30px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <div class="modal-body">
          <div class="form-group mb-3">
            <div>Satuan Barang</div>
            <input type="text" wire:model="satuan" class="form-control border border-dark">
            @error('satuan') <small class="text-danger">{{$message}}</small> @enderror
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-main" value="Tambah Data" wire:click.prevent="store()">
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal Add -->

  <!-- Modal Edit -->
  <div wire:loading.remove wire:ignore.self class="modal fade" id="editData" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
      <div class="modal-content">
        <div class="modal-header bg-purple-2 text-white">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Edit Data Unit Kerja</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="form-group mb-3">
            <div>Satuan Barang</div>
            <input type="text" wire:model="satuan" class="form-control border border-dark">
            @error('satuan') <small class="text-danger">{{$message}}</small> @enderror
          </div>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <input type="submit" class="btn btn-purple-2" value="Update Data" wire:click.prevent="update()">
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal Edit -->

  {{-- Modal Soft Delete --}}
  <div wire:loading.remove wire:ignore.self class="modal fade" id="deleteData" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">

      <center>
      <div class="rounded-circle p-3 btn-red-2 w-fit text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 35px; width: 35px;">
          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
        </svg>
      </div>
      </center>

      <div class="modal-content" style="margin-top: -2.2em; z-index: -99;">
        <div class="p-1 btn-red-2"></div>

        <div class="modal-body" style="margin-top: 1.5em;">
          <center>
            <div class="font-poppins text-danger" style="font-size: 22px;"> Hapus Data Unit Kerja ? </div>
            <div class="font-poppins text-grey"> Dengan Menghapus Data Unit Kerja, <br> Data Berikut Juga Akan Terhapus : </div>
          </center>
          <div class="d-flex justify-content-center mt-2">
            <ul class="font-poppins text-dark ms-2">
              <li> Data & Informasi Unit Kerja </li>
              <li class="border-bottom  pb-2 mb-2"> Data & Informasi User </li>
              <li> Data & History Pesanan </li>
            </ul>
          </div>
        </div>

        <div class="p-3">
          <div class="d-flex align-items-center">
            <button type="button" class="btn btn-outline-secondary w-100 me-2" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-red-2 w-100" wire:click="delete">Hapus Data</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End --}}

  {{-- Modal Archieved Data --}}
  <div wire:loading.remove wire:ignore.self class="modal fade" id="archievedData" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
      <div class="modal-content">
        <div class="modal-header text-dark">
          <h1 class="modal-title fs-5 d-flex align-items-center" id="exampleModalToggleLabel">

            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;" class="mt-1 me-2">
              <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
            </svg>

            <span>Archive Data</span>
          </h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl secondContainer">
            <table class="table table-hover text-center border table-striped font-poppins border">
              <thead class="bg-primary text-white font-weight-bold sticky-top">
                <tr>
                  <th>No.</th>
                  <th style="min-width: 200px;">Satuan Barang</th>
                  <th> # </th>
                </tr>
              </thead>

              <tbody>
                @foreach ($archieves_data as $arc_data)
                <tr>
                  <td class="pt-3">{{ $archieves_data->firstItem() + $loop->index }}.</td>
                  <td class="pt-3" style="min-width: 150px;"> {{ $arc_data->satuan }} </td>
                  <td>
                    <div class="d-flex justify-content-center">
                      <div class="border border-secondary rounded-pill p-1 w-fit d-flex">
                        <button class="btn btn-primary rounded-pill btn-sm" wire:click="restore({{ $arc_data->id }})">
                          <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                            </svg>

                            <span class="ms-1 d-none d-lg-flex">Restore Data</span>
                          </div>
                        </button>

                        {{-- Hapus Data --}}
                        <button class="btn btn-red-2 rounded-pill btn-sm ms-3" data-bs-toggle="modal" data-bs-target="#deletePermanent" wire:click="edit({{ $arc_data->id }})">
                          <div class="d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
                              <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                            <span class="ms-1 d-none d-lg-flex">Hapus Permanen</span>
                          </div>
                        </button>
                        {{-- End --}}
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>

            <div class="paginateContainer d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-center mt-2 mb-2 mx-2">
              <span>
                Showing {{ $archieves_data->firstItem() }} to {{ $archieves_data->lastItem() }} of total {{$archieves_data->total()}} entries
              </span>
              <span>
                {!! $archieves_data->links() !!}
              </span>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End --}}

  {{-- Modal Permanent Delete --}}
  <div wire:loading.remove wire:ignore.self class="modal fade" id="deletePermanent" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">

      <center>
      <div class="rounded-circle p-3 btn-red-2 w-fit text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 35px; width: 35px;">
          <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
        </svg>
      </div>
      </center>

      <div class="modal-content" style="margin-top: -2.2em; z-index: -99;">
        <div class="p-1 btn-red-2"></div>


        <div class="modal-body" style="margin-top: 1.5em;">
          <center>
            <div class="font-poppins text-danger" style="font-size: 22px;"> Hapus Data Unit Kerja ? </div>
            <div class="font-poppins text-grey"> Dengan Menghapus Data Unit Kerja, <br> Data Berikut Juga Akan Terhapus : </div>
          </center>
          <div class="d-flex justify-content-center mt-2">
            <ul class="font-poppins text-dark ms-2">
              <li> Data & Informasi Unit Kerja </li>
              <li class="border-bottom  pb-2 mb-2"> Data & Informasi User </li>
              <li> Data & History Pesanan </li>
            </ul>
          </div>
        </div>

        <div class="p-3">
          <div class="d-flex align-items-center">
            <button type="button" class="btn btn-outline-secondary w-100 me-2" data-bs-toggle="modal" data-bs-target="#archievedData">Tutup</button>
            <button type="button" class="btn btn-red-2 w-100" wire:click="permanentDelete">Hapus Data</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End --}}
</div>

@push('scripts')
<script>
  document.addEventListener('livewire:initialized', () =>
  {
    @this.on('dataAddedSuccess', (event) => {
      $('#tambahData').modal('hide');

      document.getElementById("successToastBtn").click();
    });

    @this.on('dataAddedFailed', (event) => {
      $('#tambahData').modal('hide');

      document.getElementById("failedToastBtn").click();
    });

    @this.on('dataEditedSuccess', (event) => {
      $('#editData').modal('hide');

      document.getElementById("successToastBtn").click();
    });

    @this.on('dataEditedFailed', (event) => {
      $('#editData').modal('hide');

      document.getElementById("failedToastBtn").click();
    });

    @this.on('dataArchivedSuccess', (event) => {
      $('#deleteData').modal('hide');

      document.getElementById("successToastBtn").click();
    });

    @this.on('dataArchivedFailed', (event) => {
      $('#deleteData').modal('hide');

      document.getElementById("failedToastBtn").click();
    });

    @this.on('dataRestoredSuccess', (event) => {
      $('#archievedData').modal('hide');

      document.getElementById("successToastBtn").click();
    });

    @this.on('dataRestoredFailed', (event) => {
      $('#archievedData').modal('hide');

      document.getElementById("failedToastBtn").click();
    });

    @this.on('dataDeletedSuccess', (event) => {
      $('#archievedData').modal('hide');
      $('#deletePermanent').modal('hide');

      document.getElementById("successToastBtn").click();
    });

    @this.on('dataDeletedFailed', (event) => {
      $('#archievedData').modal('hide');
      $('#deletePermanent').modal('hide');

      document.getElementById("failedToastBtn").click();
    });
  });

  $('.page-item').click(function(){
    $("#resetMySelected").click();
  })
</script>
@endpush
