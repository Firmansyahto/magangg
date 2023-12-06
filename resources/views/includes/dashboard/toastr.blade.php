{{-- Toastr --}}
<button type="button" class="btn btn-primary d-none" id="liveToastBtn">Show live toast</button>

@if ( $notification_type )
<div class="toast-container position-fixed end-0 px-4">

  <div id="liveToast" class="toast dark-shadow-r0 p-1" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="toast-body bg-white"
    style="border-left: 5px solid #{{ $notification_type == 'info-failed' ? 'd75452' : '64BF6A' }} ;">

      <div class="d-flex align-items-center">

        <div class="font-poppins ms-2" style="color: #48484896;">
          <div class="d-flex flex-column align-items-start">

            <div class="d-flex align-items-center">
              <div class="font-poppins me-2 {{ $notification_type == 'info-failed' ? 'text-danger' : 'text-success' }}"
              style="font-size: 18px;">
                {{ $notification_type == 'info-failed' ? 'Error' : 'Success' }}
              </div>
              @if (session()->has('info-success'))
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#64BF6A" style="height: 25px; width: 25px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              @elseif ($notification_type == 'info-failed')
              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="#d75452" style="height: 25px; width: 25px;">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9.75 9.75l4.5 4.5m0-4.5l-4.5 4.5M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              @endif
            </div>

            <div style="font-size: 15px;">
              {{ $notification_type == 'info-failed' ? session('info-failed') : session('info-success') }}
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
@endif
{{-- End --}}
