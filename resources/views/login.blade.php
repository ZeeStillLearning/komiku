@extends('layouts.app')

@section('content')
    <h1>
        @if($errors->any())
            {{ $errors->first() }}
        @endif
    </h1>
    <div class="flex justify-center items-center h-screen">
        <div class="w-full max-w-xs">
            <div class="text-center text-4xl text-slate-100 mb-10 font-extrabold">
                Login
            </div>
            <form class="bg-white shadow-md rounded-3xl px-8 pt-6 pb-8 mb-4" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                        Username
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="username" name="username" placeholder="Username" required autofocus>
                </div>

                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                        Password
                    </label>
                    <input
                        class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="password" type="password" name="password" placeholder="Password" required>
                </div>

                <div class="flex items-center justify-between">
                    <button
                        class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                        type="submit">
                        Sign In
                    </button>
                </div>
                <div class="text-center mt-4">
                    Don't have an account? 
                    <a class="font-bold text-blue-500 hover:text-blue-800" href="{{ route('register') }}">Sign up</a>
                </div>
            </form>
        </div>
    </div>
@endsection
