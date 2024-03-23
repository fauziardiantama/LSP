@extends('layouts.app')
  
@section('title', 'Home')

@section('content')
        <main class="container">

            <div class="row mb-3">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            Total: {{ $total }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            Total Laki-Laki: {{ $totalMale }}
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            Total Perempuan: {{ $totalFemale }}
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="card">
                <div class="card-header">
                    <p>Informasi Mahasiswa</p>
                        <form action="{{ route('home') }}" method="GET">
                            
                    <div class="input-group mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                        <i class="bi bi-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                        </form>
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
        {{-- <main class="container">
            <h1>Home</h1>
            <div class="card">
              <div class="card-header">
                Icons
              </div>
              <div class="card-body text-center">
                    <i class="bi bi-bag-heart-fill"></i>
                    <i class="bi bi-app"></i>
                    <i class="bi bi-arrow-right-square-fill"></i>
                    <i class="bi bi-bag-check-fill"></i>
                    <i class="bi bi-calendar-plus-fill"></i>
              </div>
            </div>
        </main> --}}
@endsection