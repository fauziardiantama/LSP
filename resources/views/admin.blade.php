@extends('layouts.app') <!-- Menggunakan layout dari file app.blade.php -->

@section('title', 'Admin') <!-- Mengatur judul halaman menjadi "Admin" -->

@section('content') <!-- Mengisi bagian konten dari layout -->
    <main class="container">
        @if (session('success'))
            <!-- Jika ada pesan sukses -->
            <div class="alert alert-success">
                {{ session('success') }} <!-- Menampilkan pesan sukses -->
            </div>
        @endif

        @if (session('error'))
            <!-- Jika ada pesan error -->
            <div class="alert alert-danger">
                {{ session('error') }} <!-- Menampilkan pesan error -->
            </div>
        @endif

        <div class="card mb-5">
            <div class="card-header">
                @if (request()->has('edit'))
                    <!-- Jika ada request 'edit' -->
                    Edit Mahasiswa <!-- Judul form menjadi "Edit Mahasiswa" -->
                @else
                    Tambah Mahasiswa <!-- Judul form menjadi "Tambah Mahasiswa" -->
                @endif
            </div>
            <div class="card-body">
                @if (request()->has('edit'))
                    <!-- Jika ada request 'edit' -->
                    <form action="{{ route('mahasiswa.update', request('edit')) }}" method="POST">
                        <!-- Form untuk update mahasiswa -->
                        @method('PUT')
                    @else
                        <form action="{{ route('mahasiswa.store') }}" method="POST"> <!-- Form untuk tambah mahasiswa -->
                @endif
                @csrf <!-- CSRF token untuk keamanan form -->
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="nim" class="form-label">NIM</label>
                        <input type="text" class="form-control @error('nim') is-invalid @enderror" id="nim" placeholder="NIM"
                            name="nim" value="{{ $mahasiswa->nim ?? old('nim') }}"
                            {{ request()->has('edit') ? 'readonly' : '' }}>
                        @error('nim')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" placeholder="Nama"
                            name="nama" value="{{ $mahasiswa->nama ?? old('nama') }}">
                        @error('nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="mb-3">
                    <label for="alamat" class="form-label">Alamat</label>
                    <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="alamat" nama="alamat">{{ $mahasiswa->alamat ?? old('alamat') }}</textarea>
                    @error('alamat')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                    <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" placeholder="Tanggal Lahir"
                        name="tgl_lahir" value="{{ $mahasiswa->tgl_lahir ?? old('tgl_lahir') }}" max="{{ now()->format('Y-m-d') }}">
                    @error('tgl_lahir')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="gender" class="form-label">Gender</label>
                        <select class="form-select @error('gender') is-invalid @enderror" id="gender" name="gender">
                            <option value="L"
                                {{ (isset($mahasiswa) && $mahasiswa->gender == 'L') || old('gender') == 'L' ? 'selected' : '' }}>
                                Laki-laki</option>
                            <option value="P"
                                {{ (isset($mahasiswa) && $mahasiswa->gender == 'P') || old('gender') == 'P' ? 'selected' : '' }}>
                                Perempuan</option>
                        </select>
                        @error('gender')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="usia" class="form-label">Usia</label>
                        <input type="number" class="form-control @error('usia') is-invalid @enderror" id="usia" placeholder="Usia"
                            name="usia" value="{{ $mahasiswa->usia ?? old('usia') }}">
                        @error('usia')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">{{ request()->has('edit') ? 'Update' : 'Tambah' }}</button>
                <!-- Tombol submit form -->
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Informasi Mahasiswa <!-- Judul kartu -->
            </div>
            <div class="card-body">
                <table class="table"> <!-- Tabel informasi mahasiswa -->
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">NIM</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Tanggal Lahir</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Usia</th>
                            <th scope="col">Action</th> <!-- Kolom aksi (edit dan delete) -->
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($mahasiswas as $mhs)
                            <!-- Looping data mahasiswa -->
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th> <!-- Menampilkan nomor urut -->
                                <td>{{ $mhs->nim }}</td> <!-- Menampilkan NIM mahasiswa -->
                                <td>{{ $mhs->nama }}</td> <!-- Menampilkan nama mahasiswa -->
                                <td>{{ $mhs->alamat }}</td> <!-- Menampilkan alamat mahasiswa -->
                                <td>{{ $mhs->tgl_lahir }}</td> <!-- Menampilkan tanggal lahir mahasiswa -->
                                <td>{{ $mhs->gender }}</td> <!-- Menampilkan gender mahasiswa -->
                                <td>{{ $mhs->usia }}</td> <!-- Menampilkan usia mahasiswa -->
                                <td>
                                    <!-- Tombol edit -->
                                    <a href="{{ route('admin', [
                                        'edit' => $mhs->id,
                                    ]) }}"
                                        class="btn btn-warning">Edit</a>

                                    <!-- Form delete -->
                                    <form action="{{ route('mahasiswa.destroy', $mhs->id) }}" method="POST"
                                        style="display: inline;">
                                        @csrf <!-- CSRF token untuk keamanan form -->
                                        @method('DELETE') <!-- Menggunakan metode DELETE -->
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                        <!-- Tombol submit form delete -->
                                    </form>
                                </td>
                            </tr>
                        @empty <!-- Jika tidak ada data -->
                            <tr>
                                <td colspan="7" class="text-center">Tidak ada data</td>
                                <!-- Menampilkan pesan "Tidak ada data" -->
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </main>
@endsection
