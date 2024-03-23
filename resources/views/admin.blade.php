@extends('layouts.app')

@section('title', 'Admin')

@section('content')
    <main class="container">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        {{-- Make form nice --}}
        <div class="card mb-5" style="background-color: #b7b7b7;">
            <div class="card-header">
                {{-- Check if edit is set --}}
                @if (request()->has('edit'))
                    Edit Mahasiswa
                @else
                    Tambah Mahasiswa
                @endif
            </div>
            <div class="card-body">
                {{-- Check if edit is set --}}
                @if (request()->has('edit'))
                    <form action="{{ route('mahasiswa.update', request('edit')) }}" method="POST">
                        @method('PUT')
                @else
                    <form action="{{ route('mahasiswa.store') }}" method="POST">
                @endif
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nim" class="form-label">NIM</label>
                            <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" name="nim" value="{{ $mahasiswa->nim ?? old('nim') }}" {{ request()->has('edit') ? 'readonly' : '' }}>
                            @error('nim')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ $mahasiswa->nama ?? old('nama') }}">
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ $mahasiswa->alamat ?? old('alamat') }}</textarea>
                        @error('alamat')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ $mahasiswa->tgl_lahir ?? old('tgl_lahir') }}">
                        @error('tgl_lahir')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gender" class="form-label">Gender</label>
                            <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                                <option value="L" {{ (isset($mahasiswa) && $mahasiswa->gender == 'L') || old('gender') == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                <option value="P" {{ (isset($mahasiswa) && $mahasiswa->gender == 'P') || old('gender') == 'P' ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="usia" class="form-label">Usia</label>
                            <input type="number" class="form-control @error('usia') is-invalid @enderror" id="usia" name="usia" value="{{ $mahasiswa->usia ?? old('usia') }}">
                            @error('usia')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">{{ request()->has('edit') ? 'Update' : 'Tambah' }}</button>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Informasi Mahasiswa
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Usia</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        {{-- You can loop through your data here --}}
                        @forelse ($mahasiswas as $mhs)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $mhs->nim }}</td>
                                <td>{{ $mhs->nama }}</td>
                                <td>{{ $mhs->alamat }}</td>
                                <td>{{ $mhs->tgl_lahir }}</td>
                                <td>{{ $mhs->gender }}</td>
                                <td>{{ $mhs->usia }}</td>
                                <td>
                                    <!-- Edit Button -->
                                    <a href="{{ route('admin', [
                                        "edit" => $mhs->id
                                        ]) }}" class="btn btn-warning">Edit</a>

                                    <!-- Delete Form -->
                                    <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
