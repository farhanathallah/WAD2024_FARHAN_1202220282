@extends('layouts.app')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Data Dosen</h5>
        <a href="{{ route('dosen.create') }}" class="btn btn-primary">Tambah Dosen</a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Dosen</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Email</th>
                        <th>No Telepon</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($dosens as $dosen)
                    <tr>
                        <td>{{ $dosen->kode_dosen }}</td>
                        <td>{{ $dosen->nama_dosen }}</td>
                        <td>{{ $dosen->nip }}</td>
                        <td>{{ $dosen->email }}</td>
                        <td>{{ $dosen->no_telepon }}</td>
                        <td>
                            <a href="{{ route('dosen.show', $dosen) }}" class="btn btn-info btn-sm">View</a>
                            <a href="{{ route('dosen.edit', $dosen) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('dosen.destroy', $dosen) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
