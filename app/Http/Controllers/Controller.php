<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\Mahasiswa;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function index()
    {
        // Mengecek apakah ada query pencarian
        if (request()->has('search')) {
            // Jika ada, maka mencari mahasiswa berdasarkan nama
            $mahasiswas = Mahasiswa::where('nama', 'like', '%' . request('search') . '%')->orderBy('nim','desc')->get();
        } else {
            // Jika tidak, maka menampilkan semua mahasiswa
            $mahasiswas = Mahasiswa::orderBy('nim','desc')->get();
        }
        // Menghitung total mahasiswa
        $total = Mahasiswa::count();
        // Menghitung total mahasiswa laki-laki
        $totalMale = Mahasiswa::where('gender', 'L')->count();
        // Menghitung total mahasiswa perempuan
        $totalFemale = Mahasiswa::where('gender', 'P')->count();
        // Mengembalikan view home dengan data mahasiswa, total mahasiswa, total laki-laki, dan total perempuan
        return view('home', compact('mahasiswas', 'total', 'totalMale', 'totalFemale'));
    }

    public function admin()
    {
        // Mengecek apakah ada request "edit" dengan nilai id mahasiswa
        $mahasiswa = null;
        if (request()->has('edit')) {
            // Jika ada, maka mencari mahasiswa berdasarkan id
            $mahasiswa = Mahasiswa::find(request('edit'));
        }
        // Mengambil semua data mahasiswa
        $mahasiswas = Mahasiswa::orderBy('nim','desc')->get();
        // Mengembalikan view admin dengan data mahasiswa dan mahasiswa yang akan diedit (jika ada)
        return view('admin', compact('mahasiswas', 'mahasiswa'));
    }
}