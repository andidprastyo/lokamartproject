<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=" bg-white">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>LokaMart</title>
    <script src="https://kit.fontawesome.com/e5c96fca62.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css"/>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="{{asset("css/stars.css")}}">
@vite(['resources/css/app.css','resources/js/app.js'])
<!-- @TODO: replace SET_YOUR_CLIENT_KEY_HERE with your client key -->
<script type="text/javascript"
src="https://app.sandbox.midtrans.com/snap/snap.js"
data-client-key="{{config('midtrans.client_key')}}"></script>
</head>

<body class="antialiased flex flex-col ">

<nav class="bg-amber-400 z-50 h-16 border-gray-200 dark:bg-gray-900 dark:border-gray-700">
  <div class="max-w-screen-xl flex flex-wrap items-center mx-auto my-auto">
    <a href="#" class="flex items-center ml-16 mt-3">
      <span class="self-center text-3xl font-semibold whitespace-nowrap" style="color: #00a8c8">Loka</span>
      <span class="self-center text-3xl font-semibold whitespace-nowrap dark:text-white">Mart</span>
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-3 ml-20  border border-gray-100 drop-shadow-xl rounded-lg bg-gray-50 md:flex-row md:space-x-8  md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center text-lg justify-between h-10 py-2 px-5 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:px-5 md:py-2 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">All Categories <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="z-50 w-48 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
              <ul class="py-2 text-xl text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                <li>
                    <form method="GET" id="formkategori" action="{{ route('produkall') }}">
                        <select name="kategori" onchange="pindahKeHalaman(this)" class="block text-lg px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">
                            <option value="">Semua Kategori</option>
                            @foreach ($kategori as $k)
                                <option value="{{ $k->id }}" @if ($k->id == Request::get('kategori')) selected @endif>{{ $k->nama_kategori }}</option>
                            @endforeach
                        </select>
                    </form>
                </li>
            </ul>
            </div>
        </li>
      </ul>
    </div>
    <div class="mt-3 ml-10">
      <form method="GET" action="{{ route('produk-search') }}">
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input id="default-search" class="block w-96 h-10 p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required name="search" {{ Request::get('search') }}>
        </div>
      </form>
    </div>
    <div class="flex">
      <div class="ml-20 mt-5">
        <a href="{{ route('wishlist') }}"><img src="{{asset('img/heart.svg')}}" alt=""></a>
      </div>
      <div class="ml-8 mt-5">
        <a href="{{ route('keranjang') }}"><img src="{{asset('img/shopping-cart.svg')}}" alt=""></a>
      </div>

      <button id="dropdownDefaultButton" data-dropdown-toggle="dropdown" class="text-white font-medium rounded-lg text-sm px-8 mt-5 text-center inline-flex items-center " type="button"> 
        @guest
      <li><a href="{{ route('login') }}">Login</a></li>
      <li><a href="{{ route('register') }}">Register</a></li>
        @else
        <img src="{{asset('img/profile-circle.svg')}}" alt="">
        Hi, {{ strtok(auth()->user()->name, ' ') }}
      </button>
      <!-- Dropdown menu -->
      <div id="dropdown" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700">
          <ul class="py-2 text-sm text-gray-700 dark:text-gray-200" aria-labelledby="dropdownDefaultButton">
            <li>
              <a href="{{route('user.edit', auth()->user()->id )}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Edit Profile</a>
            </li>
            <li>
              <a href="{{ route('pay')}}" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Histori Pesanan</a>
            </li>
            <li>
              <a href="{{ route('logout') }}"
              onclick="event.preventDefault();
                       document.getElementById('logout-form').submit();" class="block px-4 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Sign Out</a>
                       <form id="logout-form" action="/logout" method="POST"
                       style="display: none;">.
                       @csrf
                   </form>
            </li>
          </ul>
      </div>
      @endguest

    </div>
  </div>
</nav>
<nav class="bg-white z-40 drop-shadow-lg h-10 border-y-2 pt-1 border-gray-200">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-center mx-auto my-auto">
    <div class="ml-9 text-xl hover:underline" style="color: #00a8c8">
      <a href="{{ route('home') }}">Home</a>
    </div>
    <div class="ml-9 text-xl hover:underline" style="color: #00a8c8">
      <a href="{{ route('about') }}">About</a>
    </div>
    <div class="ml-9 text-xl hover:underline" style="color: #00a8c8">
      <a href="{{ route('owner') }}">Owner UMKM</a>
    </div>
    @if(auth()->check() && auth()->user()->role == 'owner')
    <div class="ml-9 text-xl hover:underline" style="color: #00a8c8">
      <a href="{{ route('list') }}">Seller Centre</a>
    </div>
    @endif
    <div class="ml-9 text-xl hover:underline" style="color: #00a8c8">
      <a href="">Terms & Conditions</a>
    </div>
    @if(auth()->check() && auth()->user()->role == 'admin')
    <div class="ml-9 text-xl hover:underline" style="color: #00a8c8">
      <a href="{{route('adminuser')}}">Dashboard Admin</a>
    </div>
    @endif
    <div class="ml-9">
      <a href=""><img src="{{asset('img/instagram.svg')}}" alt=""></a>
    </div>
    <div class="ml-9">
      <a href=""><img src="{{asset('img/facebook.svg')}}" alt=""></a>
    </div>
  </div>
</nav>

<div id="default-carousel" class=" relative w-full z-0 drop-shadow-lg" data-carousel="slide">
    <!-- Carousel wrapper -->
    <div class="relative h-[40rem] z-0 overflow-hidden">
         <!-- Item 1 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{asset('img/banner3.png')}}" class="relative z-0 block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
        <!-- Item 2 -->
        <div class="hidden duration-700 ease-in-out" data-carousel-item>
            <img src="{{asset('img/banner2.png')}}" class="relative z-0 block w-full -translate-x-1/2 -translate-y-1/2 top-1/2 left-1/2" alt="...">
        </div>
    </div>
    <!-- Slider indicators -->
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        <button type="button" class="w-3 h-3 rounded-full" aria-current="true" aria-label="Slide 1" data-carousel-slide-to="0"></button>
        <button type="button" class="w-3 h-3 rounded-full" aria-current="false" aria-label="Slide 2" data-carousel-slide-to="1"></button>
    </div>
    <!-- Slider controls -->
    <button type="button" class="absolute top-0 left-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-prev>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            <span class="sr-only">Previous</span>
        </span>
    </button>
    <button type="button" class="absolute top-0 right-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none" data-carousel-next>
        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full sm:w-10 sm:h-10 bg-white/30 dark:bg-gray-800/30 group-hover:bg-white/50 dark:group-hover:bg-gray-800/60 group-focus:ring-4 group-focus:ring-white dark:group-focus:ring-gray-800/70 group-focus:outline-none">
            <svg aria-hidden="true" class="w-5 h-5 text-white sm:w-6 sm:h-6 dark:text-gray-800" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
            <span class="sr-only">Next</span>
        </span>
    </button>
</div>
<div class="mx-auto my-[5rem] grid grid-cols-4 gap-[5rem]">
    @foreach ($produk as $p)
    <div class="w-[15rem] drop-shadow-lg max-w-sm bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <a href="{{ route('data-produk', $p->slug) }}" id="imgCard">
            @php
                $imgLink = str_replace('public','storage',$p->gambar_produk,);
                
            @endphp
            <img class="rounded-t-lg" src="{{asset($imgLink)}}" alt="" />
        </a>
        <div class="px-5 mt-3 pb-5 text-center">
            <a href="#">
                <h5 class="text-xl font-semibold tracking-tight text-gray-900 dark:text-white">{{$p->nama_produk}}</h5>
            </a>
            <div class="flex justify-center mt-3 mb-3">
              {{ $p->average_rating }}
                <svg aria-hidden="true" class="w-5 h-5 text-yellow-300" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>First star</title><path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path></svg>
            </div>
            <div class="items-center">
                <span class="text-3xl font-bold text-gray-900 dark:text-white">@currency($p->harga_produk)</span>
            </div>
            <div class="flex flex-col gap-3 mt-3">
              @if($p->stok_produk > 0)
                <form method="POST" action="/pesan/{{$p->id}}">
                    @csrf
                    <button type="submit" class="text-white bg-yellow-300 hover:bg-yellow-400 focus:ring-4 focus:outline-none focus:ring-yellow-100 font-medium rounded-lg text-sm px-5 py-2.5 text-center mx-0">Add to Cart</button>
                </form>
              @else
              stok habis
              @endif
                <form action="{{ route('favorite.add', $p->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @csrf
                        <button class="p-2 bg-red-100 rounded hover:bg-red-600">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6 text-red-700 hover:text-red-100">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 8.25c0-2.485-2.099-4.5-4.688-4.5-1.935 0-3.597 1.126-4.312 2.733-.715-1.607-2.377-2.733-4.313-2.733C5.1 3.75 3 5.765 3 8.25c0 7.22 9 12 9 12s9-4.78 9-12z" />
                            </svg>

                        </button>
                </form>
            </div>

        </div>
    </div>
    </form>
    @endforeach
</div>


<footer class="w-full bg-amber-400 relative bottom-0 w-full">
  <div class="mx-auto w-full max-w-screen-xl p-4 py-6 lg:py-8">
      <div class="md:flex">
        <div class="pl-20 mt-10 mb-6">
            <div class="">
                <a href="#" class="flex items-center">
                    <span class="self-center text-3xl font-semibold whitespace-nowrap" style="color: #00a8c8">Loka</span>
                    <span class="self-center text-3xl font-semibold whitespace-nowrap dark:text-white">Mart</span>
                  </a>
            </div>
            <a href="">
                <div class="flex mt-5 hover:underline">
                    <img src="{{asset('img/instagram.svg')}}" class="w-8 h-8" alt="">
                    <p class="ml-7 mt-1 text-lg">LokaMart</p>
                </div>
            </a>
            <a href="">
                <div class="flex mt-5 hover:underline">
                    <img src="{{asset('img/facebook.svg')}}" class="w-8 h-8" alt="">
                    <p class="ml-7 mt-1 text-lg">LokaMart</p>
                </div>
            </a>
            <a href="">
                <div class="flex mt-5 hover:underline ">
                    <img src="{{asset('img/location.svg')}}" alt="">
                    <div class="flex flex-col">
                        <p class="ml-5 text-lg">Politeknik Negeri</p>
                        <p class="ml-5 text-lg">Malang</p>
                    </div>

                </div>
            </a>
        </div>
        <div class="ml-10 flex ">
            <div class="ml-14">
                <p class="mb-6 mt-12 text-xl font-semibold uppercase dark:text-white">Company</p>
                <ul class="text-lg">
                  <li class="mb-6">
                      <a href="" class="hover:underline">Home</a>
                  </li>
                  <li class="mb-6">
                      <a href="" class="hover:underline">Shop</a>
                  </li>
                  <li class="mb-6">
                    <a href="" class="hover:underline">Owner UMKM</a>
                  </li>
                  <li class="mb-6">
                    <a href="" class="hover:underline">About</a>
                  </li>
                  <li class="mb-6">
                    <a href="" class="hover:underline">Term & Condition</a>
                  </li>
                </ul>
            </div>
            <div class="ml-20">
                <h2 class="mb-6 mt-12 text-xl font-semibold uppercase dark:text-white">Account</h2>
                <ul class="text-lg">
                  <li class="mb-6">
                      <a href="" class="hover:underline">Sign In</a>
                  </li>
                  <li class="mb-6">
                      <a href="" class="hover:underline">Sign Up</a>
                  </li>
                  <li class="mb-6">
                    <a href="" class="hover:underline">View Cart</a>
                  </li>
                  <li class="mb-6">
                    <a href="" class="hover:underline">My Wishlist</a>
                  </li>
                  <li class="mb-6">
                    <a href="" class="hover:underline">Seller Centre</a>
                  </li>
                </ul>
            </div>
            <div class=" ml-20">
                <h2 class="mb-5 mt-12 text-xl font-semibold uppercase dark:text-white">Creator</h2>
                <a href="https://github.com/andidprastyo">
                    <div class="flex mt-5 underline">
                        <img src="{{asset('img/vector.svg')}}" class="w-8 h-8" alt="">
                        <p class="ml-5 mt-1 text-lg">https://github.com/andidprastyo</p>
                    </div>
                </a>
                <a href="https://github.com/BagusRezky">
                    <div class="flex mt-5 underline">
                        <img src="{{asset('img/vector.svg')}}" class="w-8 h-8" alt="">
                        <p class="ml-5 mt-1 text-lg">https://github.com/BagusRezky</p>
                    </div>
                </a>
                <a href="https://github.com/RyanSyaaw">
                    <div class="flex mt-5 underline">
                        <img src="{{asset('img/vector.svg')}}" class="w-8 h-8" alt="">
                        <p class="ml-5 mt-1 text-lg">https://github.com/RyanSyaaw</p>
                    </div>
                </a>
                <a href="https://github.com/Zakyzuf">
                    <div class="flex mt-5 underline">
                        <img src="{{asset('img/vector.svg')}}" class="w-8 h-8" alt="">
                        <p class="ml-5 mt-1 text-lg">https://github.com/zakyzuf</p>
                    </div>
                </a>
                <a href="">
                    <div class="flex mt-5 underline">
                        <img src="{{asset('img/vector.svg')}}" class="w-8 h-8" alt="">
                        <p class="ml-5 mt-1 text-lg">https://github.com/andidprastyo</p>
                    </div>
                </a>
            </div>
        </div>
    </div>
  </div>
</footer>
<script src="{{ asset('js/script.js') }}" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
<script>
  function pindahKeHalaman(selectElement) {
    var selectedValue = selectElement.value;
    console.log(selectedValuep);
    if (selectedValue === "") {
      // Pilihan "Semua Kategori" dipilih, pindahkan ke halaman homepage.blade.php
      window.location.href = "{{ route('produkall') }}";
    } else {
      // Pilihan lain yang dipilih, submit form (misalnya untuk filter berdasarkan kategori)
      selectElement.form.submit();
    }
  }
</script>
</body>

</html>

