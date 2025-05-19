

<div class="p-4">
    <h2 class="text-xl font-bold mb-4">Pembayaran</h2>
    <p><strong>Tagihan:</strong> {{ $detail->tarifTagihan->jenisTagihan->jenis_tagihan }}</p>
    <p><strong>Jumlah:</strong> Rp{{ number_format($detail->jumlah_tagihan) }}</p>

    <button id="pay-button" class="mt-4 bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700">
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

