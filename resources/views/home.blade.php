@extends('layouts.app') <!-- Menggunakan layout dari file app.blade.php -->

@section('title', 'Home') <!-- Mengatur judul halaman menjadi "Home" -->

@section('content') <!-- Mengisi bagian konten dari layout -->
    <main class="container">
        <div class="row mb-5">
            <!-- Membuat 3 kartu informasi: Total Mahasiswa, Jumlah Laki-laki, dan Jumlah Perempuan -->
            <div class="col-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center text-success">
                                    <i class="fas fa-graduation-cap fa-2x" style="margin-right: 10px;"></i>
                                    <!-- Ikon topi wisuda -->
                                </div>
                                <div class="media-body text-right">
                                    <h3>{{ $total }}</h3> <!-- Menampilkan total mahasiswa -->
                                    <span>Mahasiswa</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center text-primary">
                                    <i class="fas fa-mars fa-2x" style="margin-right: 10px;"></i> <!-- Ikon laki-laki -->
                                </div>
                                <div class="media-body text-right">
                                    <h3>{{ $totalMale }}</h3> <!-- Menampilkan total mahasiswa laki-laki -->
                                    <span>Laki-laki</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
                            <div class="media d-flex">
                                <div class="align-self-center text-danger">
                                    <i class="fas fa-venus fa-2x" style="margin-right: 10px;"></i> <!-- Ikon perempuan -->
                                </div>
                                <div class="media-body text-right">
                                    <h3>{{ $totalFemale }}</h3> <!-- Menampilkan total mahasiswa perempuan -->
                                    <span>Perempuan</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <p>Informasi Mahasiswa</p> <!-- Judul kartu -->
                <form action="{{ route('home') }}" method="GET"> <!-- Form pencarian mahasiswa -->

                    <div class="input-group mb-3">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search" name="search"
                                value="{{ request('search') }}"> <!-- Input pencarian -->
                            <div class="input-group-append">
                                <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                    <!-- Tombol submit pencarian -->
                                    <!-- Ikon pencarian -->
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
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
                        </tr>
                    </thead>
                    <tbody>
                        {{-- You can loop through your data here --}}
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
