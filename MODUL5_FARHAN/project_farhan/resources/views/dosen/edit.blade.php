@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Dosen</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('dosen.update', $dosen) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="kode_dosen" class="form-label">Kode Dosen</label>
                <input type="text" class="form-control @error('kode_dosen') is-invalid @enderror" id="kode_dosen" name="kode_dosen" value="{{ old('kode_dosen', $dosen->kode_dosen) }}">
                @error('kode_dosen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nama_dosen" class="form-label">Nama Dosen</label>
                <input type="text" class="form-control @error('nama_dosen') is-invalid @enderror" id="nama_dosen" name="nama_dosen" value="{{ old('nama_dosen', $dosen->nama_dosen) }}">
                @error('nama_dosen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nip" class="form-label">NIP</label>
                <input type="text" class="form-control @error('nip') is-invalid @enderror" id="nip" name="nip" value="{{ old('nip', $dosen->nip) }}">
                @error('nip')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $dosen->email) }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="no_telepon" class="form-label">No Telepon</label>
                <input type="text" class="form-control @error('no_telepon') is-invalid @enderror" id="no_telepon" name="no_telepon" value="{{ old('no_telepon', $dosen->no_telepon) }}">
                @error('no_telepon')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection
