@extends('layouts.app')

@section('title', 'Data Pembayaran')

@section('content')
    <h1 class="text-2xl font-bold mb-4">Data Pembayaran</h1>

    <a href="{{ route('pembayaran.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Tambah Pembayaran</a>
    <a href="{{ route('pembayaran.export') }}" class="bg-blue-500 text-white px-4 py-2 rounded">Export</a>

    @include('export.table_pembayaran')

@endsection
