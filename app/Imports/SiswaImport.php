<?php

namespace App\Imports;

use App\Models\Admin\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use App\Http\Controllers\Admin\SiswaImportController;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SiswaImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        $nisnDigits = str_split($row['nisn']);
            shuffle($nisnDigits);
            $emailCode = implode('', array_slice($nisnDigits, 0, 4));
            $email = 'AF' . $emailCode . '@gmail.com';
        // Buat user akun
            $user = User::create([
                'name' => $row['nama'] ?? $row['name'],
                'email' => $email,
                'password' => Hash::make($row['nisn']),
                'role' => 'siswa',
            ]);

        
    \Log::info("User created:", ['id' => $user->id, 'email' => $user->email]);

        return new Siswa([
            'name'              => $row['nama'],          // dari Excel
            'email'             => $email, // default karena gak ada di Excel
            'nisn'              => $row['nisn'],          // dari Excel, pastikan nama kolom sesuai
            'kelas'             => $row['kelas'],         // dari Excel
            'jurusan'           => $row['jurusan'],           // default karena gak ada di Excel
            'status_aktif'      => $row['status_aktif'] ?? null,               // default aktif
            'no_hp'             => $row['no_hp'] ?? null,                   // kosong karena gak ada di Excel
            'user_id'           => $user->id,                   // kosong karena gak ada di Excel
            'tahun_ajaran_id'   => $row['tahun_ajaran_id'] ?? null,                   // kosong karena gak ada di Excel
        ]);
    }
}
