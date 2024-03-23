<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMahasiswaRequest extends FormRequest
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
            'nama' => 'string', // Nama harus berupa string
            'alamat' => 'string', // Alamat harus berupa string
            'tgl_lahir' => 'date|before:today', // Tanggal lahir harus berupa tanggal dan sebelum hari ini
            'gender' => 'in:L,P', // Gender harus berupa 'L' atau 'P'
            'usia' => 'numeric' // Usia harus berupa angka
        ];
    }
}