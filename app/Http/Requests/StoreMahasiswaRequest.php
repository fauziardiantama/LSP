<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMahasiswaRequest extends FormRequest
{
    /**
     * Menentukan apakah pengguna berwenang membuat permintaan ini.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Mendapatkan aturan validasi yang berlaku untuk permintaan.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'nim' => 'required|string|unique:mahasiswas', // NIM harus ada, berupa string, dan unik di tabel mahasiswas
            'nama' => 'required|string', // Nama harus ada dan berupa string
            'alamat' => 'required|string', // Alamat harus ada dan berupa string
            'tgl_lahir' => 'required|date|before:today', // Tanggal lahir harus ada, berupa tanggal, dan sebelum hari ini
            'gender' => 'required|in:L,P', // Gender harus ada dan berupa 'L' atau 'P'
            'usia' => 'required|numeric' // Usia harus ada dan berupa angka
        ];
    }
}