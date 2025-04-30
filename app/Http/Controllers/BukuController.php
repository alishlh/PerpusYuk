<?php

namespace App\Http\Controllers;

use App\Models\BukuModel;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    function index()
    {
        $buku = BukuModel::all();
        return view('admin.buku.buku', ['buku' => $buku]);
    }
    function create()
    {
        return view('admin.buku.create');
    }
    public function store(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'buku' => 'required|string|max:255',
            'kategory' => 'required|in:fiksi,non-fiksi,agama,karya ilmiyah',
            'stok' => 'required|integer|min:0',
        ]);

        try {
            // Membuat record baru
            BukuModel::create([
                'buku' => $validatedData['buku'], // Sesuaikan dengan nama kolom di database
                'kategory' => $validatedData['kategory'],
                'stok' => $validatedData['stok'],
            ]);

            return redirect()->route('admin.buku')
                ->with('success', 'Buku berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menambahkan buku: ' . $e->getMessage());
        }
    }


    function edit($id)
    {
        $buku = BukuModel::findOrFail($id);
        return view('admin.buku.edit', ['buku' => $buku]);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'buku' => 'required',
            'kategory' => 'required',
            'stok' => 'required'
        ]);

        $buku = BukuModel::find($id);
        if (!$buku) {
            return redirect()->back()->with('status', 'Data tidak  ditemukan.');
        }

        $buku->buku = $validated['buku'];
        $buku->kategory = $validated['kategory'];
        $buku->stok = $validated['stok'];
        $buku->save();

        return redirect()->route('admin.buku')->with('status', 'Data anda telah berhasil diperbaharui');
    }
    public function delete(string $id)
    {
        $buku = BukuModel::findOrFail($id);
        $buku->delete();
        return redirect()->route('admin.buku');
    }
}
