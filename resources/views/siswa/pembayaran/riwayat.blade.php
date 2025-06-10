

{{-- <x-allLinks></x-allLinks>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Payment History Dashboard</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css"/>
  <style>
    :root {
      --primary-color: #29d847; /* Warna utama */
      --secondary-color: #82f095; /* Warna sekunder */
      --accent-color: #3ff35e; /* Warna aksen */
      --light-gray: #f8f9fa;
      --medium-gray: #e0e0e0;
      --dark-gray: #757575;
      --text-color: #212529;
      --success-color: #4caf50;
    }

    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      margin: 0;
      padding: 0;
      background-color: var(--light-gray);
      color: var(--text-color);
    }

    .navbar {
      display: flex;
      justify-content: space-between;
      align-items: center;
      background-color: white;
      padding: 15px 40px;
      box-shadow: 0 2px 10px rgba(0,0,0,0.05);
      position: sticky;
      top: 0;
      z-index: 10;
    }

    .navbar .logo {
      font-size: 24px;
      font-weight: 700;
      color: var(--primary-color);
      display: flex;
      align-items: center;
    }

    .logo-icon {
      margin-right: 10px;
      font-size: 28px;
    }

    .nav-menu {
      list-style: none;
      display: flex;
      gap: 20px;
      margin: 0;
      padding: 0;
    }

    .nav-item {
      display: flex;
      align-items: center;
      cursor: pointer;
      font-weight: 500;
      padding: 8px 12px;
      border-radius: 6px;
      transition: background-color 0.2s;
    }

    .nav-item:hover {
      background-color: var(--medium-gray);
    }

    .nav-item.active {
      background-color: rgba(46, 125, 50, 0.1);
      color: var(--primary-color);
    }

    .nav-icon {
      margin-right: 6px;
      font-size: 16px;
    }

    .user-profile {
      display: flex;
      align-items: center;
    }

    .profile-pic {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: var(--medium-gray);
      margin-right: 10px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .main-content {
      padding: 30px 40px;
    }

    .page-title {
      font-size: 28px;
      font-weight: 600;
      margin-bottom: 30px;
    }

    .card {
      background-color: white;
      border-radius: 12px;
      box-shadow: 0 2px 15px rgba(0,0,0,0.05);
      padding: 25px;
      margin-bottom: 30px;
    }

    .card-header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }

    .card-title {
      font-size: 18px;
      font-weight: 600;
    }

    .search-container {
      position: relative;
      width: 300px;
    }

    .search-input {
      width: 100%;
      padding: 12px 20px 12px 40px;
      border: 1px solid var(--medium-gray);
      border-radius: 8px;
      font-size: 14px;
    }

    .search-input:focus {
      outline: none;
      border-color: var(--primary-color);
      box-shadow: 0 0 0 2px rgba(46, 125, 50, 0.2);
    }

    .search-icon {
      position: absolute;
      left: 15px;
      top: 50%;
      transform: translateY(-50%);
      color: var(--dark-gray);
    }

    .payment-card {
      display: flex;
      align-items: center;
      padding: 15px;
      border-radius: 8px;
      transition: all 0.2s;
      margin-bottom: 10px;
      background-color: var(--light-gray);
    }

    .payment-avatar {
      width: 48px;
      height: 48px;
      border-radius: 50%;
      background-color: var(--medium-gray);
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 20px;
      font-weight: 600;
      color: var(--text-color);
    }

    .payment-details {
      flex: 1;
    }

    .payment-recipient {
      font-weight: 600;
      margin-bottom: 5px;
    }

    .payment-date {
      font-size: 13px;
      color: var(--dark-gray);
    }

    .payment-amount {
      font-weight: 600;
      margin-right: 20px;
    }

    .positive-amount {
      color: var(--success-color);
    }

    .feedback-btn {
      background-color: var(--primary-color);
      color: white;
      border: none;
      padding: 8px 16px;
      border-radius: 6px;
      font-size: 13px;
      cursor: pointer;
    }

    .feedback-btn:hover {
      background-color: var(--secondary-color);
    }

    .payment-meta {
      display: flex;
      align-items: center;
    }

    .credit-card {
      background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
      color: var(--text-color); /* TEXT JADI HITAM */
      padding: 20px;
      border-radius: 12px;
      margin-bottom: 25px;
    }

    .card-type {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 30px;
    }

    .card-logo {
      font-weight: 700;
      font-size: 16px;
    }

    .card-chip {
      width: 40px;
      height: 30px;
      background-color: rgba(255,255,255,0.2);
      border-radius: 5px;
      display: flex;
      align-items: center;
      justify-content: center;
    }

    .card-number {
      font-size: 18px;
      letter-spacing: 2px;
      margin-bottom: 30px;
      word-spacing: 8px;
    }

    .card-footer {
      display: flex;
      justify-content: space-between;
    }

    .card-name, .card-expiry {
      font-size: 14px;
      text-transform: uppercase;
    }

    .status-badge {
      padding: 4px 10px;
      border-radius: 12px;
      font-size: 12px;
      font-weight: 500;
      background-color: rgba(76, 175, 80, 0.1);
      color: var(--success-color);
    }
  </style>
</head>
<body>
{{-- @foreach($tagihanLunas as $tagihan)
    <tr>
        <td>{{ $tagihan->order_id }}</td>
        <td>
            @foreach($tagihan->detailTagihan as $detail)
                {{ $detail->tarifTagihan->jenisTagihan->jenis_tagihan ?? 'Tidak Ada' }} -
                Rp{{ number_format($detail->jumlah_tagihan, 0, ',', '.') }}<br>
            @endforeach
        </td>
        <td>{{ $tagihan->status_pembayaran }}</td>
        <td>{{ $tagihan->created_at->format('d-m-Y') }}</td>
    </tr>
@endforeach --}}
  <div class="main-content">
    <h1 class="page-title">Payment History</h1>

    <div class="credit-card">
      <div class="card-type">
        <div class="card-logo">{{ Auth::user()->siswa->name }}</div>
        <div class="card-chip"><i class="fas fa-microchip"></i></div>
      </div>
      <div class="card-number">{{Auth::user()->siswa->nisn}}</div>
      <div class="card-footer">
        <div class="card-name"></div>
        <div class="card-expiry">07/2022</div>
      </div>
    </div>

    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Recent Transactions</h2>
        <div class="search-container">
          <i class="fas fa-search search-icon"></i>
          <input type="text" class="search-input" placeholder="Search transactions...">
        </div>
      </div>

       @foreach($tagihanLunas as $tagihan)
            @foreach($tagihan->detailTagihan as $detail)
      <div class="payment-list">
        <div class="payment-card">
          <div class="payment-avatar">PW</div>
          <div class="payment-details">
            <div class="payment-recipient">{{ $detail->tarifTagihan->jenisTagihan->jenis_tagihan ?? 'Tidak Ada' }}
            <div class="payment-date">{{ $tagihan->created_at->format('d-m-Y') }}atus_pembayaran }}
          </div>
          <div class="payment-meta">
            <div class="payment-amount positive-amount">$25.00</div>
            <button class="feedback-btn">Give Feedback</button>
          </div>
        </div>
        @endforeach
      @endforeach


      </div>
    </div>
  </div>

</body>
</html> --}}

<x-layout-dashboard-siswa>
   <div class="flex space-x-2 px-8 max-w-4xl xl:max-w-5xl mx-auto mt-10">
    <select class="px-3 py-2 w-[100px] focus:border-primary focus:ring-primary  rounded border border-gray-300 text-sm text-gray-700">
      <option class="before:ring-white after:ring-white">bulan</option>
      <option>juni</option>
      <option>mei</option>
      <!-- Tambah lainnya -->
    </select>
    <select class="px-3 py-2 w-[100px] focus:border-primary focus:ring-primary  rounded border border-gray-300 text-sm text-gray-700">
      <option class="before:ring-white after:ring-white">tanggal</option>
      <option>1</option>
      <option>2</option>
      <!-- Tambah lainnya -->
    </select>
    <select class="px-3 py-2 w-[100px] focus:border-primary focus:ring-primary  rounded border border-gray-300 text-sm text-gray-700">
      <option class="before:ring-white after:ring-white">tahun</option>
      <option>2025</option>
      <option>2045</option>
      <!-- Tambah lainnya -->
    </select>
  </div>

  <!-- List Item -->
  <div class="space-y-3 mt-5 max-w-4xl xl:max-w-5xl mx-auto">
    <div class="flex items-center justify-between border-b px-8 pb-2">
      <div>
        <p class="text-sm text-gray-700">spp, bulan juni</p>
        <p class="text-sm font-semibold">2 , mei , 2025</p>
      </div>
      <div class="flex items-center space-x-2">
        <p class="text-sm text-gray-800">Rp.350.00</p>
        <i class="bi bi-arrow-right-circle-fill text-lg"></i>
      </div>
    </div>
    <div class="flex items-center justify-between border-b px-8 pb-2">
      <div>
        <p class="text-sm text-gray-700">spp, bulan juni</p>
        <p class="text-sm font-semibold">2 , mei , 2025</p>
      </div>
      <div class="flex items-center space-x-2">
        <p class="text-sm text-gray-800">Rp.350.00</p>
        <i class="bi bi-arrow-right-circle-fill text-lg"></i>
      </div>
    </div>
    <div class="flex items-center justify-between border-b px-8 pb-2">
      <div>
        <p class="text-sm text-gray-700">spp, bulan juni</p>
        <p class="text-sm font-semibold">2 , mei , 2025</p>
      </div>
      <div class="flex items-center space-x-2">
        <p class="text-sm text-gray-800">Rp.350.00</p>
        <i class="bi bi-arrow-right-circle-fill text-lg"></i>
      </div>
    </div>
    <div class="flex items-center justify-between border-b px-8 pb-2">
      <div>
        <p class="text-sm text-gray-700">spp, bulan juni</p>
        <p class="text-sm font-semibold">2 , mei , 2025</p>
      </div>
      <div class="flex items-center space-x-2">
        <p class="text-sm text-gray-800">Rp.350.00</p>
        <i class="bi bi-arrow-right-circle-fill text-lg"></i>
      </div>
    </div>
    <div class="flex items-center justify-between border-b px-8 pb-2">
      <div>
        <p class="text-sm text-gray-700">spp, bulan juni</p>
        <p class="text-sm font-semibold">2 , mei , 2025</p>
      </div>
      <div class="flex items-center space-x-2">
        <p class="text-sm text-gray-800">Rp.350.00</p>
        <i class="bi bi-arrow-right-circle-fill text-lg"></i>
      </div>
    </div>
    <div class="flex items-center justify-between border-b px-8 pb-2">
      <div>
        <p class="text-sm text-gray-700">spp, bulan juni</p>
        <p class="text-sm font-semibold">2 , mei , 2025</p>
      </div>
      <div class="flex items-center space-x-2">
        <p class="text-sm text-gray-800">Rp.350.00</p>
        <i class="bi bi-arrow-right-circle-fill text-lg"></i>
      </div>
    </div>
    <div class="flex items-center justify-between border-b px-8 pb-2">
      <div>
        <p class="text-sm text-gray-700">spp, bulan juni</p>
        <p class="text-sm font-semibold">2 , mei , 2025</p>
      </div>
      <div class="flex items-center space-x-2">
        <p class="text-sm text-gray-800">Rp.350.00</p>
        <i class="bi bi-arrow-right-circle-fill text-lg"></i>
      </div>
    </div>
    <div class="flex items-center justify-between border-b px-8 pb-2">
      <div>
        <p class="text-sm text-gray-700">spp, bulan juni</p>
        <p class="text-sm font-semibold">2 , mei , 2025</p>
      </div>
      <div class="flex items-center space-x-2">
        <p class="text-sm text-gray-800">Rp.350.00</p>
        <i class="bi bi-arrow-right-circle-fill text-lg"></i>
      </div>
    </div>
    <div class="flex items-center justify-between border-b px-8 pb-2">
      <div>
        <p class="text-sm text-gray-700">spp, bulan juni</p>
        <p class="text-sm font-semibold">2 , mei , 2025</p>
      </div>
      <div class="flex items-center space-x-2">
        <p class="text-sm text-gray-800">Rp.350.00</p>
        <i class="bi bi-arrow-right-circle-fill text-lg"></i>
      </div>
    </div>
    <div class="flex items-center justify-between border-b px-8 pb-2">
      <div>
        <p class="text-sm text-gray-700">spp, bulan juni</p>
        <p class="text-sm font-semibold">2 , mei , 2025</p>
      </div>
      <div class="flex items-center space-x-2">
        <p class="text-sm text-gray-800">Rp.350.00</p>
        <i class="bi bi-arrow-right-circle-fill text-lg"></i>
      </div>
    </div>
    <div class="flex items-center justify-between border-b px-8 pb-2">
      <div>
        <p class="text-sm text-gray-700">spp, bulan juni</p>
        <p class="text-sm font-semibold">2 , mei , 2025</p>
      </div>
      <div class="flex items-center space-x-2">
        <p class="text-sm text-gray-800">Rp.350.00</p>
        <i class="bi bi-arrow-right-circle-fill text-lg"></i>
      </div>
    </div>
    <div class="flex items-center justify-between border-b px-8 pb-2">
      <div>
        <p class="text-sm text-gray-700">spp, bulan juni</p>
        <p class="text-sm font-semibold">2 , mei , 2025</p>
      </div>
      <div class="flex items-center space-x-2">
        <p class="text-sm text-gray-800">Rp.350.00</p>
        <i class="bi bi-arrow-right-circle-fill text-lg"></i>
      </div>
    </div>
  </div>
</x-layout-dashboard-siswa>
