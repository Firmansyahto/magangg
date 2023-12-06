@section('pesanan-active') active @endsection

@section('css')
<style>
  tbody tr td
  {
    vertical-align: middle;
  }

  .watermark
  {
    height: 120px;
    width: auto;
    top: 10%;
    right: 3%;
    z-index: 99;
    opacity: 15%;
  }

  @media (max-width: 767px)
  {
    .watermark
    {
      top: 18%;
      right: 3%;
      opacity: 15%;
    }
  }
</style>
@endsection

@section('breadcrumb')
<nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="mt-3 ms-3">
  <ol class="breadcrumb font-poppins">
    <li class="breadcrumb-item"><a href="#" class="text-decoration-none">Home</a></li>
    <li class="breadcrumb-item text-main" aria-current="page">Daftar Pesanan</li>
  </ol>
</nav>
@endsection

<div>
  <div class="card" style="border-left: 1px solid #888; border-right: 1px solid #888; border-bottom: 1px solid #888;">
    <div style="border-top: 5px solid #BA0B2F;"></div>
    {{-- Card Header --}}
    <div class="border-bottom mt-3 pb-3 mt-lg-0 pb-lg-0">
      <div class="d-flex align-items-center">
        <div class="card-title ps-3 mt-3 font-poppins text-uppercase" style="border-left: 5px solid #0058A8; letter-spacing: 4px;">
          Daftar Pesanan
        </div>

        {{-- Search Bar --}}
        <div class="border border-dark mx-auto my-3 px-2 py-1 rounded-pill d-none d-lg-flex">
          <div class="d-flex align-items-center position-relative">
            <svg height="25px" width="25px" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>

            <input type="text" wire:model.live.debounce.300ms="searchTerm" class="form-control form-control-sm rounded-pill border-0 pe-4" style="box-shadow: none !important; min-width: 400px;" placeholder="Cari berdasarkan Kode Pesanan atau Nama Pemesan">

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

      {{-- Sorting & Filter --}}
      <div class="d-lg-flex justify-content-between align-items-center mb-3">
        <div class="d-flex align-items-center mb-3 mb-md-0">
          <div class="me-1 mt-1 font-poppins" style="min-width: 9em;">Status Pesanan :</div>
          <select wire:model.live.debounce.300ms="status_pesanan" class="form-control form-control-sm form-select border border-dark" style="width: 100%;">
            <option value="proses"> Proses </option>
            <option value="disetujui"> Disetujui </option>
            <option value="ditolak"> Ditolak </option>
          </select>
        </div>

        <div class="d-lg-flex align-items-center">
          {{-- Sort --}}
          <div class="d-flex align-items-center">
            <div class="me-1 mt-1 font-poppins" style="min-width: 5em;">Urutkan :</div>
            <select wire:model.live.debounce.300ms="sorting_data" class="form-control form-control-sm form-select border border-dark" style="width: 100%;">
              <option value="created_at"> Berdasarkan Tanggal Pesan </option>
              <option value="pemesan"> Berdasarkan Nama Pemesan </option>
            </select>
          </div>
          {{-- End --}}
        </div>
      </div>
      {{-- End --}}

      @if ($pesanans->count() > 0)
      <div class="table-responsive table-responsive-sm table-responsive-md table-responsive-lg table-responsive-xl">
        <table class="table table-hover text-center table-bordered table-striped font-poppin position-relative">
          <thead class="bg-secondary text-white font-weight-bold">
            <tr>
              <td style="min-width: 50px">No.</td>
              <td>Konfirmasi</td>
              <td>Status</td>
              <td style="min-width: 130px">Kode Pesanan</td>
              <td style="min-width: 150px">Pemesan</td>
              <td style="min-width: 230px">Tanggal Pesan</td>
              <td style="min-width: 200px">Detail Pesanan</td>
            </tr>
          </thead>

          <tbody>
            @foreach ($pesanans as $pesanan)
            <tr>
              <td> {{ $pesanans->firstItem() + $loop->index }} </td>
              <td>
                @if ($pesanan->status_pesanan == 'proses')
                <div class="d-flex justify-content-center align-items-center">
                  <a class="btn btn-outline-main" data-bs-toggle="modal" data-bs-target="#konfirmasiTolak" href="#"
                  wire:click="getDetail({{ $pesanan->id }})">
                    Tolak
                  </a>

                  <div class="mx-1"> | </div>

                  <a class="btn btn-outline-blue" data-bs-toggle="modal" data-bs-target="#konfirmasiSetuju" href="#"
                  wire:click="getDetail({{ $pesanan->id }})">
                    Setuju
                  </a>
                </div>
                @else
                  <div class="font-poppins text-grey"> Sudah Dikonfirmasi </div>
                @endif
              </td>
              <td>
                <div class="px-2 py-1 rounded text-capitalize"
                style="@if($pesanan->status_pesanan == 'proses') background: #0058A8; color: white; @endif
                @if($pesanan->status_pesanan == 'disetujui') background: #1cbf1c; color: white; @endif
                @if($pesanan->status_pesanan == 'ditolak') background: #de1414; color: white; @endif">
                  {{ $pesanan->status_pesanan }}
                </div>
              </td>
              <td > <b> {{ $pesanan->kode_pesanan }} </b> </td>
              <td class="column-scrolled" style="min-width: 150px; max-width: 150px;"> {{ $pesanan->pemesan }} </td>
              <td class="column-scrolled" style="min-width: 150px; max-width: 230px;">
                {{ Carbon\Carbon::parse($pesanan->tanggal_pesanan)->settings(['formatFunction' => 'translatedFormat'])->locale('id')->format('l, d F Y')}}
              </td>

              @php
                $detail = App\Models\PesananDetail::where('pesanan_id', $pesanan->id)->get();
              @endphp

              <td>
                <button class="btn btn-blue text-white" data-bs-toggle="modal" data-bs-target="#lihatDetail" wire:click="getDetail({{ $pesanan->id }})">
                  Lihat Detail ({{ $detail->count()  }})
                </button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <div class="paginateContainer d-flex justify-content-center mt-2 mb-2">
          <div>
            {!! $pesanans->links() !!}
          </div>
        </div>
      </div>
      @else
      <div class="d-flex flex-column align-items-center">
        <img src="{{ asset('img/no-data.PNG') }}" class="img-fluid">
        <span class="font-poppins text-uppercase text-center" style="font-size: 20px;">Data kosong, silahkan tambah data baru</span>
      </div>
      @endif
    </div>
    {{-- End --}}
  </div>

  <!-- Modal Detail -->
  <div wire:ignore.self class="modal fade" id="lihatDetail" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
    <div class="modal-dialog modal-dialog-scrollable modal-xl">
      <div class="modal-content relative">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalToggleLabel">Detail Transaksi</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body p-0">
          @if ($order)
          <div class="p-3">
            <div class="mt-2 d-flex align-items-center justify-content-between font-poppins text-grey">
              <div class="">Kode Pesanan :</div>
              <div class="text-main"> {{ $order->kode_pesanan }} </div>
            </div>

            <div class="mt-2 d-flex align-items-center justify-content-between font-poppins text-grey">
              <div class="">Tanggal Pesan :</div>
              <div class="text-main"> {{ Carbon\Carbon::parse($order->tanggal_pesanan)->settings(['formatFunction' => 'translatedFormat'])->locale('id')->format('l, d F Y')}} </div>
            </div>

            <div class="d-flex justify-content-end mt-3 font-poppins">
              <div class="px-2 py-2 rounded text-capitalize w-fit"
              style="@if($order->status_pesanan == 'proses') background: #0058A8; color: white; @endif
              @if($order->status_pesanan == 'disetujui') background: #1cbf1c; color: white; @endif
              @if($order->status_pesanan == 'ditolak') background: #de1414; color: white; @endif">
                {{ $order->status_pesanan }}
              </div>
            </div>
          </div>

          <div style="border-top: 8px solid #E0E0E0;"></div>

          <div class="p-3 position-relative">
            <div class="font-poppins mb-3"> Info Pemesan </div>
            <div class="d-flex align-items-center font-poppins text-grey">
              <div style="min-width: 8em;"> Nama </div>
              <div class="me-2"> : </div>
              <div> {{ $order->user->name }} </div>
            </div>
            <div class="d-flex align-items-center font-poppins text-grey">
              <div style="min-width: 8em;"> Jabatan </div>
              <div class="me-2"> : </div>
              <div> {{ $order->user->jabatan  }} </div>
            </div>
            <div class="d-flex align-items-center font-poppins text-grey">
              <div style="min-width: 8em;"> Unit Kerja </div>
              <div class="me-2"> : </div>
              <div> {{ $order->user->unit_kerja->nama_unit  }} </div>
            </div>

            <img src="{{ asset('img/Ombudsman.png') }}" class="position-absolute watermark">
          </div>

          <div style="border-top: 8px solid #E0E0E0;"></div>

          <div class="p-3">
            <div class="font-poppins mb-2"> Daftar Pesanan </div>

            @foreach ($details as $detail)
            <div class="border rounded p-2 mb-3">
              <div class="d-flex">
                <div style="min-width: 60px; max-width: 60px;">
                  <div style="height: 60px; width: 60px;">
                    @if ($detail->barang->thumbnail)
                    <img src="{{ asset('storage') }}/{{ $detail->barang->path }}/{{ $detail->barang->thumbnail }}" class="w-100 h-100 object-fit-cover">
                    @else
                    <img src="{{ asset('img/non.png') }}" class="w-100 h-100 object-fit-cover">
                    @endif
                  </div>
                </div>
                <div class="d-flex flex-column ms-2 font-poppins">
                  <div style="font-size: 14px;">
                    {{ $detail->barang->nama_barang }}
                  </div>
                  <div class="text-grey" style="margin-top: -5px; font-size: 13px;">
                    {{ $detail->quantity }} x
                    <span class="text-decoration-line-through">
                      RP.{{ number_format($detail->barang->harga , 0, ',', '.') }}
                    </span>
                  </div>
                </div>
              </div>

              <div class="border-top my-2"></div>

              <div class="d-flex align-items-center">
                <div class="d-flex flex-column font-poppins" style="font-size: 13px;">
                  <div>Total Harga</div>
                  <div class="text-grey text-decoration-line-through"> RP.{{ number_format($detail->total_harga_barang , 0, ',', '.') }} </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          @endif
        </div>
      </div>
    </div>
  </div>
  <!-- End Modal Detail -->

  {{-- Modal Setuju barang --}}
  <div wire:ignore.self class="modal fade" id="konfirmasiSetuju" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">

      <center>
      <div class="rounded-circle p-3 bg-blue w-fit text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 35px; width: 35px;">
          <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12.75l6 6 9-13.5" />
        </svg>
      </div>
      </center>

      <div class="modal-content" style="margin-top: -2.2em; z-index: -99;">
        <div class="p-1 bg-blue"></div>


        <div class="modal-body" style="margin-top: 1.5em;">
          <center>
            <div class="font-poppins" style="font-size: 22px;"> Pengajuan Pesanan Barang Disetujui ? </div>
            <div class="text-capitalized font-poppins text-grey"> Anda Akan Menyetujui Pengajuan Pemesanan Barang </div>
            <div class="text-capitalized font-poppins text-grey mt-3">
              Dengan Menyetujui Pengajuan Ini Berarti Anda Menyetujui Pengajuan Yang Diajukan Oleh Pemesan Telah Disetujui Dan Sah, Serta Pemesan Dapat Mengambil Barang Yang Diajukan !
            </div>
          </center>
          <div class="d-flex justify-content-center mt-2">
          </div>
        </div>

        <div class="p-3">
          <div class="d-flex align-items-center font-poppins">
            <button type="button" class="btn btn-outline-secondary w-100 me-2" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-blue w-100" wire:click="konfirmasiSetuju">Konfirmasi</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End --}}

  {{-- Modal Tolak Barang --}}
  <div wire:ignore.self class="modal fade" id="konfirmasiTolak" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog modal-dialog-scrollable">
      <center>
      <div class="rounded-circle p-3 bg-danger w-fit text-white">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 35px; width: 35px;">
          <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
        </svg>
      </div>
      </center>

      <div class="modal-content" style="margin-top: -2.2em; z-index: -99;">
        <div class="p-1 bg-danger"></div>


        <div class="modal-body" style="margin-top: 1.5em;">
          <center>
            <div class="font-poppins" style="font-size: 22px;"> Pengajuan Pesanan Barang Ditolak ? </div>
            <div class="text-capitalized font-poppins text-grey"> Anda Akan Menolak Pengajuan Pemesanan Barang </div>
            <div class="text-capitalized font-poppins text-grey mt-3">
              Dengan menyatakan penolakan berikut, barang yang diajukan oleh pemesan tidak dapat diambil oleh pemesan.
            </div>
          </center>
          <div class="d-flex justify-content-center mt-2">
          </div>
        </div>

        <div class="p-3">
          <div class="d-flex align-items-center font-poppins">
            <button type="button" class="btn btn-outline-secondary w-100 me-2" data-bs-dismiss="modal">Tutup</button>
            <button type="button" class="btn btn-danger w-100" wire:click="konfirmasiTolak">Berikan Keterangan</button>
          </div>
        </div>
      </div>
    </div>
  </div>
  {{-- End --}}


</div>
