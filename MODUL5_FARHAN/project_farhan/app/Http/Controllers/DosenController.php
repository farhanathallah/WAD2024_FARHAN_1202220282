<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    public function index()
    {
        $dosens = Dosen::all();
        $nav = 'Dosen';

        return view('dosen.index', compact('dosens', 'nav'));
    }

    public function create()
    {
        $nav = 'Tambah Dosen';
        return view('dosen.create', compact('nav'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'kode_dosen' => 'required',
            'nama_dosen' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'no_telepon' => 'required',
        ]);

        Dosen::create($validatedData);

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil ditambahkan');
    }

    public function show(Dosen $dosen)
    {
        $nav = 'Detail Dosen';
        return view('dosen.show', compact('dosen', 'nav'));
    }

    public function edit(Dosen $dosen)
    {
        $nav = 'Edit Dosen';
        return view('dosen.edit', compact('dosen', 'nav'));
    }

    public function update(Request $request, Dosen $dosen)
    {
        $validatedData = $request->validate([
            'kode_dosen' => 'required',
            'nama_dosen' => 'required',
            'nip' => 'required',
            'email' => 'required',
            'no_telepon' => 'required',
        ]);

        $dosen->update($validatedData);

        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil diubah');
    }

    public function destroy(Dosen $dosen)
    {
        $dosen->delete();
        return redirect()->route('dosen.index')->with('success', 'Data dosen berhasil dihapus');
    }
}
