@extends('components.sidebar-admin')

@section('admin-sidebar')
    <h1 class="text-2xl font-bold mb-4">Data Siswa</h1>

    <form action="{{ route('admin.siswa.promosi') }}" method="POST" onsubmit="return confirm('Yakin ingin naikkan semua kelas?')">
        @csrf
        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Naikkan Kelas</button>
    </form>

    <a href="{{ route('admin.siswa.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Siswa</a>
    <br><br>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    
        <form action="{{ url('/import-siswa') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Import</button>
     </form>

    <form action="{{ url('/siswa.export') }}" method="GET">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded">Export</button>
    </form>
    

    @include('export.table_siswa')
    
@endsection
