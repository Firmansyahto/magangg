<div wire:ignore class="bg-[#F1F1F1]">

  <div class="py-10 px-3 md:px-10 min-h-screen">
    <p class="text-[24px] font-semibold text-[#0E3665] ml-2 mb-4 mt-14">Status Pesanan</p>

    <div class="bg-[#fff] rounded-[20px] py-5" style="box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.5);">
      <div class="flex h-10 border-b-2 border-grey-200 cursor-pointer">
        <div wire:ignore class="flex-1 flex justify-center items-center border-b-2 border-[#0058A8] py-4 transition duration-500 ease-in-out hover:border-grey-200 hover:border-b-2 hover:text-gray-400" id="proses">
          <p class="text-[18px] font-medium">Proses ({{ $process ? $process->count() : '0' }})</p>
        </div>
        <div wire:ignore class="flex-1 flex justify-center items-center py-4 cursor-pointer transition duration-500 ease-in-out hover:border-grey-200 hover:border-b-2 hover:text-gray-400" id="dikonfirmasi">
          <p class="text-[18px] font-medium ">Dikonfirmasi ({{ $confirmed ? $confirmed->count() : '0' }})</p>
        </div>
      </div>
      

      <div  id="status-proses-container" class="flex flex-col gap-4 bg-[#fff] p-4 rounded-b-[20px] transform transition-transform duration-500 ease-in-out scale-100">
        @if ($process->count() == 0)
        <div class="flex flex-col items-center text-center">
          <img src="{{ asset('img/empty.PNG') }}" class="w-[auto] h-[450px]">
          <div class="font-bold text-[24px] md:text-[28px]"> Tidak Ada Pesanan Dalam Proses </div>
          <div class="font-semibold text-[#48484896] text-[16px] md:text-[20px]"> Saat ini anda tidak memiliki pesanan yang sedang diproses, <br> silahkan ajukan pesanan </div>

          <a href="{{{ route('home') }}}" class="mx-auto text-white bg-[#5B7696] flex gap-2 justify-center items-center py-2 px-4 rounded-full mt-[2em]">
            Beranda
          </a>
        </div>
        @endif
        {{-- Komponen untuk menampilkan status pesanan barang yang ditolak --}}
        @foreach ($process as $proses)
        <div class="relative  px-4 pb-4 pt-3 border-[1px] border-[#B5B5B5] rounded-[10px]">
          {{-- Status Pesanan --}}
          <div class="absolute top-0 right-0 py-1 px-3 rounded-bl-[10px] rounded-tr-[10px] capitalize
            @if($proses->status_pesanan == 'proses') bg-[#0058A8] text-white @endif
            @if($proses->status_pesanan == 'disetujui') bg-[#1cbf1c] text-white @endif
            @if($proses->status_pesanan == 'ditolak') bg-[#de1414] text-white @endif">
              {{ $proses->status_pesanan }}
          </div>

          <div class="md:flex items-center border-b-2 pb-3">

            <div class="flex items-center md:pr-2 md:border-r md:border-r-[#4848488e]">
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 30px; width: 30px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
              </svg>
              <div class="flex-col ml-2">
                <div class="text-[14px] md:text-[15px font-bold"> Melakukan Pemesanan </div>
                <div class="text-[12px] md:text-[13px] text-[#48484896] font-semibold mt-[-3px]">
                  {{ Carbon\Carbon::parse($proses->tanggal_pesanan)->settings(['formatFunction' => 'translatedFormat'])->locale('id')->format('l, d F Y')}}
                </div>
              </div>
            </div>

            <div class="px-3 py-[1px] mt-3 md:mt-0 md:ms-3 w-fit border border-[#000000] rounded-[5px]">
              {{ $proses->kode_pesanan }}
            </div>
          </div>

          <div class="flex gap-4 mt-3">
            <div class="w-14 h-14  md:w-20 md:h-20">
              @php
                $pesanan_detail = App\Models\PesananDetail::where('pesanan_id', $proses->id)->orderBy('created_at', 'DESC')->limit(1)->get();
                $get_detail = App\Models\PesananDetail::where('pesanan_id', $proses->id)->orderBy('created_at', 'DESC')->get();
              @endphp

              @foreach ($pesanan_detail as $detail)
                @if ($detail->barang->thumbnail)
                <img src="{{ asset('storage') }}/{{ $detail->barang->path }}/{{ $detail->barang->thumbnail }}" class="w-full h-full object-cover">
                @else
                <img src="{{ asset('img/non.png') }}" class="w-full h-full object-cover">
                @endif
              @endforeach
            </div>

            @foreach ($pesanan_detail as $detail)
            <div>
              <p class="text-[#0058A8] text-[14px] md:text-[22px] font-bold capitalize">
                {{ Illuminate\Support\Str::limit($detail->barang->nama_barang, 20, ' ...') }}
              </p>
              <p class="text-[#48484896] text-[14px] font-semibold" id="jumlah_barang"> {{ $detail->quantity }} Barang </p>
            </div>
            @endforeach

          </div>

          <div class="mt-3">
            @if ($get_detail->count() > 1)
            <p class="text-[#48484896] text-[14px] font-semibold"> +{{ $get_detail->count() - 1 }} Jenis Barang Lainnya</p>
            @endif

            <div class="flex items-center justify-between">
              <p class="text-[#0058A8] text-[16px] md:text-[18px] font-medium mt-1">
                Total Biaya:
                <span class="line-through text-[#C7C7C7]">RP.{{ number_format($proses->total_harga , 0, ',', '.') }}</span>
              </p>
              <button class="border-2 border-[#0E3665] rounded-[10px] text-[14px] text-[#0E3665] px-2 py-1 hover:bg-[#3b82f6] hover:text-white" onclick="toggleModal()" wire:click="getDetailTransaction">
                Lihat Detail Transaksi
              </button>
            </div>
          </div>
        </div>
        @endforeach
        {{-- end komponen --}}

      </div>

      <div  id="dikonfirmasi-container" class="flex flex-col gap-4 bg-[#fff] p-4 rounded-b-[20px] hidden">
        {{-- Komponen untuk menampilkan status pesanan barang yang sudah dikonfirmasi --}}
        @if ($confirmed->count() == 0)
        <div class="flex flex-col items-center text-center">
          <img src="{{ asset('img/no-confirmation.PNG') }}" class="w-[auto] h-[450px]">
          <div class="font-bold text-[24px] md:text-[28px]"> Tidak Ada Pesanan Yang Telah DiKonfirmasi </div>
          <div class="font-semibold text-[#48484896] text-[16px] md:text-[20px]"> Saat ini anda tidak memiliki pesanan yang telah dikonfirmasi, <br>
            silahkan ajukan pesanan </div>

          <a href="{{{ route('home') }}}" class="mx-auto text-white bg-[#5B7696] flex gap-2 justify-center items-center py-2 px-4 rounded-full mt-[2em]">
            Beranda
          </a>
        </div>
        @endif
          @foreach ($confirmed as $confirm)
          <div class="relative  px-4 pb-4 pt-3 border-[1px] border-[#B5B5B5] rounded-[10px]">
            {{-- Status Pesanan --}}
            <div class="absolute top-0 right-0 py-1 px-3 rounded-bl-[10px] rounded-tr-[10px] capitalize
              @if($confirm->status_pesanan == 'proses') bg-[#0058A8] text-white @endif
              @if($confirm->status_pesanan == 'disetujui') bg-[#1cbf1c] text-white @endif
              @if($confirm->status_pesanan == 'ditolak') bg-[#de1414] text-white @endif">
                {{ $confirm->status_pesanan }}
            </div>

            <div class="md:flex items-center border-b-2 pb-3">

              <div class="flex items-center md:pr-2 md:border-r md:border-r-[#4848488e]">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" style="height: 30px; width: 30px;">
                  <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.119 1.007zM8.625 10.5a.375.375 0 11-.75 0 .375.375 0 01.75 0zm7.5 0a.375.375 0 11-.75 0 .375.375 0 01.75 0z" />
                </svg>
                <div class="flex-col ml-2">
                  <div class="text-[14px] md:text-[15px font-bold"> Melakukan Pemesanan </div>
                  <div class="text-[12px] md:text-[13px] text-[#48484896] font-semibold mt-[-3px]">
                    {{ Carbon\Carbon::parse($confirm->tanggal_pesanan)->settings(['formatFunction' => 'translatedFormat'])->locale('id')->format('l, d F Y')}}
                  </div>
                </div>
              </div>

              <div class="px-3 py-[1px] mt-3 md:mt-0 md:ms-3 w-fit border border-[#000000] rounded-[5px]">
                {{ $confirm->kode_pesanan }}
              </div>
            </div>

            <div class="flex gap-4 mt-3">
              <div class="w-14 h-14  md:w-20 md:h-20">
                @php
                  $pesanan_detail = App\Models\PesananDetail::where('pesanan_id', $confirm->id)->orderBy('created_at', 'DESC')->limit(1)->get();
                  $get_detail = App\Models\PesananDetail::where('pesanan_id', $confirm->id)->orderBy('created_at', 'DESC')->get();
                @endphp

                @foreach ($pesanan_detail as $detail)
                  @if ($detail->barang->thumbnail)
                  <img src="{{ asset('storage') }}/{{ $detail->barang->path }}/{{ $detail->barang->thumbnail }}" class="w-full h-full object-cover">
                  @else
                  <img src="{{ asset('img/non.png') }}" class="w-full h-full object-cover">
                  @endif
                @endforeach
              </div>

              @foreach ($pesanan_detail as $detail)
              <div>
                <p class="text-[#0058A8] text-[14px] md:text-[22px] font-bold capitalize">
                  {{ Illuminate\Support\Str::limit($detail->barang->nama_barang, 20, ' ...') }}
                </p>
                <p class="text-[#48484896] text-[14px] font-semibold" id="jumlah_barang"> {{ $detail->quantity }} Barang </p>
              </div>
              @endforeach

          </div>

          <div class="mt-3">
            @if ($get_detail->count() > 1)
            <p class="text-[#48484896] text-[14px] font-semibold"> +{{ $get_detail->count() - 1 }} Jenis Barang Lainnya</p>
            @endif

            <div class="flex items-center justify-between">
              <p class="text-[#0058A8] text-[16px] md:text-[18px] font-medium mt-1">
                Total Biaya:
                <span class="line-through text-[#C7C7C7]">RP.{{ number_format($confirm->total_harga , 0, ',', '.') }}</span>
              </p>
              <button class="border-2 border-[#0E3665] rounded-[10px] text-[14px] text-[#0E3665] px-2 py-1 hover:bg-[#3b82f6] hover:text-white" onclick="toggleModal()" wire:click.prevent="getDetailTransaction"  wire:click="showPesanan({{ $pesanan->id }})">
                Lihat Detail Transaksi
              </button>
            </div>
          </div>
        </div>
        @endforeach
        {{-- end komponen --}}
      </div>
    </div>

  </div>

  {{-- {{dd($process)}} --}}
  <div wire:ignore.self class="fixed z-10 overflow-y-auto top-0 w-full left-0 hidden" id="modal">
    <div class="flex items-center justify-center min-height-100vh pt-4 px-4 pb-20 text-center sm:block sm:p-0">
      <div class="fixed inset-0 transition-opacity">
        <div class="absolute inset-0 bg-gray-900 opacity-75" />
      </div>
      <span class="hidden sm:inline-block sm:align-middle sm:h-screen">&#8203;</span>
      <div class="inline-block align-center bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full" role="dialog" aria-modal="true" aria-labelledby="modal-headline">
        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
          <label class="font-medium text-gray-800">Name</label>
          <input type="text" class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3" />
          <label class="font-medium text-gray-800">Url</label>
          <input type="text" class="w-full outline-none rounded bg-gray-100 p-2 mt-2 mb-3" />
        </div>
        <div class="bg-gray-200 px-4 py-3 text-right">
          <button type="button" class="py-2 px-4 bg-gray-500 text-white rounded hover:bg-gray-700 mr-2" onclick="toggleModal()"><i class="fas fa-times"></i> Cancel</button>
          <button type="button" class="py-2 px-4 bg-blue-500 text-white rounded hover:bg-blue-700 mr-2"><i class="fas fa-plus"></i> Create</button>
        </div>
      </div>
    </div>
  </div>

</div>


@section('js')
<script>
  const proses = document.getElementById('proses');
  const dikonfirmasi = document.getElementById('dikonfirmasi');
  const statusProsesContainer = document.getElementById('status-proses-container');
  const dikonfirmasiContainer = document.getElementById('dikonfirmasi-container');

  proses.addEventListener('click', () => {
    proses.classList.add('border-b-2', 'border-[#0058A8]', 'text-[#0058A8]');
    dikonfirmasi.classList.remove('border-b-2', 'border-[#0058A8]','text-[#0058A8]');
    statusProsesContainer.classList.remove('hidden');
    dikonfirmasiContainer.classList.add('hidden');
  });

  dikonfirmasi.addEventListener('click', () => {
    dikonfirmasi.classList.add('border-b-2', 'border-[#0058A8]', 'text-[#0058A8]');
    proses.classList.remove('border-b-2', 'border-[#0058A8]', 'text-[#0058A8]');
    statusProsesContainer.classList.add('hidden');
    dikonfirmasiContainer.classList.remove('hidden');
  });


  function toggleModal() {
    document.getElementById('modal').classList.toggle('hidden')
  }
</script>
@endsection
