<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswas;
use Illuminate\Http\Request;

class Mahasiswa extends Controller
{
    // Menampilkan seluruh data mahasiswa
    public function index()
    {
        $mahasiswa = Mahasiswas::all();

        return view('index', compact('mahasiswa'));
    }

    // Menambahkan data mahasiswa
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
        ]);

        Mahasiswas::create($request->only([
            'nama',
            'jenis_kelamin',
            'alamat',
            'no_hp'
        ]));

        return redirect('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil ditambahkan.');
    }

    // Membuka halaman edit
    public function edit($id)
    {
        $mahasiswa = Mahasiswas::findOrFail($id);

        return view('edit', compact('mahasiswa'));
    }

    // Menyimpan perubahan data
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'alamat' => 'required|string',
            'no_hp' => 'required|string|max:20',
        ]);

        $mahasiswa = Mahasiswas::findOrFail($id);

        $mahasiswa->update($request->only([
            'nama',
            'jenis_kelamin',
            'alamat',
            'no_hp'
        ]));

        return redirect('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil diubah.');
    }

    // Menghapus data mahasiswa
    public function destroy($id)
    {
        $mahasiswa = Mahasiswas::findOrFail($id);

        $mahasiswa->delete();

        return redirect('/mahasiswa')
            ->with('success', 'Data mahasiswa berhasil dihapus.');
    }
}