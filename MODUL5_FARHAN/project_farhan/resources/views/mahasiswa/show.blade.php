@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Detail Mahasiswa</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>NIM:</strong> {{ $mahasiswa->nim }}
        </div>
        <div class="mb-3">
            <strong>Nama:</strong> {{ $mahasiswa->nama_mahasiswa }}
        </div>
        <div class="mb-3">
            <strong>Email:</strong> {{ $mahasiswa->email }}
        </div>
        <div class="mb-3">
            <strong>No Telepon:</strong> {{ $mahasiswa->jurusan }}
        </div>
        <div class="mb-3">
            <strong>Dosen Pembimbing:</strong> {{ $mahasiswa->dosen->nama_dosen }}
        </div>
        <a href="{{ route('mahasiswa.edit', $mahasiswa) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('mahasiswa.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>
@endsection
