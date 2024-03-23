<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Http\Requests\StoreMahasiswaRequest;
use App\Http\Requests\UpdateMahasiswaRequest;
use Exception;

class MahasiswaController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMahasiswaRequest $request)
    {
        try {
            //store data mahasiswa
            Mahasiswa::create($request->validated());
            return redirect()->route('admin')->with('success', 'Data mahasiswa berhasil ditambahkan');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to create mahasiswa: ' . $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMahasiswaRequest $request, Mahasiswa $mahasiswa)
    {
        try {
            //update data mahasiswa
            $mahasiswa->update($request->validated());
            return redirect()->route('admin')->with('success', 'Data mahasiswa berhasil diubah');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to update mahasiswa: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Mahasiswa $mahasiswa)
    {
        try {
            //delete data mahasiswa
            $mahasiswa->delete();
            return redirect()->route('admin')->with('success', 'Data mahasiswa berhasil dihapus');
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete mahasiswa: ' . $e->getMessage());
        }
    }
}