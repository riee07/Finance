document.addEventListener("alpine:init", () => {
    Alpine.data("tagihanItem", () => ({
      items: window.tagihanItem || [],
      open: false,
  
      // Format currency dalam Rupiah
      formatRupiah(angka) {
        angka = parseFloat(angka);
        return isNaN(angka)
          ? "Rp 0"
          : new Intl.NumberFormat("id-ID", {
              style: "currency",
              currency: "IDR"
            }).format(angka);
      },
  
      // Fungsi untuk menampilkan detail (jika diperlukan)
      showDetail(item) {
        console.log("Detail for:", item);
        // Tambahkan logika tambahan di sini
      }
    }));
  });
  
  // Fungsi global opsional
  window.formatRupiah = (angka) => {
    return new Intl.NumberFormat("id-ID", {
      style: "currency",
      currency: "IDR"
    }).format(angka);
  };
  