<?php

namespace App\Http\Controllers;

use App\Models\Book as BookModel;
use Illuminate\Http\Request;

class Book extends Controller
{
    public function index()
    {
        $books = BookModel::all();

        return view('books.index', ['books' => $books]);
    }

    public function store(Request $request)
    {
        BookModel::create([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'stock' => $request->stock,
        ]);

        return redirect('/books')
            ->with('success', 'Buku berhasil ditambahkan!');
    }

    public function update(Request $request)
    {
        $book = BookModel::findOrFail($request->id);

        $book->update([
            'title' => $request->title,
            'author' => $request->author,
            'publisher' => $request->publisher,
            'stock' => $request->stock,
        ]);

        return redirect('/books')
            ->with('success', 'Buku berhasil diubah!');
    }

    public function destroy($id)
    {
        $book = BookModel::findOrFail($id);
        $book->delete();

        return redirect('/books')
            ->with('success', 'Buku berhasil dihapus!');
    }
}
