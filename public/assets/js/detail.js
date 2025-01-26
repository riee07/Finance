        // Fungsi untuk menampilkan modal detail
        function showDetail(studentId, month) {
            const modal = document.getElementById('paymentModal');
            modal.classList.remove('hidden');
            
            // Mengisi data ke dalam modal
            document.getElementById('studentId').textContent = studentId;
            document.getElementById('paymentTitle').textContent = `Pembayaran SPP Bulan ${month}`;
            
            // Mengisi tanggal pembayaran
            const paymentDate = new Date();
            paymentDate.setDate(20);
            document.getElementById('paymentDate').textContent = `Tanggal Pembayaran: ${paymentDate.getDate()} ${month}`;
            
            // Mencegah scrolling pada body
            document.body.style.overflow = 'hidden';
        }

        // Fungsi untuk menutup modal
        function closeModal() {
            const modal = document.getElementById('paymentModal');
            modal.classList.add('hidden');
            
            // Mengembalikan scrolling pada body
            document.body.style.overflow = 'auto';
        }        

        // Menutup modal saat mengklik area di luar modal
        document.getElementById('paymentModal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Menutup modal dengan tombol ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });