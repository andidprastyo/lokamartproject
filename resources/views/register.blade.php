@extends('layout.auth')

@section('content')
    <form class="container mt-10 mx-auto py-6 px-6 max-w-6xl lg:max-w-4xl border rounded-lg" method="POST" action="{{route('register-in')}}">
        @csrf
        <div class="flex justify-between items-center">
            <div class="flex flex-col">
                <div class="mb-6 justify-center">
                    <h1 class=" text-2xl">Create an account</h1>
                    <p class=" text-sm"> already have account? <a class="underline underline-offset-4" href="">Log in</a></p>
                </div>
                <div class="flex">
                    <div class="mb-6">
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900/50 dark:text-white">
                            Name</label>
                        <input type="text" id="name"
                            class="form-control @error('last-name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus
                            placeholder="" required>
                    </div>
                </div>
                <div class="mb-6 max-w-sm">
                    <label for="email"
                        class="block mb-2 text-sm font-medium text-gray-900/50 dark:text-white">Email</label>
                    <input type="email" id="email"
                        class="form-control @error('last-name') is-invalid @enderror bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="" required>
                </div>
                <div class="flex">
                    <div class="mb-2">
                        <label for="password"
                            class="flex justify-between mb-2 text-sm font-medium text-gray-900/50 dark:text-white">
                            Password <button type="button" id="btnshow" onclick="showPassword(), changetext()"><i
                                    style="font-size: 16px" class='bx bxs-show'></i></button>
                        </label>
                        <input type="password" id="password"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                    </div>
                    <div class="mb-2 ml-6">
                        <label for="confirm-password"
                            class="flex justify-between mb-2 text-sm font-medium text-gray-900/50 dark:text-white">
                            Confirm password <button type="button" id="btnshowconf" onclick="showConfPassword(), changeconftext()"><i
                                    style="font-size: 16px" class='bx bxs-show'></i></button>
                        </label>
                        <input type="password" id="confirm-password"
                            class="form-control bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" name="password_confirmation"
                            required autocomplete="new-password">
                    </div>
                    <input type="hidden" name="role" value="user">
                </div>
            </div>
            <div class="max-w-[50%]">
                <img class="item-right" src="{{ asset('img/vector-regis.jpg') }}" alt="">
            </div>
        </div>
        <p class="mb-6 text-sm"> Use 8 or more character with a mix of letters, numbers & symbols</p>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-full text-sm w-64 sm:w-64 px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 my-6">Submit</button>
    </form>

    <script>

    </script>
@endsection
