<?php

namespace App\Http\Controllers;

use App\Models\Tool;
use Illuminate\Http\Request;

class ToolController extends Controller
{
    public function index()
    {
        $tools = Tool::latest()->get();

        return view('tools.index', compact('tools'));
    }

    public function create()
    {
        return view('tools.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_tool' => 'required|max:100',
            'kategori' => 'required|max:100',
            'deskripsi' => 'required',
            'harga' => 'nullable|max:50',
            'platform' => 'required|max:100',
            'tingkat_kesulitan' => 'required|max:50',
            'website' => 'nullable|url'
        ]);

        Tool::create([
            'nama_tool' => $request->nama_tool,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'platform' => $request->platform,
            'tingkat_kesulitan' => $request->tingkat_kesulitan,
            'website' => $request->website
        ]);

        return redirect()
            ->route('tools.index')
            ->with('success', 'Data tools berhasil ditambahkan.');
    }

    public function edit(Tool $tool)
    {
        return view('tools.edit', compact('tool'));
    }

    public function update(Request $request, Tool $tool)
    {
        $request->validate([
            'nama_tool' => 'required|max:100',
            'kategori' => 'required|max:100',
            'deskripsi' => 'required',
            'harga' => 'nullable|max:50',
            'platform' => 'required|max:100',
            'tingkat_kesulitan' => 'required|max:50',
            'website' => 'nullable|url'
        ]);

        $tool->update([
            'nama_tool' => $request->nama_tool,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'platform' => $request->platform,
            'tingkat_kesulitan' => $request->tingkat_kesulitan,
            'website' => $request->website
        ]);

        return redirect()
            ->route('tools.index')
            ->with('success', 'Data tools berhasil diperbarui.');
    }

    public function destroy(Tool $tool)
    {
        $tool->delete();

        return redirect()
            ->route('tools.index')
            ->with('success', 'Data tools berhasil dihapus.');
    }
}