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
    notification: '', // Pesan notifikasi
    
    // Fungsi untuk memperbarui notifikasi
    setNotification(message) {
        this.notification = message;

        // Hilangkan notifikasi setelah beberapa detik (opsional)
        setTimeout(() => {
            this.notification = '';
        }, 3000); // 3 detik
    },

    // Tambah item ke keranjang
    add(newItem) {
        if (!newItem || isNaN(parseFloat(newItem.harga))) {
            this.setNotification('Item tidak valid.');
            return;
        }
        
        // Periksa apakah item sudah ada di keranjang
        const existingItem = this.items.find(item => item.id === newItem.id);
        
        if (existingItem) {
            this.setNotification('Item sudah ada di keranjang.');
            return; // Hentikan proses jika item sudah ada
        }
        
        // Tambahkan item baru ke keranjang
        this.items.push({
            ...newItem,
            quantity: newItem.quantity || 1, // Default quantity adalah 1
        });
        
        // Perbarui total dan quantity
        this.total += parseFloat(newItem.harga) * (newItem.quantity || 1);
        this.quantity += newItem.quantity || 1;

        this.setNotification('Item berhasil ditambahkan ke keranjang.');
    },

    // Hapus item dari keranjang
    remove(id) {
        const itemIndex = this.items.findIndex(item => item.id === id);
        if (itemIndex === -1) {
            this.setNotification(`Item dengan id ${id} tidak ditemukan.`);
            return;
        }

        const cartItem = this.items[itemIndex];

        // Kurangi quantity, atau hapus jika quantity <= 1
        if (cartItem.quantity > 1) {
            cartItem.quantity--;
        } else {
            this.items.splice(itemIndex, 1);
        }

        // Perbarui total dan quantity global
        this.total -= cartItem.harga;
        this.quantity--;

        this.setNotification('Item berhasil dihapus dari keranjang.');
    },
});
    
});

function formatRupiah(value) {
    return new Intl.NumberFormat('id-ID', {
        style: 'currency',
        currency: 'IDR',
    }).format(value || 0);
}
