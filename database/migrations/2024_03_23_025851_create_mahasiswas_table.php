<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        // Membuat tabel 'mahasiswas'
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->id(); // Membuat kolom 'id' sebagai primary key
            $table->string('nim')->unique(); // Membuat kolom 'nim' yang unik
            $table->string('nama'); // Membuat kolom 'nama'
            $table->text('alamat'); // Membuat kolom 'alamat'
            $table->date('tgl_lahir'); // Membuat kolom 'tgl_lahir' dengan tipe data tanggal
            $table->enum('gender', ['L', 'P']); // Membuat kolom 'gender' dengan nilai 'L' atau 'P'
            $table->tinyInteger('usia')->unsigned(); // Membuat kolom 'usia' dengan tipe data tiny integer dan tidak boleh negatif
            $table->timestamps(); // Membuat kolom 'created_at' dan 'updated_at'
        });
    }

    /**
     * Membalikkan migrasi.
     */
    public function down(): void
    {
        // Menghapus tabel 'mahasiswas'
        Schema::dropIfExists('mahasiswas');
    }
};