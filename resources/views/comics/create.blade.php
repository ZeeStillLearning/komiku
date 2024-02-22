@extends("layouts.app")

@section('content')
<div class="flex flex-col mx-10 mt-5 bg-index">
    <h1 class="text-3xl font-bold mb-6 text-slate-300 text-center">Add Comic</h1>
    <form action="{{ route("comics.store") }}" method="POST" class="w-full max-w-lg mx-auto" enctype="multipart/form-data">
        @csrf
        <div class="mb-4">
            <label class="block text-gray-200 font-bold mb-2" for="title">
                Judul
            </label>
            <input class="shadow appearance-none border rounded lg:w-full w-4/5 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="title" type="text" placeholder="Masukkan judul komik" name="title">
            @error('title')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-200 font-bold mb-2" for="author">
                Penulis
            </label>
            <input class="shadow appearance-none border rounded lg:w-full w-4/5 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="author" type="text" placeholder="Masukkan nama penulis" name="author">
            @error('author')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-200 font-bold mb-2" for="publisher">
                Penerbit
            </label>
            <input class="shadow appearance-none border rounded lg:w-full w-4/5 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="publisher" type="text" placeholder="Masukkan nama penerbit" name="publisher">
            @error('publisher')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-4">
            <label class="block text-gray-200 font-bold mb-2" for="description">
                Deskripsi
            </label>
            <textarea class="shadow appearance-none border rounded lg:w-full w-4/5 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="description" type="text" placeholder="Masukkan deskripsi komik" name="description">{{ $comic->description }}</textarea>
            @error('description')
            <p class="text-red-500 text-xs italic">{{ $message }}</p>
            @enderror
        </div>
        <div class="form-group">
            <label class="text-gray-200 font-bold mb-2" for="image">Image :</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="flex items-center justify-between mt-5">
            <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mb-4 md:mb-0" type="submit">
                Simpan
            </button>
            <a href="{{ route('comics.index') }}" class="bg-gray-400 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline mt-0">
                Kembali
            </a>
        </div>
    </form>
</div> 
@endsection