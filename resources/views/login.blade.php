@extends('layout.auth')
    @section('content')
    <div class="container mt-20 mx-auto py-6 px-6 max-w-3xl lg:max-w-xl border rounded-lg">
        <div class="mb-6 justify-center">
          <h1 class="text-center text-2xl">Sign In</h1>
        </div>
        <form class="justify-center mt-auto mb-auto px-4 py-6 h-400" method="POST" action="{{ route('login') }}">
          @csrf
        <div class="mb-6">
          <label for="email" class="block mb-2 text-sm font-medium text-gray-900/50 dark:text-white">Email</label>
          <input type="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="" required autofocus>
        </div>
        <div class="mb-6">
          <label for="password" class="flex justify-between mb-2 text-sm font-medium text-gray-900/50 dark:text-white">
            Password <button type="button" id="btnshow" onclick="showPassword(), changetext()"><i style="font-size: 16px" class='bx bxs-show'></i></button>
          </label>
          <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control @error('password') is-invalid @enderror" name="password" autocomplete="current-password" placeholder="" required>
        </div>
        <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-full sm:w-full px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
        <div class="flex items-start mb-4 justify-center mt-2">
          <p class="text-gray-900 dark:text-gray-300">By continouing, you agree to the <a href="" class="underline underline-offset-4 text-gray-900/50 dark:text-gray-300">Terms of Use</a> and <a href="" class="underline underline-offset-4 text-gray-900/50 dark:text-gray-300">Privacy Policy.</a></p>
        </div>
        <div class="flex justify-between text-gray-900 underline underline-offset-4 mt-10 mr-5 ml-5 dark:text-gray-300">
            <a href="">Other issue with sign in</a> <a href="">Forget your password</a>
        </div>
        <h2 class="text-center my-3 text-xl text-gray-900/50 dark:text-gray-300">or</h2>
        <div class=" text-center">
            <a href="{{ route('register') }}" class="{{(Route::currentRouteName() == 'register') }}" class="text-xl text-gray-900/50 dark:text-gray-300 underline underline-offset-4">Create new account</a>
        </div>
      </form>
    </div>
    <script src="{{asset('js/script.js')}}" type="text/javascript"></script>

    @endsection
