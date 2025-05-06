@extends('layouts.app')

{{-- @section('title', 'Data Tahun Ajaran') --}}

@section('admin-sidebar')
    <h1 class="text-2xl font-bold mb-4">Data Tahun Ajaran</h1>

    <a href="{{ route('admin.tahun-ajaran.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Tahun Ajaran</a>
    <a href="{{ route('tahun-ajaran.export') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Export</a>

    @include('export.table_tahun_ajaran')

@endsection
