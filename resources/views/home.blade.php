@extends('layouts.app')
  
@section('title', 'Home')

@section('content')
        <main class="container">
            <div class="row mb-5">
                <div class="col-4"> 
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <div class="media d-flex">
                                        <div class="align-self-center text-success">
                                                <i class="fas fa-graduation-cap fa-2x" style="margin-right: 10px;"></i>
                                        </div>
                                        <div class="media-body text-right">
                                                <h3>{{ $total }}</h3>
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
                                                <i class="fas fa-mars fa-2x" style="margin-right: 10px;"></i>
                                        </div>
                                        <div class="media-body text-right">
                                                <h3>{{ $totalMale }}</h3>
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
                                                <i class="fas fa-venus fa-2x" style="margin-right: 10px;"></i>
                                        </div>
                                        <div class="media-body text-right">
                                                <h3>{{ $totalFemale }}</h3>
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
                    <p>Informasi Mahasiswa</p>
                        <form action="{{ route('home') }}" method="GET">
                            
                    <div class="input-group mb-3">
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search" name="search" value="{{ request('search') }}">
                                <div class="input-group-append">
                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">
                                        <!-- font awesome search icon -->
                                        <i class="fas fa-search"></i>
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