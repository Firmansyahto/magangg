
<section class="flex flex-wrap gap-8 p-10 pt-32">
  <aside class="mx-auto">
      <p class="text-center text-[#0E3665] text-[24px] font-semibold mb-10">Informasi Staff</p>

      <div class="relative w-[250px] w-full ">
        <button onClick="document.getElementById('user-input-profile').click()" class="absolute -bottom-4 z-20 -right-4">
          <svg xmlns="http://www.w3.org/2000/svg" width="54" height="54" viewBox="0 0 54 54" fill="none">
            <circle cx="27" cy="27" r="27" fill="#A8A8A8"/>
            <path d="M27.4283 34.1999C30.458 34.1999 32.9141 31.7439 32.9141 28.7142C32.9141 25.6846 30.458 23.2285 27.4283 23.2285C24.3987 23.2285 21.9426 25.6846 21.9426 28.7142C21.9426 31.7439 24.3987 34.1999 27.4283 34.1999Z" fill="white"/>
            <path d="M22.2861 11.5715L19.149 15.0001H13.7147C11.829 15.0001 10.2861 16.543 10.2861 18.4287V39.0001C10.2861 40.8858 11.829 42.4287 13.7147 42.4287H41.1433C43.029 42.4287 44.5718 40.8858 44.5718 39.0001V18.4287C44.5718 16.543 43.029 15.0001 41.1433 15.0001H35.709L32.5718 11.5715H22.2861ZM27.429 37.2858C22.6976 37.2858 18.8576 33.4458 18.8576 28.7144C18.8576 23.983 22.6976 20.143 27.429 20.143C32.1604 20.143 36.0004 23.983 36.0004 28.7144C36.0004 33.4458 32.1604 37.2858 27.429 37.2858Z" fill="white"/>
          </svg>
          <input type="file" id="user-input-profile" class="absolute bg-red-500 w-2 h-2 hidden cursor-pointer" wire:model="profile">
          
        </button>
        <div class="max-w-[300px] h-auto rounded-md">
          {{-- {{dd(asset('storage/foto/staf/images-2021-12-25t200714-699-61c79b6f17e4ac0527066c72.jpeg'))}} --}}
          @if ($user->foto)
          {{-- <img src="{{ asset('img/info/placeholder.png') }}" class="w-full h-auto object-cover"> --}}
            <img src="{{ asset('storage') }}/{{ $user->path }}/{{ $user->foto }}" class="w-full h-auto object-cover rounded-md">
            @else
            <img src="{{ asset('img/info/placeholder.png') }}" class="w-full h-auto object-cover rounded-md">
          @endif

        </div>
          @if ($profile)
          <div class="mt-3">
            <div class="absolute w-[calc(100%-1rem) h-auto z-10 top-0 left-0 border-dark p-1 rounded">
              <img src="{{ $profile->temporaryUrl() }}" class="w-100 h-100 object-fit-cover rounded">
            </div>
          </div>
          @endif
          @error('profile')
          <span class="text-danger"> {{ $message }} </span>
          @enderror
        </div>
        
        {{-- {{dd($user->foto)}} --}}
        {{-- <button class="bg-red-500 h-6 z-50 w-200">save</button> --}}
    
        
    </div>

    @if(session()->has('image_message'))
      <p class="">{{ session()->get('image_message') }}</p>
    @endif
  

</aside>

<div class="flex flex-col flex-grow rounded-[8px] p-6 sm:min-w-[420px] sm:shadow-[0px_4px_4px_0px_rgba(0,0,0,0.25)]" >
  <div class="pr-10">
    <div class="mb-5">
      <p class="text-[16px] font-semibold">Nama</p>
      @if($editing)
          <input class="border-b-2 w-full text-black" wire:model="name" class="form-control" type="text" value="{{ $user->name }}">
      @else
          <p>{{ $user->name }}</p>
      @endif
    </div>
    
    <div class="mb-5">
      <p class="text-[16px] font-semibold">Email</p>
      <p>{{ $user->email }}</p>
    </div>
    
    <div class="mb-5">
      @if($editing)
        <p class="text-[16px] font-semibold">Password</p>
        <input class="border-2 w-full rounded-[6px]" type="password" wire:model="password">
      @endif
  </div>

    <div class="mb-5">
      <p class="text-[16px] font-semibold">Jabatan</p>
      <p>{{ $user->jabatan }}</p>
    </div>
    <div class="mb-5">
      <p class="text-[16px] font-semibold">unit</p>
      <p>{{ $user->unit_kerja->nama_unit }}</p>
      {{-- {{dd($user->unit_kerja->nama_unit)}} --}}
    </div>
  </div>
    
    
    <div class="relative flex self-end mr-10 gap-3">
      <button class="flex gap-2 justify-center items-center bg-[#6C757D]  py-1 px-4 text-white rounded-[10px]" wire:click="ToggleEditing">
        <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 15 16" fill="none">
          <g clip-path="url(#clip0_151_2060)">
            <path d="M1.875 11.5V14H4.21875L11.1312 6.62662L8.7875 4.12662L1.875 11.5ZM12.9437 4.69329C13.1875 4.43329 13.1875 4.01329 12.9437 3.75329L11.4813 2.19329C11.2375 1.93329 10.8437 1.93329 10.6 2.19329L9.45625 3.41329L11.8 5.91329L12.9437 4.69329Z" fill="white"/>
          </g>
          <defs>
            <clipPath id="clip0_151_2060">
              <rect width="15" height="16" fill="white"/>
            </clipPath>
          </defs>
        </svg>
        </div>
        <p>Edit</p>
      </button>
      @if($editing)
      <button wire:click="updateName" class="flex gap-2 justify-center items-center bg-lime-600  py-1 px-4 text-white rounded-[10px]">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
            <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
          </svg>
          </div>
          <p>Simpan</p>
      </button>
      @endif
      
      @if(session()->has('name_message'))
        {{-- <div id="notificationHitBox" onclick="handleNotificationHitBox('{{ session()->get('message_type') }}', '{{ session()->get('message') }}')" class="absolute bg-red-500 w-full h-full opacity-500"></div>
       --}}
        <p class="">{{ session()->get('name_message') }}</p>
      @endif
        
    
    </div>
  </div>
</section>

