<?php

namespace App\Http\Controllers;

abstract class Controller
{
    public function rules()
    {
        $rules = [
            'name' => 'required|string|max:255',
            'role' => 'required|in:siswa,admin,superadmin',
            'password' => 'required|string|confirmed|min:8',
        ];
    
        // Tambahkan validasi untuk siswa
        if (request()->input('role') === 'siswa') {
            $rules['kelas'] = 'required|in:x,xi,xii';
            $rules['jurusan'] = 'required|in:pplg,tkj,an';
            $rules['nisn'] = 'required|digits:10|unique:users,nisn'; // Pastikan nisn unik
        } else {
            // Field tidak diperlukan untuk admin dan superadmin
            $rules['kelas'] = 'nullable';
            $rules['jurusan'] = 'nullable';
            $rules['nisn'] = 'nullable';
        }
    
        return $rules;
    }
}
