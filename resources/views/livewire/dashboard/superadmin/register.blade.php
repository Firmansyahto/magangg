@section('user-active') active @endsection

@section('css')
<style>
  tbody tr td
  {
    vertical-align: middle;
  }

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

  .unit-kerja
  {
    top: 4%;
    left: 2%;
    background: #ffffff8e;
    font-size: 13px;
  }

  .paginateContainer .page-item.active
  {
    background: #0E3665 !important;
  }

  .select2-dropdown.select2-dropdown--below
  {
    width: 250px !important;
  }

  .select2-container--default .select2-selection--single
  {
    padding-top: 6px;
    height: 40px;
    /* width: 250px; */
    font-size: 1.2em;
    position: relative;
    border-radius: 6px !important;
  }

  .select2-container--default .select2-selection--single .select2-selection__arrow
  {
    background-image: -khtml-gradient(linear, left top, left bottom, from(#f1f1f1), to(#bdbdbd));
    background-image: -moz-linear-gradient(top, #f1f1f1, #bdbdbd);
    background-image: -ms-linear-gradient(top, #f1f1f1, #bdbdbd);
    background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #f1f1f1), color-stop(100%, #bdbdbd));
    background-image: -webkit-linear-gradient(top, #f1f1f1, #bdbdbd);
    background-image: -o-linear-gradient(top, #f1f1f1, #bdbdbd);
    background-image: linear-gradient(#f1f1f1, #bdbdbd);
    color: #000000;
    font-size: 1.3em;
    padding: 4px 12px;
    height: 38px;
    width: 40px;
    position: absolute;
    top: 0px;
    right: 0px;
    z-index: 10;
    border-top-right-radius: 5px !important;
    border-bottom-right-radius: 5px !important;
  }

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

  .js-example-basic-multiple1 .select2-results__option { color: red !important; }

  @media (max-width: 767px)
  {
    .unit-kerja
    {
      top: 1.5%;
      left: 5%;
    }

    .user-desc
    {
      font-size: 14px;
    }

    .mobile-data-scroll
    {
      height: 45px;
      overflow-y: scroll;
    }
  }

  @media (min-width: 768px) and (max-width: 991px)
  {
    .item-divider
    {
      /* margin-left: -1em; */
    }
  }

  @media (min-width: 992px)
  {
    .item-divider
    {
      margin-left: -1.3em;
    }
  }
</style>
@endsection

@section('breadcrumb')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 ms-3">
  <ol class="breadcrumb font-poppins">
    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item text-main" aria-current="page">Daftar User</li>
  </ol>
</nav>
@endsection

<div>
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
          Daftar User | {{ $this->filter_unit }}
        </div>

        {{-- Search Bar --}}
        <div class="border border-dark mx-auto my-3 px-2 py-1 rounded-pill d-none d-lg-flex">
          <div class="d-flex align-items-center position-relative">
            <svg height="25px" width="25px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>

            <input type="text" wire:model.live.debounce.300ms="searchTerm" class="form-control form-control-sm rounded-pill border-0 pe-4" style="box-shadow: none !important; min-width: 400px;" placeholder="Cari berdasarkan Nama atau Jabatan">

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

    {{-- Card Body --}}
    <div class="card-body border">
      <div wire:ignore class="collapse d-lg-none border-bottom pb-1 mb-3" id="collapseExample">
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
        <div class="d-lg-flex justify-content-between align-items-center mb-3 position-relative">

          <div class="bg-white position-absolute px-1" style="left: 6.45em; margin-top: .1em; z-index: 9;">
            <div style="width: 200px !important; overflow-x: hidden; white-space: nowrap;">
              <div class="font-poppins text-grey text-capitalize">
                {{ $selected_filter }}
              </div>
            </div>
          </div>

          {{-- Filter --}}
          <div class="d-flex align-items-center">
            <div wire:ignore class="d-lg-flex align-items-center mb-3 mb-lg-0">
              <div class="me-2 font-poppins">Unit Kerja :</div>
              <div class="d-flex align-items-center">
                <select id="filter-select2-dropdown" class="form-control form-select" style="width: 250px">
                  <option value=""> - Pilih Unit - </option>
                  <option value="99999999999"> Semua </option>
                  @foreach ($office_units as $unit)
                    <option value="{{ $unit->id }}">
                      [{{ $unit->kode_unit }}] {{ $unit->nama_unit }}
                    </option>
                  @endforeach
                </select>
              </div>
            </div>

            {{-- <button class="btn btn-primary mt-2 mt-md-0 ms-1" wire:click="refreshButton" style="height: fit-content;">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
              </svg>
            </button> --}}
          </div>
          {{-- End --}}

          <div class="d-lg-flex align-items-center">
            {{-- Filter --}}
            <div class="d-flex align-items-center me-lg-3 mb-3 mb-lg-0">
              <div class="me-1 mt-1 font-poppins" style="min-width: 3.5em;">Role :</div>
              <select wire:model.live.debounce.300ms="role_select" class="form-control form-control-sm form-select form-select border border-dark" style="width: 100%;">
                <option value=""> --- </option>
                <option value="superadmin"> Superadmin </option>
                <option value="admin gudang"> Admin Gudang </option>
                <option value="staf"> Staf </option>
              </select>
            </div>
            {{-- End --}}

            {{-- Sort --}}
            <div class="d-flex align-items-center">
              <div class="me-1 mt-1 font-poppins" style="min-width: 5em;">Urutkan :</div>
              <select wire:model.live.debounce.300ms="sorting_data" class="form-control form-control-sm form-select border border-dark" style="width: 100%;">
                <option value="created_at"> Berdasarkan Pembuatan </option>
                <option value="name"> Berdasarkan Nama </option>
              </select>
            </div>
            {{-- End --}}
          </div>
        </div>

        <input class="d-none" type="text" wire:model="funit_kerja_id" wire:change="refreshButton({{ $funit_kerja_id }}, $event.target.value)">
        {{-- End --}}

        @if ($users->count() > 0)
        <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl secondContainer">
          <table class="table table-hover text-center table-striped font-poppin position-relative border">
            <thead class="bg-secondary text-white font-weight-bold sticky-top">
              <tr>
                <td>No.</td>
                <td>Foto</td>
                <td style="min-width: 160px;">Role</td>
                <td>Unit Kerja</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Jabatan</td>
                <td style="min-width: 300px;"> # </td>
              </tr>
            </thead>

            <tbody>
              @foreach ($users as $user)
              <tr>
                <td class=""> {{ $users->firstItem() + $loop->index }}. </td>
                <td>
                  <div class="d-flex justify-content-center">
                    <div style="height: 50px; width: 50px;">
                      @if ($user->foto)
                      <img src="{{ asset('storage') }}/{{ $user->path }}/{{ $user->foto }}" class="w-100 h-100 object-fit-cover">
                      @else
                      <img src="{{ asset('img/profile.jpg') }}" class="w-100 h-100 object-fit-cover">
                      @endif
                    </div>
                  </div>
                </td>
                <td>
                  <div class="d-flex justify-content-center">
                    <div class="text-white w-fit px-3 py-1 rounded text-capitalize
                    {{ $user->role == 'superadmin' ? 'bg-danger px-4' : '' }}
                    {{ $user->role == 'staf' ? 'bg-success px-5' : '' }}
                    {{ $user->role == 'admin gudang' ? 'bg-primary' : '' }}">
                      {{ $user->role }}
                    </div>
                  </div>
                </td>
                <td class="text-capitalize" style="min-width: 200px;">
                  [{{ $user->unit_kerja->kode_unit }}] {{ $user->unit_kerja->nama_unit }}
                </td>
                <td class="text-capitalize" style="min-width: 200px;">
                  {{ $user->name }}
                </td>
                <td style="min-width: 200px;">
                  {{ $user->email }}
                </td>
                <td class="text-capitaliz" style="min-width: 200px;">
                  {{ $user->jabatan }}
                </td>
                <td>
                  <div class="d-flex justify-content-center">
                    <div class="border border-secondary rounded-pill p-1 w-fit d-flex">
                      <button class="btn btn-secondary rounded-pill btn-sm" data-bs-toggle="modal" data-bs-target="#editData" wire:click="edit({{ $user->id }})">
                        <div class="d-flex align-items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L6.832 19.82a4.5 4.5 0 01-1.897 1.13l-2.685.8.8-2.685a4.5 4.5 0 011.13-1.897L16.863 4.487zm0 0L19.5 7.125" />
                          </svg>
                          <span class="ms-1 d-none d-lg-flex">Edit Data</span>
                        </div>
                      </button>

                      {{-- Hapus Data --}}
                      <button class="btn btn-red-2 rounded-pill btn-sm ms-3" data-bs-toggle="modal" data-bs-target="#deleteData" wire:click="edit({{ $user->id }})">
                        <div class="d-flex align-items-center">
                          <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 20px; width: 20px;">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                          </svg>
                          <span class="ms-1 d-none d-lg-flex">Hapus Data</span>
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
        </div>

        <div class="paginateContainer d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-center mt-4 mb-2 mx-2">
          <span style="margin-top: -1.5em" class="mb-3 mb-md-0">
            Showing {{ $users->firstItem() }} to {{ $users->lastItem() }} of total {{$users->total()}} entries
          </span>
          <span class="d-block d-md-none">
            {!! $users->onEachSide(1)->links() !!}
          </span>
          <span class="d-none d-md-block">
            {!! $users->onEachSide(4)->links() !!}
          </span>
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
  <div wire:loading.class="d-none" wire:target="store" wire:ignore.self class="modal fade" id="tambahData" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header bg-main text-white">
          <h1 class="modal-title fs-5">Tambah Data User</h1>
          <button type="button" class="btn border-0 btn-sm" data-bs-dismiss="modal">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" style="height: 30px; width: 30px;">
              <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <div class="modal-body">
          <div wire:ignore class="mb-3 form-group">
            <div>Unit Kerja</div>
            <select id="select2-dropdown" style="width: 100%">
              <option value=""> --- </option>
              @foreach ($office_units as $unit)
                <option value="{{ $unit->id }}">[{{ $unit->kode_unit }}] {{ $unit->nama_unit }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group mb-3">
            <div>Jabatan</div>
            <input type="text" wire:model="jabatan" class="form-control border border-dark">
            @error('jabatan') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group mb-3">
            <div>Nama</div>
            <input type="text" wire:model="name" class="form-control border border-dark">
            @error('name') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group mb-3">
            <div>Email</div>
            <input type="email" wire:model="email" class="form-control border border-dark">
            @error('email') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group mb-3">
            <div>Password</div>
            <input type="password" wire:model="password" class="form-control border border-dark">
            @error('password') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group mb-3">
            <div>Hak Akses</div>
            <select wire:model="role" class="form-control form-select border border-dark">
              <option value=""> --- </option>
              <option value="superadmin">Superadmin</option>
              <option value="admin gudang">Admin Gudang</option>
              <option value="staf">Staf</option>
            </select>
            @error('role') <small class="text-danger">{{$message}}</small> @enderror
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
  <div wire:loading.class="d-none" wire:target="update" wire:ignore.self class="modal fade" id="editData" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-md">
      <div class="modal-content">
        <div class="modal-header bg-purple-2 text-white">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Edit Data Unit Kerja</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          @if ($unit_kerja_id)
          @php
            $selected_uk = App\Models\UnitKerja::where('id', $unit_kerja_id)->first();
          @endphp
          @endif
          <div class="position-relative">
            <div class="bg-white position-absolute " style="left: .65em; margin-top: 2.1em; z-index: 99;">
              <div class="font-poppins text-grey">{{$selected_unit}}</div>
            </div>
            <div wire:ignore class="mb-3 form-group">
              <div>Unit Kerja</div>
              <select id="select2-dropdown-edit" style="width: 100%;">
                <option value="">---</option>
                @foreach ($office_units as $unit)
                  <option value="{{ $unit->id }}">[{{ $unit->kode_unit }}] {{ $unit->nama_unit }}</option>
                @endforeach
              </select>
              @error('unit_kerja_id') <small class="text-danger">{{$message}}</small> @enderror
            </div>
          </div>

          <div class="form-group mb-3">
            <div>Nama</div>
            <input type="text" wire:model="name" class="form-control border border-dark">
            @error('name') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group mb-3">
            <div>Email</div>
            <input type="email" wire:model="email" class="form-control border border-dark">
            @error('email') <small class="text-danger">{{$message}}</small> @enderror
          </div>
          <div class="form-group mb-3">
            <div>Jabatan</div>
            <input type="text" wire:model="jabatan" class="form-control border border-dark">
            @error('jabatan') <small class="text-danger">{{$message}}</small> @enderror
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

  {{-- Modal Delete Unit Kerja --}}
  <div wire:loading.class="d-none" wire:ignore.self class="modal fade" id="deleteData" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
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
  <div wire:loading.class="d-none" wire:ignore.self class="modal fade" id="archievedData" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
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
            <table class="table table-hover text-center table-striped font-poppins border">
              <thead class="bg-secondary text-white font-weight-bold sticky-top">
                <tr>
                  <th>No.</th>
                  <td>Foto</td>
                  <td style="min-width: 160px;">Role</td>
                  <td>Unit Kerja</td>
                  <td>Nama</td>
                  <td>Email</td>
                  <td>Jabatan</td>
                  <th> # </th>
                </tr>
              </thead>

              <tbody>
                @foreach ($archieves_data as $arc_data)
                <tr>
                  <td>{{ $archieves_data->firstItem() + $loop->index }}.</td>
                  <td>
                    <div class="d-flex justify-content-center">
                      <div style="height: 50px; width: 50px;">
                        @if ($arc_data->foto)
                        <img src="{{ asset('storage') }}/{{ $arc_data->path }}/{{ $arc_data->foto }}" class="w-100 h-100 object-fit-cover">
                        @else
                        <img src="{{ asset('img/profile.jpg') }}" class="w-100 h-100 object-fit-cover">
                        @endif
                      </div>
                    </div>
                  </td>
                  <td style="min-width: 200px;">
                    <div class="d-flex justify-content-center">
                      <div class="text-white w-fit px-3 py-1 rounded text-capitalize
                      {{ $arc_data->role == 'superadmin' ? 'bg-danger px-4' : '' }}
                      {{ $arc_data->role == 'staf' ? 'bg-success px-5' : '' }}
                      {{ $arc_data->role == 'admin gudang' ? 'bg-primary' : '' }}">
                        {{ $arc_data->role }}
                      </div>
                    </div>
                  </td>
                  <td class="text-capitalize" style="min-width: 200px;">
                    [{{ $arc_data->unit_kerja->kode_unit }}] {{ $arc_data->unit_kerja->nama_unit }}
                  </td>
                  <td class="text-capitalize" style="min-width: 200px;">
                    {{ $arc_data->name }}
                  </td>
                  <td style="min-width: 200px;">
                    {{ $arc_data->email }}
                  </td>
                  <td class="text-capitalize" style="min-width: 200px;">
                    {{ $arc_data->jabatan }}
                  </td>
                  <td style="min-width: 350px">
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
          </div>

          <div class="paginateContainer d-flex flex-column flex-md-row justify-content-center justify-content-md-between align-items-center mt-4 mb-2 mx-2">
            <span style="margin-top: -.5em" class="mb-3 mb-md-0">
              Showing {{ $archieves_data->firstItem() }} to {{ $archieves_data->lastItem() }} of total {{$archieves_data->total()}} entries
            </span>
            <span>
              {!! $archieves_data->onEachSide(1)->links() !!}
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End --}}

  {{-- Modal Permanent Delete --}}
  <div wire:loading.class="d-none" wire:ignore.self class="modal fade" id="deletePermanent" data-bs-backdrop="static" data-bs-keyboard="false">
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

@section('js')
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

  $(document).ready(function() {
    $('#select2-dropdown').select2({
      dropdownParent: $("#tambahData")
    });

    $('#select2-dropdown').on('change', function(e) {
      var data = $('#select2-dropdown').select2('val');
      @this.set('unit_kerja_id', data);
    });
  });

  $(document).ready(function() {
    $('#select2-dropdown-edit').select2({
      dropdownParent: $("#editData")
    });

    $('#select2-dropdown-edit').on('change', function(e) {
      var data = $('#select2-dropdown-edit').select2('val');
      @this.set('unit_kerja_id', data);
    });
  });

  $(document).ready(function() {
    $('#filter-select2-dropdown').select2();

    $('#filter-select2-dropdown').on('change', function(e) {
      var data = $('#filter-select2-dropdown').select2('val');
      @this.set('funit_kerja_id', data);
    });
  });
</script>
@endsection
