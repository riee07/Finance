document.addEventListener('alpine:init', () => {
    Alpine.data('sppData', () => ({
        items: window.sppItems || [], // Default ke array kosong jika sppItems tidak ada
        open: false,
        formatRupiah(angka) {
            angka = parseFloat(angka); // Pastikan angka adalah float
            if (isNaN(angka)) return 'Rp 0'; // Default jika angka tidak valid
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(angka);
        }
    }));

    Alpine.store('cart', {
        items: [], // Array untuk item dalam keranjang
        total: 0,  // Total harga semua item
        quantity: 0, // Total jumlah semua item
    
        // Tambah item ke keranjang
        add(newItem) {
            if (!newItem || isNaN(parseFloat(newItem.harga))) {
                console.error("Item tidak valid:", newItem);
                return;
            }
    
            const existingItem = this.items.find(item => item.id === newItem.id);
    
            if (existingItem) {
                // Jika item sudah ada, tambahkan quantity
                existingItem.quantity += newItem.quantity || 1;
            } else {
                // Jika item baru, tambahkan ke array
                this.items.push({
                    ...newItem,
                    quantity: newItem.quantity || 1, // Default quantity adalah 1
                });
            }
    
            // Perbarui total dan quantity
            this.total += parseFloat(newItem.harga) * (newItem.quantity || 1);
            this.quantity += newItem.quantity || 1;
    
            console.log("Item berhasil ditambahkan:", newItem);
            console.log("Total sekarang:", this.total);
        },
    
        // Hapus item dari keranjang
        remove(id) {
            const itemIndex = this.items.findIndex(item => item.id === id);
            if (itemIndex === -1) {
                console.error(`Item dengan id ${id} tidak ditemukan`);
                return;
            }
    
            const cartItem = this.items[itemIndex];
            const itemQuantity = cartItem.quantity;
    
            // Kurangi quantity, atau hapus jika quantity <= 1
            if (cartItem.quantity > 1) {
                cartItem.quantity--;
            } else {
                this.items.splice(itemIndex, 1);
            }
    
            // Perbarui total dan quantity global
            this.total -= cartItem.harga;
            this.quantity--;
    
            console.log(`Item dengan id ${id} berhasil dihapus/dikurangi`);
            console.log("Sisa items:", this.items);
        },
    
        // Helper untuk mereset keranjang
        // reset() {
        //     this.items = [];
        //     this.total = 0;
        //     this.quantity = 0;
        //     console.log("Keranjang telah direset");
        // },
    
        // // Debugging: Lihat isi keranjang
        // logCart() {
        //     console.log("Isi keranjang:", this.items);
        //     console.log("Total:", this.total, "Quantity:", this.quantity);
        // },
    });    
});

function formatRupiah(value) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
    }).format(value || 0);
}
