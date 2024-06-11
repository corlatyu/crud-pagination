<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswas = Mahasiswa::paginate(5); // Menampilkan 5 mahasiswa per halaman
        return view('dashboard.index', compact('mahasiswas'));
        
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'nbi' => 'required|unique:mahasiswas,nbi',
        ]);

        // Ambil semua data yang divalidasi
        $validated = $request->all();

        // Buat entri baru dalam database menggunakan data yang divalidasi
        Mahasiswa::create($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::find($id);
        return view('dashboard.edit', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'nbi' => 'required|unique:mahasiswas,nbi,' . $id,
        ]);

        // Temukan mahasiswa yang akan diperbarui
        $mahasiswa = Mahasiswa::find($id);

        // Ambil semua data yang divalidasi
        $validated = $request->all();

        // Perbarui mahasiswa dengan data yang divalidasi
        $mahasiswa->update($validated);

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('mahasiswa.index')->with('success', 'Mahasiswa updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan mahasiswa yang akan dihapus
        $mahasiswa = Mahasiswa::find($id);

        // Hapus mahasiswa dari database
        $mahasiswa->delete();

        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('dashboard.index')->with('success', 'Mahasiswa deleted successfully.');
    }
}
