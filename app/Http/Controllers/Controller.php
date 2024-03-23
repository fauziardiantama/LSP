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
        //check if there's search query
        if (request()->has('search')) {
            $mahasiswas = Mahasiswa::where('nama', 'like', '%' . request('search') . '%')->orderBy('nim','desc')->get();
        } else {
            $mahasiswas = Mahasiswa::orderBy('nim','desc')->get();
        }
        //get total mahasiswa
        $total = Mahasiswa::count();
        //get total mahasiswa laki-laki
        $totalMale = Mahasiswa::where('gender', 'L')->count();
        //get total mahasiswa perempuan
        $totalFemale = Mahasiswa::where('gender', 'P')->count();
        return view('home', compact('mahasiswas', 'total', 'totalMale', 'totalFemale'));
    }

    public function admin()
    {
        //check if there's "Edit" with value id mahasiswa
        $mahasiswa = null;
        if (request()->has('edit')) {
            $mahasiswa = Mahasiswa::find(request('edit'));
        }
        $mahasiswas = Mahasiswa::all();
        return view('admin', compact('mahasiswas', 'mahasiswa'));
    }
}
