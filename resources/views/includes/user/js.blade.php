<script src="https://cdn.tailwindcss.com"></script>
<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
<script>
  // Constants
  const NAVBAR_ID = 'navbar';
  const NAVBAR_MOBILE_ID = 'navbar_mobile';
  const NAVBAR_TEXT_BERANDA = 'nav_text_beranda';
  const NAVBAR_TEXT_TENTANG_STATUS = 'nav_text_status';
  const BURGER_ID = 'menu_burger';
  const OUTSIDE_BURGER_ID = 'outside_burger';
  const SEARCH_ID = 'menu_search';
  const OUTSIDE_SEARCH_ID = 'outside_search';
  const STATUS_ID = 'menu_status';
  const OUTSIDE_STATUS_ID = 'outside_status';
  const STAUS_ID_MOBILE = 'menu_status_mobile';
  const OUTSIDE_STATUS_ID_MOBILE = 'outside_status_mobile';
  const PROFILE_ID = 'menu_profile';
  const OUTSIDE_PROFILE_ID = 'outside_profile';
  const PROFILE_ID_MOBILE = 'menu_profile_mobile';
  const OUTSIDE_PROFILE_ID_MOBILE = 'outside_profile_mobile';

  let idsToCheck = handleGetAllIdOutside();

  const fake_cards = document.getElementsByClassName('fake_card');

  const navbar = document.getElementById(NAVBAR_ID);
  const navbar_mobile = document.getElementById(NAVBAR_MOBILE_ID);
  const navbar_text_beranda = document.getElementById(NAVBAR_TEXT_BERANDA);
  const navbar_text_tentang_status = document.getElementById(NAVBAR_TEXT_TENTANG_STATUS);

  function handleGetAllIdOutside() {
    // Get all elements in the document
    let allElements = document.getElementsByTagName('*');

    // Filter out the elements whose ID contains the word "outside"
    let outsideElements = Array.from(allElements).filter(function(element) {
      return element.id.includes('outside');
    });

    // Map these elements to their IDs and store them in the idsToCheck array
    return outsideElements.map(function(element) {
      return element.id;
    });
  }

  function handleNavigation() {
    const homeLink = document.getElementById('home-link');
    const statusPesananLink = document.getElementById('status-pesanan-link');
    const links = [
      { id: 'home-link', href: '/', text: 'Beranda' },
      { id: 'status-pesanan-link', href: '/status-pesanan', text: 'Status Pesanan' },
      // Add more links as needed
    ];


    for (const link of links) {
      const linkElement = document.getElementById(link.id);

      if (window.location.pathname === link.href) {
        linkElement.classList.add('text-white', 'bg-[#0E3665]');
        
      } else {
        linkElement.classList.remove('text-white', 'bg-[#0E3665]');
        
      }
    }
  }

  let allNotification = [

  ]

  function createNotification(type, message) {
    let icon = '';
    let stripColor = '';

    if (type === "success") {
      stripColor = 'border-l-4 border-lime-500';
      icon = `
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-check-circle fill-lime-500" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path d="M10.97 4.97a.235.235 0 0 0-.02.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-1.071-1.05z"/>
        </svg>
      `;

    } else if (type === "error") {
      stripColor = 'border-l-4 border-rose-500';
      icon = `
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" class="bi bi-x-circle fill-rose-500" viewBox="0 0 16 16">
          <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
          <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
        </svg>
      `;
    } else {
      stripColor = 'border-l-4 border-sky-500';
      icon = `
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
          <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
        </svg>
      `;
    };


    const template = `
      <div id="${type}-${message}" class="relative max-w-[300px] transition-all translate-x-full ease-in-out duration-500 pr-10 shadow-lg p-2 opacity-100 rounded-md border-2 border-grey-100 z-30 bg-white">
        <div class="${stripColor} pl-2">
          <div class="flex items-center gap-2">
            <p class="text-[18px] font-bold">${type}</p>
            <div>
              ${icon}
            </div>
          </div>
          <p class="w-[200px] break-all text-[14px]">${message}</p>
        </div>
        <div class="absolute right-0 top-1/3" onclick="closeNotification('${type}-${message}')">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
            <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
          </svg>
        </div>
      </div>
    `

    return {template, id: `${type}-${message}`};
  }


  function displayNotifications() {
    let notificationDiv = document.getElementById('notification-container');

    for (let i = allNotification.length - 1; i >= 0; i--) {
      let notification = allNotification[i];
      let {template, id} = createNotification(notification.type, notification.message);
      notificationDiv.innerHTML = template + notificationDiv.innerHTML;
      allNotification.pop();

      setTimeout(() => {
        let notification = document.getElementById(id);
        notification.classList.remove('translate-x-full');
        notification.classList.add('translate-x-0');
      }, 100);

      setTimeout(function() {
        closeNotification(id);
      }, 2000);
    }
  }


  function handleNotification(type, message) {
    let notification = {
      type: type,
      message: message
    };

    allNotification.push(notification);
    displayNotifications();
  }

  function handleNotificationHitBox(type, message) {
    try {
        // Your notification handling code here
        let notification = {
          type: type,
          message: message
        };

        allNotification.push(notification);
        displayNotifications();

        // Get the div
        var div = document.getElementById('notificationHitBox');

        // Remove the div
        if (div) {
          div.parentNode.removeChild(div);
        }
    } catch (error) {
        console.error('An error occurred in handleNotification:', error);
    }

  }

  function closeNotification(id) {
    let notificationDiv = document.getElementById('notification-container');
    let notification = document.getElementById(id);

    // Check if the notification is still in the DOM
    if (notificationDiv.contains(notification)) {
      notification.classList.remove('opacity-100');
      notification.classList.add('opacity-0');
      setTimeout(() => notification.remove(), 500);
    }
  }

  function createModal(title, description, list) {
    const listItems = list.map(item => `<li>${item}</li>`).join('');
    const modalTemplate = `
      <div id="modal-background" class="absolute w-full h-full bg-gray-900 opacity-50"></div>
      <div class="relative border-2 boder-black rounded-md max-w-[400px] bg-white">
        <div class="h-2 w-full bg-rose-500 rounded-t-md"></div>
        <div class="absolute -top-4 right-[calc(50%-1rem)] bg-rose-500 w-10 h-10 p-2 rounded-full ">
          <svg xmlns="http://www.w3.org/2000/svg" class="bi bi-trash-fill fill-white" viewBox="0 0 16 16">
            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
          </svg>
        </div>
        <div class="text-center p-2 sm:p-10">
          <p class="text-rose-500 text-[24px] font-bold">${title}</p>
          <p class="text-[16px]">${description}</p>
          <ul class="mx-auto text-[16px] list-disc text-start w-fit mt-2 font-bold">
            ${listItems}
          </ul>
        </div>
        <div class="flex gap-4 p-2">
          <button onclick="closeModal()" class="flex-1 bg-white text-gray-500 border-2  border-gray-500 px-3 py-1 rounded-[10px] hover:bg-gray-300">Batal</button>
          <button class="flex-1 bg-rose-500 text-white  px-3 py-1 rounded-[10px] hover:bg-rose-700">Hapus</button>
        </div>
      </div>`;

    return modalTemplate;
  }

  function handleModal(title, description, list) {
    let modal = document.getElementById('modal-container');
    modal.innerHTML = createModal(title, description, list);
    openModal();
  }

  function openModal() {
    let modal = document.getElementById('modal-container');
    let modalBackground = document.getElementById('modal-background');

    modal.classList.remove('hidden');

    modalBackground.addEventListener('click', function() {
      closeModal();
    });
  }

  function closeModal() {
    let modal = document.getElementById('modal-container');
    let modalBackground = document.getElementById('modal-background');

    modal.classList.add('hidden');
  }

  function handleAsideCart() {

    try {
      let asideCart = document.getElementById('aside-card');
      let openAsideCart = document.getElementById('open-aside-card');
      let closeAsideCart = document.getElementById('close-aside-card');

      
      if (!asideCart || !openAsideCart || !closeAsideCart) {
        throw new Error('One or more elements could not be found.');
      }

      openAsideCart.addEventListener('click', function() {
        asideCart.classList.remove('translate-y-full');
        asideCart.classList.add('translate-y-0');
        
        openAsideCart.classList.remove('opacity-100');
        openAsideCart.classList.add('opacity-0');
        setTimeout(function() {
          openAsideCart.classList.add('hidden');
        }, 300);

        closeAsideCart.classList.remove('hidden');
        setTimeout(function() {
          closeAsideCart.classList.remove('opacity-0');
          closeAsideCart.classList.add('opacity-100');
        }, 500);
        
        
      });

      closeAsideCart.addEventListener('click', function() {
        asideCart.classList.remove('translate-y-0');
        asideCart.classList.add('translate-y-full');
      
        closeAsideCart.classList.remove('opacity-100');
        closeAsideCart.classList.add('opacity-0');
        setTimeout(function() {
          closeAsideCart.classList.add('hidden');
        }, 300);

        openAsideCart.classList.remove('hidden');
        setTimeout(function() {
          openAsideCart.classList.remove('opacity-0');
          openAsideCart.classList.add('opacity-100');
        }, 300);
        
      });
    } catch (error) {
      console.log('An error occurred in the handleAsideCart function:', error);
    }
    
  }

  function checkScrollNav()
  {
    if (window.pageYOffset > 50)
    {
      navbar.classList.remove('bg-transparent', 'shadow-none', 'text-white', "border-[#0E3665]");
      navbar.classList.add('bg-white', 'shadow-md', 'text-black', "border-b-4", "!border-[#0E3665]");
      navbar_mobile.classList.remove('bg-transparent', 'shadow-none', "border-[#0E3665]");
      navbar_mobile.classList.add('bg-white', 'shadow-md', 'ease-in-out', "border-b-4", "!border-[#0E3665]");

      navbar_text_beranda.classList.remove('text-white', 'border-white');
      navbar_text_beranda.classList.add('text-[#0E3665]', 'border-[#0E3665]');
      navbar_text_tentang_status.classList.remove('text-white', 'border-white');
      navbar_text_tentang_status.classList.add('text-[#0E3665]', 'border-[#0E3665]');
    }
    else
    {
      navbar.classList.add('bg-transparent', 'shadow-none','text-white', "border-b-4", "border-[#0E3665]");
      navbar.classList.remove('bg-white', 'shadow-md', 'text-black', "border-b-4", "border-[#0E3665]");
      navbar_mobile.classList.add('bg-transparent', 'shadow-none', "border-b-4", "border-[#0E3665]");
      navbar_mobile.classList.remove('bg-white', 'shadow-md', "border-b-4", "border-[#0E3665]");

      navbar_text_beranda.classList.add('text-white', 'border-white');
      navbar_text_beranda.classList.remove('text-[#0E3665]', 'border-[#0E3665]');
      navbar_text_tentang_status.classList.add('text-white', 'border-white');
      navbar_text_tentang_status.classList.remove('text-[#0E3665]', 'border-[#0E3665]');
    }
  }


  // Function to check if the burger menu is open and close it when clicked outside
  function closeBurgerMenuWhenClickedOutside(burger, outsideBurger) {
    if (burger.checked) {
      // document.body.style.overflow = 'hidden';
    } else {
      document.body.style.overflow = 'auto';
    }

    // Iterate over the array of IDs
    for (var i = 0; i < idsToCheck.length; i++) {
      // If the clicked element's ID is in the array, close the burger menu
      if (event.target.id === idsToCheck[i]) {
        burger.checked = false;
        document.body.style.overflow = 'auto';
        break;
      }
    }
  }

  // Event listener for clicks on the document
  function clickHandler(event) {
    document.addEventListener('click', function(event) {
      const burger = document.getElementById(BURGER_ID);
      const outsideBurger = document.getElementById(OUTSIDE_BURGER_ID);
      const search = document.getElementById(SEARCH_ID);
      const outsideSearch = document.getElementById(OUTSIDE_SEARCH_ID);
      const status = document.getElementById(STATUS_ID);
      const outsideStatus = document.getElementById(OUTSIDE_STATUS_ID);
      const statusMobile = document.getElementById(STAUS_ID_MOBILE);
      const outsideStatusMobile = document.getElementById(OUTSIDE_STATUS_ID_MOBILE);
      const profile = document.getElementById(PROFILE_ID);
      const outsideProfile = document.getElementById(OUTSIDE_PROFILE_ID);
      const profileMobile = document.getElementById(PROFILE_ID_MOBILE);
      const outsideProfileMobile = document.getElementById(OUTSIDE_PROFILE_ID_MOBILE);
      const closeBurger = document.getElementById('close_burger');


      closeBurger.addEventListener('click', function() {
        burger.checked = false;
        document.body.style.overflow = 'auto';
      });

      closeBurgerMenuWhenClickedOutside(burger, outsideBurger);
      closeBurgerMenuWhenClickedOutside(search, outsideSearch);
      closeBurgerMenuWhenClickedOutside(status, outsideStatus);
      closeBurgerMenuWhenClickedOutside(statusMobile, outsideStatusMobile);
      closeBurgerMenuWhenClickedOutside(profile, outsideProfile);
      closeBurgerMenuWhenClickedOutside(profileMobile, outsideProfileMobile);
    });
  }


  function createFakeCards() {
    for (let i = 0; i < fake_cards.length; i++)
    {
      const card = document.createElement('div');
      card.classList.add('relative', 'flex', 'flex-col', 'h-full', 'sm:w-[235px]', 'shadow-[1px_3px_4px_1px_rgba(0,0,0,0.3)]', 'rounded-[10px]', 'bg-white', 'text-black');
      card.innerHTML = `
          <p class="absolute top-0 right-0 p-3 bg-[#0E3665] text-white rounded-bl-[10px] rounded-tr-[10px] z-10">stock: 0</p>
          <div class="relative w-[235px] h-[235px] ">
              <img class="w-full h-full" src="{{ asset('img/user/home/barang_rautan.png') }}"  alt="">
          </div>
          <p class="m-3 text-[#0058A8] font-medium">Nama Barang</p>
          <p class="line-through m-3 pb-3 text-[14px]">Harga</p>
      `;
      fake_cards[i].appendChild(card);
    }
  }

  document.addEventListener('DOMContentLoaded', function () {
    const burgerNavbar = document.getElementById('burger_navbar');
    if (burgerNavbar) {
      const computedStyle = window.getComputedStyle(burgerNavbar);
      const backgroundColor = computedStyle.backgroundColor;
      if (backgroundColor === 'rgb(255, 255, 255)') {
        burgerNavbar.src = '{{ asset('img/user/navbar/burger_black.png') }}';
      }
    }

    document.querySelectorAll('#thumbnails-detail').forEach(item => {
      if (item === document.getElementById('thumbnails-detail')) {
        item.classList.add('border','border-[#0E3665]');
      }
      item.addEventListener('click', function() {
        document.getElementById('hero-image').src = this.dataset.image;
        this.classList.add('border','border-[#0E3665]');
        document.querySelectorAll('#thumbnails-detail').forEach(img => {
          if (img !== this) {
            img.classList.remove('border', 'border-red-500');
          }
        });
      })
    });

    window.addEventListener('scroll', function() {
    // Check if the current path is the root path
      if (window.location.pathname === '/') {
        checkScrollNav();
      }
    });

    createFakeCards();
    clickHandler();
    handleNavigation();
    handleAsideCart();
  });


  document.addEventListener('DOMContentLoaded', function ()
  {

    var swiper = new Swiper('.swiper-container', {
      // Optional parameters
      direction: 'horizontal',
      observer: true,
      observeParents: true,
      parallax:true,
      // centeredSlides: true,
      centeredSlidesBounds: true,
      // Navigation arrows
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
        pagination: {
          el: '.swiper-pagination',
          clickable: true,
        },
        // Responsive breakpoints
        breakpoints: {
            // when window width is >= 320px
            420: {
              slidesPerView: 1,
              spaceBetween: 20
            }, navigation: {
                  nextEl: '.swiper-button-next',
                  prevEl: '.swiper-button-prev',
                },
                pagination: {
                  el: '.swiper-pagination',
                  clickable: true,
                },
            // when window width is >= 480px
            540: {
              slidesPerView: 2,
              spaceBetween: 40
            },
            // when window width is >= 640px
            760: {
              slidesPerView: 3,
              spaceBetween: 0
            },
            // when window width is >= 1024px
            1024: {
              slidesPerView: 4,
              spaceBetween: 0
            },
            // when window width is >= 1024px
            1280: {
              slidesPerView: 5,
              spaceBetween: 0
            },
        },

    });

    window.addEventListener('resize', function() {
      // Get the Swiper container
      var container = document.querySelector('.swiper-container');

      // Check if the Swiper container exists
      if (container) {
        // Get the width of the Swiper container
        var containerWidth = container.offsetWidth;

        // Calculate the number of slides that can fit in the container
        var slidesPerView = Math.floor(containerWidth / 200); // Assuming each slide is 200px wide

        // Update the Swiper instance
        swiper.params.slidesPerView = slidesPerView;
        swiper.update();
      }
    });

    // Trigger the resize event to initialize the Swiper instance
    window.dispatchEvent(new Event('resize'));
  });

  document.addEventListener('DOMContentLoaded', function() {
    var inputSearch = document.getElementById("searchBar");
  
      if (inputSearch) {
      inputSearch.addEventListener("keypress", function(event) {
        try {
          if (event.key === "Enter") {
            event.preventDefault();
            document.getElementById("submitSearch").click();
          }
        } catch (error) {
          console.error('An error occurred in the keypress event handler:', error);
        }
      });
    } else {
      console.log('Element with id "searchBar" could not be found.');
    }
  });
  
</script>

@yield('js')
