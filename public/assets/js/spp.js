document.addEventListener('alpine:init', () => {
    Alpine.data('sppData', () => ({
        items: window.sppItems, // Menggunakan data yang dikirim dari Laravel
        open: false,
        formatRupiah(angka) {
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(angka);
        }
    }));
});

