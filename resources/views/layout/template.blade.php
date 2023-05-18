<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class=" bg-white">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>
    <script src="https://kit.fontawesome.com/e5c96fca62.js" crossorigin="anonymous"></script>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
@vite(['resources/css/app.css','resources/js/app.js'])
</head>

<body class="antialiased flex flex-col ">

<nav class="bg-amber-400 h-24 border-gray-200 dark:bg-gray-900 dark:border-gray-700">
  <div class="max-w-screen-xl flex flex-wrap items-center mx-auto my-auto">
    <a href="#" class="flex items-center ml-20 mt-6">
      <span class="self-center text-4xl font-semibold whitespace-nowrap" style="color: #00a8c8">Loka</span>
      <span class="self-center text-4xl font-semibold whitespace-nowrap dark:text-white">Mart</span>
    </a>
    <button data-collapse-toggle="navbar-dropdown" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-dropdown" aria-expanded="false">
      <span class="sr-only">Open main menu</span>
      <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path></svg>
    </button>
    <div class="hidden w-full md:block md:w-auto" id="navbar-dropdown">
      <ul class="flex flex-col font-medium p-4 md:p-0 mt-6 ml-32  border border-gray-100 drop-shadow-xl rounded-lg bg-gray-50 md:flex-row md:space-x-8  md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
        <li>
            <button id="dropdownNavbarLink" data-dropdown-toggle="dropdownNavbar" class="flex items-center text-xl justify-between w-full py-2 px-5 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:px-5 md:py-2 md:w-auto dark:text-white md:dark:hover:text-blue-500 dark:focus:text-white dark:border-gray-700 dark:hover:bg-gray-700 md:dark:hover:bg-transparent">All Categories <svg class="w-5 h-5 ml-1" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg></button>
            <!-- Dropdown menu -->
            <div id="dropdownNavbar" class="z-10 w-48 hidden font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600">
                <ul class="py-2  text-xl text-gray-700 dark:text-gray-400" aria-labelledby="dropdownLargeButton">
                  <li>
                    <a href="#" class="block text-xl px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Foods</a>
                  </li>
                  <li>
                    <a href="#" class="block text-xl px-5 py-2 hover:bg-gray-100 dark:hover:bg-gray-600 dark:hover:text-white">Drinks</a>
                  </li>
                </ul>
            </div>
        </li>
      </ul>
    </div>
    <div class="mt-6 ml-10">
      <form>
        <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
        <div class="relative">
            <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
            </div>
            <input type="search" id="default-search" class="block w-96 h-12 p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Search..." required>
        </div>
      </form>
    </div>
    <div class="flex">
      <div class="ml-20 mt-5">
        <a href=""><img src="{{asset('img/heart.svg')}}" alt=""></a>
      </div>
      <div class="ml-8 mt-5">
        <a href=""><img src="{{asset('img/shopping-cart.svg')}}" alt=""></a>
      </div>
      <div class="ml-8 mt-5">
        <a href=""><img src="{{asset('img/profile-circle.svg')}}" alt=""></a>
      </div>
    </div>
  </div>
</nav>
<nav class="bg-white h-14 border-y-2 pt-2 border-gray-200">
  <div class="max-w-screen-xl flex flex-wrap items-center justify-center mx-auto my-auto">
    <div class="ml-9 text-2xl" style="color: #00a8c8">
      <a href="">Home</a>
    </div>
    <div class="ml-9 text-2xl" style="color: #00a8c8">
      <a href="">Shop</a>
    </div>
    <div class="ml-9 text-2xl" style="color: #00a8c8">
      <a href="">About</a>
    </div>
    <div class="ml-9 text-2xl" style="color: #00a8c8">
      <a href="">Owner UMKM</a>
    </div>
    <div class="ml-9 text-2xl" style="color: #00a8c8">
      <a href="">Seller Centre</a>
    </div>
    <div class="ml-9 text-2xl" style="color: #00a8c8">
      <a href="">Terms & Conditions</a>
    </div>
    <div class="ml-9">
      <a href=""><img src="{{asset('img/instagram.svg')}}" alt=""></a>
    </div>
    <div class="ml-9">
      <a href=""><img src="{{asset('img/facebook.svg')}}" alt=""></a>
    </div>
  </div>
</nav>

    @yield('content')


</body>

</html>