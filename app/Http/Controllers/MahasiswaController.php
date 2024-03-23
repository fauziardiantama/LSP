<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use Exception;

class MahasiswaController extends Controller
{
    /**
     * Menyimpan sumber daya yang baru dibuat ke dalam penyimpanan.
     */
    public function store(StoreMahasiswaRequest $request)
    {
        try {
            //menyimpan data mahasiswa
            Mahasiswa::create($request->validated());
            //jika berhasil, kembali ke halaman sebelumnya dengan pesan sukses
            return redirect()->route('admin')->with('success', 'Data mahasiswa berhasil ditambahkan');
        } catch (Exception $e) {
            //jika gagal, kembali ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('error', 'Gagal membuat mahasiswa: ' . $e->getMessage());
        }
    }

    /**
     * Memperbarui sumber daya yang ditentukan dalam penyimpanan.
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        try {
            //memperbarui data mahasiswa
            $mahasiswa->update($request->validated());
            //kembali ke halaman admin dengan pesan sukses
            return redirect()->route('admin')->with('success', 'Data mahasiswa berhasil diubah');
        } catch (Exception $e) {
            //jika gagal, kembali ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('error', 'Gagal memperbarui mahasiswa: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus sumber daya yang ditentukan dari penyimpanan.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        try {
            //menghapus data mahasiswa
            $mahasiswa->delete();
            //kembali ke halaman admin dengan pesan sukses
            return redirect()->route('admin')->with('success', 'Data mahasiswa berhasil dihapus');
        } catch (Exception $e) {
            //jika gagal, kembali ke halaman sebelumnya dengan pesan error
            return redirect()->back()->with('error', 'Gagal menghapus mahasiswa: ' . $e->getMessage());
        }
    }
}