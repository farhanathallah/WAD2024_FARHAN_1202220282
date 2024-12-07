@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Detail Dosen</h5>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <strong>Kode Dosen:</strong> {{ $dosen->kode_dosen }}
        </div>
        <div class="mb-3">
            <strong>Nama:</strong> {{ $dosen->nama_dosen }}
        </div>
        <div class="mb-3">
            <strong>NIP:</strong> {{ $dosen->nip }}
        </div>
        <div class="mb-3">
            <strong>Email:</strong> {{ $dosen->email }}
        </div>
        <div class="mb-3">
            <strong>No Telepon:</strong> {{ $dosen->no_telepon }}
        </div>
        <a href="{{ route('dosen.edit', $dosen) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('dosen.index') }}" class="btn btn-secondary">Back</a>
    </div>
</div>

<!-- List of Mahasiswa under this Dosen -->
<div class="card mt-4">
    <div class="card-header">
        <h5 class="mb-0">Mahasiswa List</h5>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>NIM</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dosen->mahasiswa as $mahasiswa)
                    <tr>
                        <td>{{ $mahasiswa->nim }}</td>
                        <td>{{ $mahasiswa->nama_mahasiswa }}</td>
                        <td>{{ $mahasiswa->email }}</td>
                        <td>{{ $mahasiswa->no_telepon }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
