@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4 bg-index">
    <h1 class="text-3xl py-4 border-b font-extrabold text-neutral-100 text-center">Daftar Komik</h1>
    <div class="flex flex-wrap -mx-4 justify-center">
        @foreach ($comics as $comic)
        <div class="card px-5">
            <a href="{{ route('comics.show', $comic->id) }}">
                <img class="card-img-top w-40 h-52 mt-10 rounded hover:scale-105 overflow-hidden" src="/images/{{ $comic->image }}" alt="{{ $comic->title }}">
            </a>
            <div class="card-body w-44">
                <h5 class="card-title mt-2 font-semibold text-white h-12">{{ $comic->title }}</h5>
                <p class="card-text w-40 h-36 text-slate-300 break-words">{{ Str::limit($comic->description, 90, '....') }}</p>
                <div class="py-4">
                    <a href="{{ route('comics.edit', $comic->id) }}" class="bg-slate-700 text-white font-bold py-2 px-4 rounded hover:bg-slate-950">Edit</a>
                    <form action="{{ route('comics.destroy', $comic->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500  text-white font-bold py-2 px-4 rounded hover:bg-red-700">Hapus</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <a href="{{ route('comics.create') }}" class="float-right bg-slate-700 text-white font-bold py-2 px-4 rounded my-3 hover:bg-black lg:bottom-5 lg:right-10 block lg:fixed">Tambah Komik</a>
</div>
@endsection
