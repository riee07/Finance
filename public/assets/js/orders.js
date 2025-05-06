document.addEventListener("alpine:init", () => {
  // Komponen data: OrderItem
  if (!Alpine.data("OrderItem")) {
    Alpine.data("OrderItem", () => ({
      items: [],
      open: false,
      openCart: false,

      init() {
        // Ambil data awal jika tersedia di window
        if (window.OrderItem && this.items.length === 0) {
          this.items = [...window.OrderItem];
          console.log('Order items initialized:', this.items);
        }
      },

      formatRupiah(angka) {
        const num = parseFloat(angka);
        return isNaN(num) ? "Rp 0" : "Rp " + new Intl.NumberFormat("id-ID").format(num);
      }
    }));
  }

  // Store: cart (hanya add & remove)
  Alpine.store("cart", {
    items: [],
    total: 0,
    quantity: 0,
    notification: "",

    setNotification(message) {
      this.notification = message;
      setTimeout(() => this.notification = "", 2000);
    },

    add(newItem) {
      if (!newItem || isNaN(parseFloat(newItem.harga))) {
        this.setNotification("Item tidak valid.");
        return;
      }

      if (this.items.length >= 1) {
        this.setNotification("Hanya boleh menambahkan 1 item ke keranjang.");
        return;
      }

      const item = { ...newItem, quantity: newItem.quantity || 1 };
      this.items.push(item);
      this.total = item.harga * item.quantity;
      this.quantity = item.quantity;

      this.setNotification("Item berhasil ditambahkan ke keranjang");
      console.log("Isi keranjang:", this.items);
    },

    remove(id) {
      const index = this.items.findIndex(item => item.id === id);
      if (index === -1) {
        this.setNotification("Item tidak ditemukan.");
        return;
      }

      this.items.splice(index, 1);
      this.total = 0;
      this.quantity = 0;

      this.setNotification("Item berhasil dihapus dari keranjang");
      console.log("Isi keranjang setelah hapus:", this.items);
    }
  });
});
