document.addEventListener('alpine:init', () => {
    Alpine.data('sppData', () => ({
        items: window.sppItems || [], // Default ke array kosong jika sppItems tidak ada
        open: false,
        formatRupiah(angka) {
            angka = parseFloat(angka); // Pastikan angka adalah float
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(angka);
        }
    }));

    Alpine.store('cart', {
        items: [],
        total: 0,
        quantity: 0,
        add(newItems){

            this.items.push(newItems);
            this.quantity++;
            this.total += newItems.harga;
        
            console.log(this.total);
        }
    });
});

function formatRupiah(value) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
    }).format(value || 0);
}


