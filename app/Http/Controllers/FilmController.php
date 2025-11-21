<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    public function index()
    {
        $film = Film::all();
        return view('film.index', compact('film'));
    }

    public function create()
    {
        return view('film.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'judul' => 'required',
            'genre' => 'required',
            'tahun' => 'required|numeric',
            'deskripsi' => 'nullable',
            'poster' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);


        $poster = null;
        if ($request->hasFile('poster')) {
            $poster = time() . '_' . $request->poster->getClientOriginalName();
            $request->poster->move(public_path('poster'), $poster);
        }


        Film::create([
            'judul' => $request->judul,
            'genre' => $request->genre,
            'tahun' => $request->tahun,
            'deskripsi' => $request->deskripsi,
            'poster' => $poster
        ]);

        return redirect()->route('film.index')->with('success', 'Film berhasil ditambahkan!');
    }

    public function edit(Film $film)
    {
        return view('film.edit', compact('film'));
    }

    public function update(Request $request, Film $film)
    {
        $request->validate([
            'judul' => 'required',
            'genre' => 'required',
            'tahun' => 'required|numeric',
            'deskripsi' => 'nullable',
            'poster' => 'image|mimes:jpg,png,jpeg|max:2048'
        ]);

        $poster = $film->poster;

        if ($request->hasFile('poster')) {
            $poster = time() . '_' . $request->poster->getClientOriginalName();
            $request->poster->move(public_path('poster'), $poster);
        }

        $film->update([
            'judul' => $request->judul,
            'genre' => $request->genre,
            'tahun' => $request->tahun,
            'deskripsi' => $request->deskripsi,
            'poster' => $poster
        ]);

        return redirect()->route('film.index')->with('success', 'Film berhasil diperbarui!');
    }

    public function destroy(Film $film)
    {
        $film->delete();
        return redirect()->route('film.index')->with('success', 'Film berhasil dihapus!');
    }
}
