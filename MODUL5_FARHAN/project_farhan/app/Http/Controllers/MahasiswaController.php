<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Dosen;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::with('dosen')->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'nim' => 'required|string|max:255',
            'nama_mahasiswa' => 'required|string|max:255',
            'email' => 'required|email',
            'jurusan' => 'required|string|max:255',
            'dosen_id' => 'required'
        ]);

        Mahasiswa::create($validatedData);

        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil ditambahkan');
    }


    public function create()
    {
        $dosen = Dosen::all();
        return view('mahasiswa.create', compact('dosen'));
    }

    public function show(Mahasiswa $mahasiswa)
    {
        $nav = 'Detail Mahasiswa';
        return view('mahasiswa.show', compact('mahasiswa', 'nav'));
    }

    public function update(Request $request, Mahasiswa $mahasiswa)
    {
        $validatedData = $request->validate([
            'nim' => 'required|string|max:255',
            'nama_mahasiswa' => 'required|string|max:255',
            'email' => 'required|email',
            'jurusan' => 'required|string|max:255',
            'dosen_id' => 'required'
        ]);
        $mahasiswa->update($validatedData);
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil diubah');
    }

    public function destroy(Mahasiswa $mahasiswa)
    {
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index')->with('success', 'Data mahasiswa berhasil dihapus');
    }
}

