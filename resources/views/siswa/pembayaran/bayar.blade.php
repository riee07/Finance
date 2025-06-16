<x-allLinks></x-allLinks>
<div class="flex items-center justify-center  w-full h-screen">
    <div class="flex flex-col items-center justify-center w-fit p-5 h-full relative bg-white m-auto shadow-md">
        <a href="{{ route('siswa.dashboard') }}" class="text-xl mb-4 absolute top-0 left-0 m-5">
            ← kembali
        </a>
        <div class=" p-6  font-sans space-y-10">
            <div class="mb-6">
                <div class="flex w-full justify-between items-center">
                    <p>jenis tagihan :</p>
                    <h1 class="text-2xl text-gray-700 font-semibold">{{ $detail->tarifTagihan->jenisTagihan->jenis_tagihan }}</h1>
                    
                </div>
                <div class="flex w-full justify-between items-center">
                    <p>harga:</p>
                    <p class="text-3xl font-bold text-black">Rp{{ number_format($detail->jumlah_tagihan) }}</p>
                    
                </div>
            </div>
            <div class="bg-white rounded-xl shadow-md p-4 space-y-2 text-sm text-gray-700 w-full max-w-md">
                <div class="flex justify-between">
                <span class="font-medium">nama:</span>
                <span>{{ $siswa->name }}</span>
                </div>
                <div class="flex justify-between">
                <span class="font-medium">No.Tel:</span>
                <span>0812821927192</span>
                </div>
                <div class="flex justify-between">
                <span class="font-medium">NISN:</span>
                <span>{{ $siswa->nisn }}</span>
                </div>
                <div class="flex justify-between">
                <span class="font-medium">Email:</span>
                <span>Mamuteinsten@gmail.com</span>
                </div>
            </div>
            <div class="mt-6 flex items-start gap-2 max-w-md my-5">
                <div class="text-green-600 mt-1">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                    viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M13 16h-1v-4h-1m0-4h.01M12 20c4.418 0 8-3.582 8-8s-3.582-8-8-8-8 
                    3.582-8 8 3.582 8 8 8z" />
                </svg>
                </div>
                <div class="text-sm">
                <p class="font-semibold text-green-600">peringatan</p>
                <p class="text-gray-500">sebelum membayar cek data di atas apakah sudah benar</p>
                </div>
            </div>
        </div>
        <button id="pay-button"
            class="w-full bg-green-600 m-5 absolute w-[90%] bottom-0 hover:bg-green-700 text-white font-semibold py-2 rounded-lg shadow transition">
            Bayar Sekarang
        </button>
    </div>
</div>
<script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('midtrans.client_key') }}">
</script>

<script type="text/javascript">
    document.getElementById('pay-button').addEventListener('click', function () {
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result) {
                alert("Pembayaran berhasil!");
                window.location.href = "{{ route('siswa.pembayaran.index') }}";
            },
            onPending: function(result) {
                alert("Menunggu pembayaran...");
                window.location.href = "{{ route('siswa.pembayaran.index') }}";
            },
            onError: function(result) {
                alert("Pembayaran gagal!");
            },
            onClose: function() {
                alert('Kamu menutup popup sebelum menyelesaikan pembayaran');
            }
        });
    });
</script>
