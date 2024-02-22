<?php

namespace App\Http\Controllers;

use App\Models\Comic;
use Illuminate\Http\Request;

class ComicController extends Controller
{

    public function index()
    {
        $comics = Comic::all();
        return view('comics.index', compact('comics'));
    }


    public function create(Comic $comic)
    {
        return view('comics.create', compact('comic'));
    }


    public function store(Request $request)
    {

        $image = $request->file('image');
        $imageFileName = $this->generateRandomString();
        $image->move(public_path()."/images", $imageFileName);

        $comic = new Comic();
        $comic->title = $request['title'];
        $comic->author = $request['author'];
        $comic->publisher = $request['publisher'];
        $comic->description = $request['description'];
        $comic->image = $imageFileName;
        $comic->save();

        return redirect()->route('comics.index')
                     ->with('success', 'Comic created successfully.');
    }
    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[random_int(0, $charactersLength - 1)];
        }   
        return $randomString;
    }

    public function show(string $id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.show', compact('comic'));
    }

    public function edit(string $id)
    {
        $comic = Comic::findOrFail($id);
        return view('comics.edit', compact('comic'));
    }

    public function update(Request $request, string $id)
    {
        $comic = Comic::where("id", "=", $id);
        $column = [
            "title" => $request->title,
            "author" => $request->author,
            "publisher" => $request->publisher,
            "description" => $request->description
        ];
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageFileName = $this->generateRandomString();
            $image->move(public_path() . "/images", $imageFileName);
            unlink(public_path()."/images/".$comic->first(["image"])->image);
            $column["image"] = $imageFileName;
        }
        $comic->update($column);
        return redirect()->route('comics.index')
                         ->with('success', 'Comic updated successfully.');
    }   

    public function destroy(string $id)
    {
        $comic = Comic::where("id", "=", $id);
        unlink(public_path()."/images".$comic->first(["image"])->image);
        $comic->delete();
        return redirect()->route('comics.index');
    }
}
