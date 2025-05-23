<x-allLinks></x-allLinks>


<div class="max-w-md mx-auto bg-white p-6 rounded-xl shadow-md mt-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Pembayaran</h2>

    <div class="space-y-2 mb-6">
        <div class="flex justify-between text-sm text-gray-600">
            <span>Tagihan</span>
            <span class="font-semibold text-gray-800">{{ $detail->tarifTagihan->jenisTagihan->jenis_tagihan }}</span>
        </div>
        <div class="flex justify-between text-sm text-gray-600">
            <span>Jumlah</span>
            <span class="font-bold text-gray-900 text-lg">Rp{{ number_format($detail->jumlah_tagihan) }}</span>
        </div>
    </div>

    <button id="pay-button"
        class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 rounded-lg shadow transition">
        Bayar Sekarang
    </button>
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
