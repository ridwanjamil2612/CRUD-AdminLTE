<?php

namespace App\Http\Controllers;

use App\Models\ArtikelModel;
use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = ArtikelModel::orderBy('created_at', 'DESC')->get();

        return view('pages.book.index', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.book.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
            'penulis' => 'required',
            'tahun' => 'required',
            'deskripsi' => 'required'
        ], [], [
            'name' => 'Nama Buku',
            'gambar' => 'Upload Gambar',
            'penulis' => 'Penulis',
            'tahun' => 'Tahun',
            'deskripsi' => 'Deskripsi',
        ]);

        $artikel = new ArtikelModel();
        $artikel->name = $request->name;
        $artikel->penulis = $request->penulis;
        $artikel->tahun = $request->tahun;
        $artikel->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('artikel', 'public');
            $artikel->gambar = $path;
        }
        $artikel->save();

        return redirect()->route('book.index')->with('success', 'buku berhasil di tambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $book = ArtikelModel::findOrFail($id);

        return view('pages.book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $book = ArtikelModel::findOrFail($id);

        return view('pages.book.edit', compact('book'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validated = $request->validate([
            'name' => 'required|string',
            'gambar' => 'image|mimes:jpeg,png,jpg|max:2048|nullable',
            'penulis' => 'required',
            'tahun' => 'required',
            'deskripsi' => 'required'
        ], [], [
            'name' => 'Nama Buku',
            'gambar' => 'Upload Gambar',
            'penulis' => 'Penulis',
            'tahun' => 'Tahun',
            'deskripsi' => 'Deskripsi',
        ]);

        $artikel = ArtikelModel::findOrFail($id);
        $artikel->name = $request->name;
        $artikel->penulis = $request->penulis;
        $artikel->tahun = $request->tahun;
        $artikel->deskripsi = $request->deskripsi;

        if ($request->hasFile('gambar')) {
            $path = $request->file('gambar')->store('artikel', 'public');
            if ($artikel->gambar && Storage::disk('public')->exists($artikel->gambar)) {
                Storage::disk('public')->delete($artikel->gambar);
            }
            $artikel->gambar = $path;
        }
        $artikel->save();


        return redirect()->route('book.index')->with('success', 'Book updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book = ArtikelModel::findOrFail($id);
        if ($book->gambar && Storage::disk('public')->exists($book->gambar)) {
            Storage::disk('public')->delete($book->gambar);
        }
        $book->delete();

        return redirect()->route('book.index')->with('success', 'artikel berhasil di hapus');
    }
}
