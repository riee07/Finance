document.addEventListener('alpine:init', () => {
    Alpine.data('sppData', () => ({
        items: [
            { id: 1, bulan: 'Januari', harga: 350000 },
            { id: 2, bulan: 'Februari', harga: 350000 },
            { id: 3, bulan: 'Maret', harga: 350000 },
            { id: 4, bulan: 'April', harga: 350000 },
            { id: 5, bulan: 'Mei', harga: 350000 },
            { id: 6, bulan: 'Juni', harga: 350000 },
            { id: 7, bulan: 'Juli', harga: 350000 },
            { id: 8, bulan: 'Agustus', harga: 350000 },
            { id: 9, bulan: 'September', harga: 350000 },
            { id: 10, bulan: 'Oktober', harga: 350000 },
            { id: 11, bulan: 'November', harga: 350000 },
            { id: 12, bulan: 'Desember', harga: 350000 },
            // Tambahkan data lainnya jika perlu
        ],
        open: false,
        formatRupiah(angka) {
            return 'Rp ' + new Intl.NumberFormat('id-ID').format(angka);
        }
    }));

    Alpine.store('cart', {
        items: [],
        total: 0,
        bulan: '',
        // quantity: 0,
        add(newItems) {
            this.items.push(newItems);
            /* agar jumlah bulannya nambah, Tapi buat nnti pas pengembangan aja*/
            // this.quantity++;
            /* buat harganya jadi namabah, itu ge pas pengembangan aja*/
            // this.total += newItems.harga;
            this.total = newItems.harga;
            this.bulan = newItems.bulan;
            console.log(this.bulan);
            console.log(this.total);
        }
    });

});

// Fungsi formatRupiah untuk penggunaan global
const formatRupiah = (angka) => {
    return 'Rp ' + new Intl.NumberFormat('id-ID').format(angka);
};



/// Form validation 
const payButton = document.querySelector('#payButton');
payButton.disabled = true;

const form = document.querySelector('#payForm');

form.addEventListener('keyup', function(){
    for(let i = 0; i < form.elements.lenght; i++ ) {
        if(form.elements[i].value.lenght !== 0) {
            payButton.classList.remove('disabled');
            payButton.classList.add('disabled');
        } else {
            return false;
        }
    }
    payButton.disabled = false;
    payButton.classList.remove('disabled');
});

// kirim data saat button di klik
payButton.addEventListener('click', async function(e) {
    e.preventDefault();
    const formData = new FormData(form);
    const data = new URLSearchParams(formData);
    const objData = Object.fromEntries(data);
    const message = formatMessage(objData);
    window.open('http://wa.me/6282213994858?text=' + encodeURIComponent(message));

    // // Minta transaction token pake ajax
    // try {
    //     const response = await fetch('asset/php/spp.php', {
    //         method: 'POST',
    //         body: formData
    //     });

    //     const snapToken = await response.text();
    //     // Menjalankan Snap dengan token yang diterima
    //     // window.snap.pay(snapToken);
    // } catch (error) {
    //     console.error('Error:', error);
    // }   

    // console.log(snapToken);
    // window.snap.embed('YOUR_SNAP_TOKEN', {
    //     embedId: 'snap-container'
    //   });
    // console.log(objData); // objData akan mencetak semua data form sebagai objek
});

// format pesan whatssap
const formatMessage = (obj) => {
    return `Data Customer
Nama: ${obj.nama}
Kelas: ${obj.kelas}
No HP: ${obj.phone}
Data Pesanan: 
${JSON.parse(obj.items).map((item) => `Bulan: ${item.bulan} Harga: ${item.harga}`).join('\n')}
TOTAL: ${formatRupiah(obj.total)}
Terima Kasih`;
};

// form.addEventListener('keyup', function(){
//     let allFilled = true; // Flag untuk memeriksa semua input
//     for(let i = 0; i < form.elements.lenght; i++ ) {
//         if(form.elements[i].value.lenght === 0) {
//             allFilled = false; // Jika ada yang kosong, set flag ke false
//             break; // Keluar dari loop
//         }
//     }
//     payButton.disabled = !allFilled; // Aktifkan tombol jika semua terisi
//     payButton.classList.toggle('disabled', !allFilled); // Tambah atau hapus kelas disabled
// });

// // kirim data saat button di klik
// payButton.addEventListener('click', async function(e) {
//     e.preventDefault();
//     const formData = new FormData(form);
//     const data = new URLSearchParams(formData);
//     const objData = Object.fromEntries(data);

//     try {
//         const response = await fetch('asset/php/spp.php', {
//             method: 'POST',
//             body: formData
//         });

//         const snapToken = await response.text();
//         console.log(snapToken); // Pindahkan log ini ke sini
//         // Menjalankan Snap dengan token yang diterima
//         // window.snap.pay(snapToken);
//     } catch (error) {
//         console.error('Error:', error);
//     }   
// });

// // format pesan whatssap
// const formatMessage = (obj) => {
//     return `Data Customer
// Nama: ${obj.nama}
// Kelas: ${obj.kelas}
// No HP: ${obj.phone}
// Data Pesanan: 
// ${obj.items.map((item) => `Bulan: ${item.bulan} Harga: ${item.harga}`).join('\n')}
// TOTAL: ${formatRupiah(obj.total)}
// Terima Kasih`;
// };