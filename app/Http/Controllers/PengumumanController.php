<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman; // Import model Pengumuman
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengumuman = Pengumuman::latest()->get(); // Mengambil semua pengumuman, terbaru di atas
        return view('pengumuman.index', compact('pengumuman'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pengumuman.create');
    }

    /**
     * Store a newly created resource in storage.
     */

     public function store(Request $request)
     {
         $request->validate([
             'judul' => 'required|string|max:255',
             'tanggal' => 'required|date',
             'isi' => 'required|string',
         ]);
     
         Pengumuman::create($request->all());
     
         return redirect()->route('pengumuman.index')->with('success', 'Pengumuman berhasil ditambahkan.');
     }
     

    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'judul' => 'required',
    //         'isi' => 'required',
    //         'tanggal' => 'required|date',
    //     ]);

    //     Pengumuman::create($request->all());

    //     return redirect()->route('admin.pengumuman.index')
    //                      ->with('success', 'Pengumuman berhasil ditambahkan.');
    // }

    /**
     * Display the specified resource.
     */
    public function show(Pengumuman $pengumuman)
    {
        return view('pengumuman.show', compact('pengumuman'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pengumuman $pengumuman)
    {
        return view('pengumuman.edit', compact('pengumuman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pengumuman $pengumuman)
    {
        $request->validate([
            'judul' => 'required',
            'isi' => 'required',
            'tanggal' => 'required|date',
        ]);

        $pengumuman->update($request->all());


                         return redirect()->route('pengumuman.index')
                         ->with('success', 'Pengumuman berhasil diperbarui.');
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pengumuman $pengumuman)
    {
        $pengumuman->delete();

        return redirect()->route('pengumuman.index')
                         ->with('success', 'Pengumuman berhasil dihapus.');
    }
}