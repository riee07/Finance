// document.addEventListener("alpine:init", () => {
//     Alpine.data("Tagihan", () => ({
//         items: window.tagihan || [], // Pastikan ada default value
//         open: false,
//         formatRupiah(angka) {
//             angka = parseFloat(angka); // Pastikan angka adalah float
//             return isNaN(angka) ? "Rp 0" : "Rp " + new Intl.NumberFormat("id-ID").format(angka);
//         },
//     }));

//     Alpine.store("cart", {
//         items: [],
//         total: 0,
//         quantity: 0,
//         notification: "",

//         setNotification(message) {
//             this.notification = message;
//             setTimeout(() => this.notification = "", 2000); // Hapus notif setelah 2 detik
//         },

//         add(newItem) {
//             if (!newItem || isNaN(parseFloat(newItem.harga))) {
//                 this.setNotification("Item tidak valid.");
//                 return;
//             }

//             const existingItem = this.items.find(item => item.id === newItem.id);
//             if (existingItem) {
//                 this.setNotification("Item sudah ada di keranjang.");
//                 return;
//             }

//             this.items.push({ ...newItem, quantity: newItem.quantity || 1 });

//             this.total += parseFloat(newItem.harga) * (newItem.quantity || 1);
//             this.quantity += newItem.quantity || 1;

//             this.setNotification("Item berhasil ditambahkan ke keranjang.");
//         },

//         remove(id) {
//             const itemIndex = this.items.findIndex(item => item.id === id);
//             if (itemIndex === -1) {
//                 this.setNotification(`Item dengan id ${id} tidak ditemukan.`);
//                 return;
//             }

//             const cartItem = this.items[itemIndex];

//             if (cartItem.quantity > 1) {
//                 cartItem.quantity--;
//             } else {
//                 this.items.splice(itemIndex, 1);
//             }

//             this.total -= cartItem.harga;
//             this.quantity--;

//             this.setNotification("Item berhasil dihapus dari keranjang.");
//         },
//     });
// });

// document.addEventListener('DOMContentLoaded', function () {
//     const form = document.querySelector('#checkoutForm');
//     const checkoutButton = document.querySelector('#checkoutButton');

//     if (!form || !checkoutButton) {
//         console.error("Checkout form atau button tidak ditemukan di DOM.");
//         return;
//     }

//     checkoutButton.addEventListener('click', async function (e) {
//         e.preventDefault();
    
//         const formData = new FormData(form);
//         let data = Object.fromEntries(formData.entries());
    
//         // Pastikan items dan total dikirim sebagai JSON valid
//         data.items = Alpine.store("cart").items;
//         data.total = Alpine.store("cart").total;
    
//         console.log("Data yang dikirim:", JSON.stringify(data)); // 🔍 Debugging
    
//         try {
//             let response = await fetch("/api/get-token", {
//                 method: "POST",
//                 headers: {
//                     "Content-Type": "application/json",
//                     "Accept": "application/json"
//                 },
//                 body: JSON.stringify(data),
//             });
    
//             if (!response.ok) {
//                 let errorResult = await response.json();
//                 console.error("Response error:", errorResult); // 🔍 Debugging response
//                 throw new Error(errorResult.error || "Gagal mendapatkan token transaksi");
//             }
            
//             console.log(snap_token);
//             let result = await response.json();
//             window.snap.pay(result.snap_token);
//         } catch (error) {
//             console.error("Error:", error);
//             alert("Terjadi kesalahan: " + error.message);
//         }
//     });
    
// });

   
//     // const message = formatMessage(data);
//     // window.open('https://wa.me/6282213994858?text=' + encodeURIComponent(message));
//     // console.log(data); // Pastikan struktur data benar


// // Format pesan WhatsApp 
// const formatMessage = (obj) => {
//     return `Data Customer:
//         Nama: ${obj.nama || "Tidak Diketahui"}
//         Email: ${obj.email || "Tidak Diketahui"}
//         No Hp: ${obj.phone || "Tidak Diketahui"}

//     Data Pesanan:
//         ${JSON.parse(obj.items).map((item) => `${item.bulan} (${item.quantity} x ${rupiah(item.harga)}) \n`)}

//     Total: ${rupiah(obj.total || 0)}

//     Terima Kasih`;
//     };



// // Fungsi untuk format Rupiah
// const rupiah = (angka) => {
//     return new Intl.NumberFormat('id-ID', {
//         style: 'currency',
//         currency: 'IDR'
//     }).format(angka);
// };


Alpine.data("Tagihan", () => ({
    items: window.tagihan || [],
    formatRupiah(angka) {
        angka = parseFloat(angka);
        return isNaN(angka) ? "Rp 0" : "Rp " + new Intl.NumberFormat("id-ID").format(angka);
    }
}));