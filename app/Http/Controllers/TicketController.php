<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tickets = Ticket::paginate(5);
    
        // Mengembalikan tampilan 'ticket.index' kepada pengguna,
        // dan menyertakan data tiket dalam bentuk variabel $tickets
        return view('ticket.index', compact('tickets'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengembalikan tampilan 'ticket.add' kepada pengguna,
        // yang digunakan untuk menampilkan formulir penambahan tiket baru
        return view('ticket.add');
    }
    

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama_wisata' => 'required|unique:tickets,nama_wisata',
            'harga_ticket' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        // Ambil semua data yang divalidasi
        $validated = $request->all();
    
        // Jika terdapat file gambar dalam request
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            // Buat nama acak untuk gambar dengan panjang 20 karakter
            $namaGambar = Str::random(20).'.'.$gambar->getClientOriginalExtension();
            // Pindahkan gambar ke folder yang ditentukan dengan nama yang baru
            $filePath = 'gambar_tickets/' . $namaGambar;
            $gambar->move(public_path('gambar_tickets'), $namaGambar);
            // Set path gambar ke dalam data yang divalidasi
            $validated['gambar'] = $filePath;
        }
    
        // Buat entri baru dalam database menggunakan data yang divalidasi
        Ticket::create($validated);
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('ticket.index')->with('success', 'Ticket created successfully.');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Mengambil tiket dari database berdasarkan ID yang diberikan
        $ticket = Ticket::find($id);
    
        // Mengembalikan view 'ticket.show' dan menyertakan data tiket ke dalamnya
        return view('ticket.show', compact('ticket'));
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Mengambil tiket dari database berdasarkan ID yang diberikan
        $ticket = Ticket::find($id);
    
        // Mengembalikan view 'ticket.edit' dan menyertakan data tiket ke dalamnya
        return view('ticket.edit', compact('ticket'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi input
        $request->validate([
            'nama_wisata' => 'required|unique:tickets,nama_wisata,' . $id,
            'harga_ticket' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);
    
        // Temukan tiket yang akan diperbarui
        $ticket = Ticket::find($id);
        
        // Ambil semua data yang divalidasi
        $validated = $request->all();
    
        // Jika ada gambar yang diunggah
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($ticket->gambar) {
                $oldImagePath = public_path($ticket->gambar);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
    
            // Pindahkan gambar yang baru diunggah ke folder yang ditentukan
            $gambar = $request->file('gambar');
            $filePath = 'gambar_tickets/' . time() . '_' . $gambar->getClientOriginalName();
            $gambar->move(public_path('gambar_tickets'), $filePath);
            $validated['gambar'] = $filePath;
        } else {
            // Jika tidak ada gambar baru diunggah, hapus data gambar dari array yang divalidasi
            unset($validated['gambar']);
        }
    
        // Perbarui tiket dengan data yang divalidasi
        $ticket->update($validated);
    
        // Redirect ke halaman index dengan pesan sukses
        return redirect()->route('ticket.index')->with('success', 'Ticket updated successfully.');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Temukan tiket yang akan dihapus
        $ticket = Ticket::find($id);
        
        // Jika tiket memiliki gambar
        if ($ticket->gambar) {
            // Hapus gambar dari penyimpanan
            $oldImagePath = public_path($ticket->gambar);
            if (file_exists($oldImagePath)) {
                unlink($oldImagePath);
            }
        }
    
        // Hapus tiket dari database
        $ticket->delete();
    
        // Redirect ke halaman indeks dengan pesan sukses
        return redirect()->route('ticket.index')->with('success', 'Ticket deleted successfully.');
    }
    
}
