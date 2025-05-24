<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        @vite('resources/css/app.css')
        <title>{{ $title ?? 'Page Title' }}</title>
        <link
      rel="stylesheet"
      type="text/css"
      href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300..800;1,300..800&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Albert+Sans:ital,wght@0,100..900;1,100..900&family=Hanken+Grotesk:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">

    </head>
    <body class="font-jost">
        <!--Header Code -->

        <div class="headerstyle sticky top-0 bg-white z-50">
            <div
              class="container bg-white py-5 flex flex-row justify-between items-center !w-full lg:!w-[1240px] px-6 lg:px-0"
            >
              <div class="logo">
                <a href="/" wire:navigate>
                <img class="w-[80px] lg:w-auto" src="{{url('frontend/penta-logo.svg')}}" alt="logo" />
              </a>
              </div>
              
                
                <div class=" menu hidden lg:flex flex-row gap-20 items-center">
                  <ul class="inline-flex text-[#202020] text-[16px] menu-items space-x-12">
                    <li class="">
                    <a href="{{route('productpage')}}" wire:navigate> Products </a>
                    </li>
                    
                    <li class="">
                    <a href="{{route('aboutus')}}" wire:navigate> About Us </a>
                    </li>
                    <li class="">
                      <a href="{{route('international')}}" wire:navigate> International </a>
                      </li>
                    <li class="">
                    <a href="{{route('contactus')}}" wire:navigate> Contact </a>
                    </li>
                  </ul>

                  <div class="hidden lg:block">
                  @livewire('search-bar')
                  </div>

                </div>

                <!--Mobile Menu-->

                @livewire('mobile-menu')

                <!--End Mobile Menu-->

            </div>
          </div>

        <!--End Header Code-->
        {{ $slot }}

         <!--Footer Section-->

    <div class="footergredient py-16">
        <div class="container !w-full lg:!w-[1240px] px-6 lg:px-0">
          <div class="w-full flex flex-col lg:flex-row items-left lg:items-center gap-6 lg:gap-20 justify-between mb-12">
            <img src="{{url('frontend/white-logo.svg')}}" class="w-24 lg:w-auto" />

            <div class="button !mt-0 lg:!mt-10">
                <a href="{{route('aboutus')}}" wire:navigate class="pl-4 pr-2 py-2 inline-flex font-light items-center bg-white text-[#363636] rounded-full">
                  Make an Appointment
                <div class="flex flex-co justify-center items-center ml-2 h-6 w-6 bg-[#363636] rounded-full" >
                  <svg width="9" height="9" viewBox="0 0 8 8" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M7.53959 1.1346C7.65272 1.14457 7.75728 1.19904 7.83028 1.28604C7.90329 1.37305 7.93877 1.48547 7.92895 1.59862L7.50633 6.42908C7.50334 6.48656 7.48881 6.54285 7.46359 6.59459C7.43838 6.64632 7.403 6.69245 7.35957 6.73022C7.31614 6.76799 7.26554 6.79662 7.21081 6.81441C7.15607 6.8322 7.09831 6.83879 7.04097 6.83377C6.98364 6.82876 6.9279 6.81224 6.87708 6.78522C6.82626 6.75819 6.78141 6.72121 6.7452 6.67647C6.70899 6.63174 6.68216 6.58016 6.66631 6.52483C6.65046 6.4695 6.64592 6.41155 6.65295 6.35442L6.98541 2.55446L0.773647 7.76674C0.686572 7.83981 0.574038 7.87529 0.460802 7.86538C0.347566 7.85548 0.242903 7.80099 0.169839 7.71392C0.0967739 7.62684 0.0612923 7.51431 0.0711991 7.40107C0.081106 7.28784 0.13559 7.18317 0.222665 7.11011L6.43443 1.89782L2.63446 1.56537C2.57698 1.56238 2.5207 1.54784 2.46896 1.52263C2.41722 1.49741 2.37109 1.46203 2.33332 1.4186C2.29556 1.37517 2.26692 1.32458 2.24913 1.26984C2.23134 1.2151 2.22476 1.15734 2.22977 1.10001C2.23479 1.04267 2.2513 0.986932 2.27833 0.936116C2.30535 0.8853 2.34234 0.840448 2.38707 0.804236C2.43181 0.768023 2.48338 0.741192 2.53871 0.725343C2.59404 0.709494 2.652 0.704953 2.70912 0.711988L7.53959 1.1346Z" fill="white"/>
                  </svg>
                </div>
                </a>
              </div>
          </div>
  
        
        </div>
        
        <div class="container !w-full lg:!w-[1240px] px-6 lg:px-0 hidden lg:block">
            <hr class="border-1 border-white opacity-25 my-8" />
        </div>
  
        <div class="container flex flex-col lg:flex-row gap-10 lg:gap-20 justify-between !w-full lg:!w-[1240px] px-6 lg:px-0 ">
          <div class="w-full lg:w-4/12 space-y-5 lg:space-y-2">
            <h4 class="text-white">Address</h4>
            <p class="text-white text-opacity-50 font-extralight text-sm w-[150px] !mt-2 lg:!mt-7">
              PENTA CHEM (ME) FZE
              South Zone, 2 Jebel Ali
              PO Box 18025
              Dubai, UAE
            </p>

          </div>
  
          <div class="w-full lg:w-4/12 space-y-2 lg:space-y-5">
            <h4 class="text-white">Our Products</h4>
            <ul class="text-white text-sm font-extralight text-opacity-50 lg:space-y-2">
              <li><a href="{{route('productpage')}}" wire:navigate >Aroma Chemicals</a></li>
              <li><a href="{{route('productpage')}}" wire:navigate >Natural Extracts</a></li>
              <li><a href="{{route('productpage')}}" wire:navigate >Essential Oils</a></li>
              <li><a href="{{route('productpage')}}" wire:navigate >Specialties</a></li>
            </ul>
          </div>
          
          <div class="w-full lg:w-4/12 space-y-5 lg:space-y-2">
            <div class="flex flex-col lg:flex-row justify-between items-top gap-10 lg:gap-0">
              <div class="space-y-2 lg:space-y-5">
                <h4 class="text-white">Contact Us</h4>

                <div class="space-y-2">
                  <p class="text-white text-opacity-50 font-extralight text-sm space-y-2">
                    <a href="#">+91 22 2419 8800 </a>
                  </p>
                  <p class="text-white text-opacity-50 font-extralight text-sm space-y-2">
                    <a href="#">info@aacipl.com</a>
                  </p>
                </div>
                
              </div>

                <div>

                  <div class="flex space-x-4">
                    <a href="https://www.instagram.com" target="_blank" class="text-white hover:text-gray-300">
                      <div class="flex justify-center items-center h-10 w-10 bg-[#23272F] rounded-full border-2 border-[#292E38]">
                        <img src="{{url('frontend/instagram-icon.svg')}}" />
                      </div>      
                    </a>
                    <a href="https://www.linkedin.com" target="_blank" class="text-white hover:text-gray-300">
                      <div class="flex justify-center items-center h-10 w-10 bg-[#23272F] rounded-full border-2 border-[#292E38]">
                        <img src="{{url('frontend/Clip-path-group-icon.svg')}}" />
                      </div> 
                    </a>
                    <a href="https://www.twitter.com" target="_blank" class="text-white hover:text-gray-300">
                      <div class="flex justify-center items-center h-10 w-10 bg-[#23272F] rounded-full border-2 border-[#292E38]">
                        <img src="{{url('frontend/Vector-icon.svg')}}" />
                      </div> 
                    </a>
                  </div>

                </div>
            </div>

          </div>
          
        </div>
        <div class="container my-5 !w-full lg:!w-[1240px] px-6 lg:px-0 block lg:hidden">
          <hr class="border-1 border-white opacity-25 my-8" />
        </div>
        <div class="container mt-4 lg:mt-20 flex flex-col lg:flex-row gap-20 justify-between !w-full lg:!w-[1240px] px-6 lg:px-0">
          <div class="w-full lg:w-6/12 mb-1">
            <p class="text-white text-opacity-50 text-xs">
              © 2025, Associate Allied Chemicals. All Rights
              Reserved.
            </p>
          </div>

          <div id="scrollUpButton" class="hidden fixed bottom-10 right-10 bg-white text-black p-3 rounded-full shadow-lg cursor-pointer">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5 15l7-7 7 7" />
            </svg>
          </div>
        

      </div>
  
      <!--End Footer Section-->
    </body>
    <script
    src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous"
    referrerpolicy="no-referrer"
  ></script>
  <script
    type="text/javascript"
    src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"
  ></script>

    <script>
      const scrollUpButton = document.getElementById('scrollUpButton');

      window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
          scrollUpButton.classList.remove('hidden');
        } else {
          scrollUpButton.classList.add('hidden');
        }
      });

      scrollUpButton.addEventListener('click', () => {
        window.scrollTo({ top: 0, behavior: 'smooth' });
      });
    </script>
 
  @yield('additionaljs')
</html>