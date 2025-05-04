@extends('components.sidebar-admin')

@section('admin-sidebar')
    <div class="overflow-x-auto">
  <table class="min-w-full table-auto">
    <thead>
      <tr class="bg-gray-800 text-white">
        <th class="px-6 py-3 text-left text-sm font-semibold">ID</th>
        <th class="px-6 py-3 text-left text-sm font-semibold">Jenis Tagihan</th>
        <th class="px-6 py-3 text-left text-sm font-semibold">Jumlah Tarif</th>
        <th class="px-6 py-3 text-left text-sm font-semibold">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <!-- Data table rows -->
      <tr class="bg-white hover:bg-gray-100">
        <td class="px-6 py-4 text-sm">1</td>
        <td class="px-6 py-4 text-sm">Tagihan A</td>
        <td class="px-6 py-4 text-sm">Rp 500,000</td>
        <td class="px-6 py-4 text-sm">
          <button class="bg-blue-500 text-white py-1 px-3 rounded">Edit</button>
          <button class="bg-red-500 text-white py-1 px-3 rounded">Delete</button>
        </td>
      </tr>
      <tr class="bg-white hover:bg-gray-100">
        <td class="px-6 py-4 text-sm">2</td>
        <td class="px-6 py-4 text-sm">Tagihan B</td>
        <td class="px-6 py-4 text-sm">Rp 250,000</td>
        <td class="px-6 py-4 text-sm">
          <button class="bg-blue-500 text-white py-1 px-3 rounded">Edit</button>
          <button class="bg-red-500 text-white py-1 px-3 rounded">Delete</button>
        </td>
      </tr>
      <!-- Add more rows as needed -->
    </tbody>
  </table>
</div>

@endsection
