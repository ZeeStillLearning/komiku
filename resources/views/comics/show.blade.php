@extends('layouts.app')

@section('content')
    <div class="container mx-auto px-4 pt-16">
        <div class="flex flex-col md:flex-row justify-center">
            <img src="/images/{{ $comic->image }}" alt="{{ $comic->title }}" class="w-64 md:w-96 h-2/3  rounded-xl">

            <div class="md:ml-24 mt-3">
                <h2 class="text-4xl font-semibold text-white">{{ $comic->title }}</h2>

                <p class="my-8 text-cyan-50 w-96">{{ $comic->description }}</p>

                <div class="text-gray-500">
                    <span>Author: {{ $comic->author }}</span>
                    <br>
                    <span>Publisher: {{ $comic->publisher }}</span>
                </div>

                <div class="mt-8">
                    <a href="{{ route('comics.edit', $comic->id) }}" class="bg-slate-700 hover:bg-slate-950 text-white font-semibold py-2 px-4 rounded-md">Edit</a>

                    <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 py-2 px-4 hover:bg-red-700 text-slate-900 font-semibold rounded-md ml-2">Delete</button>
                    </form>
                    <a href="{{ route('comics.index') }}" class="bg-gray-400 hover:bg-gray-500 text-gray-900 font-semibold py-2 px-4 rounded focus:outline-none focus:shadow-outline mx-2">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
