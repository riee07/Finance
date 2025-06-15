{{-- <div class="max-w-md mx-auto mt-10">
    <h2 class="text-xl font-bold mb-4">Lengkapi Nomor HP</h2>

    <form method="POST" action="{{ route('siswa.lengkapi.nohp.submit') }}">
        @csrf

        <div class="mb-4">
            <label for="no_hp" class="block text-sm font-medium text-gray-700">Nomor HP</label>
            <input type="text" name="no_hp" id="no_hp" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm" required>
            @error('no_hp')
                <div class="text-red-600 text-sm mt-1">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md">Simpan</button>
    </form>
</div> --}}

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Amaliah - Lengkapi Nomor HP</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background: linear-gradient(135deg, #f0f9ff 0%, #e0f2fe 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            position: relative;
            overflow-x: hidden;
        }

        /* Background decorative elements */
        body::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -20%;
            width: 40%;
            height: 200%;
            background: linear-gradient(45deg, rgba(34, 197, 94, 0.05) 0%, rgba(16, 185, 129, 0.05) 100%);
            border-radius: 50%;
            z-index: 0;
        }

        body::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -20%;
            width: 50%;
            height: 150%;
            background: linear-gradient(-45deg, rgba(34, 197, 94, 0.03) 0%, rgba(16, 185, 129, 0.03) 100%);
            border-radius: 50%;
            z-index: 0;
        }



        /* Main Content */
        .main-content {
            flex: 1;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 3rem 2rem;
            position: relative;
            z-index: 5;
            min-height: 100vh;
        }

        .form-container {
            background: white;
            border-radius: 20px;
            padding: 3rem;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
            position: relative;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .form-container::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #22c55e 0%, #16a34a 50%, #22c55e 100%);
            border-radius: 20px 20px 0 0;
        }

        .form-header {
            text-align: center;
            margin-bottom: 2rem;
        }

        .form-title {
            font-size: 2rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 0.5rem;
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .form-subtitle {
            color: #6b7280;
            font-size: 1rem;
            line-height: 1.5;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-label {
            display: block;
            font-weight: 600;
            color: #374151;
            margin-bottom: 0.5rem;
            font-size: 0.95rem;
        }

        .form-input {
            width: 100%;
            padding: 1rem 1.25rem;
            border: 2px solid #e5e7eb;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
            background: #fafafa;
        }

        .form-input:focus {
            outline: none;
            border-color: #22c55e;
            background: white;
            box-shadow: 0 0 0 3px rgba(34, 197, 94, 0.1);
        }

        .error-message {
            color: #ef4444;
            font-size: 0.85rem;
            margin-top: 0.5rem;
            display: flex;
            align-items: center;
            gap: 0.25rem;
        }

        .submit-btn {
            width: 100%;
            background: linear-gradient(135deg, #22c55e 0%, #16a34a 100%);
            color: white;
            padding: 1rem 2rem;
            border: none;
            border-radius: 12px;
            font-size: 1.1rem;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            box-shadow: 0 8px 25px rgba(34, 197, 94, 0.3);
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 35px rgba(34, 197, 94, 0.4);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* Decorative icons */
        .decoration-icon {
            position: absolute;
            color: rgba(34, 197, 94, 0.1);
            font-size: 2rem;
            z-index: 1;
        }

        .icon-top-left {
            top: 1rem;
            left: 1rem;
        }

        .icon-bottom-right {
            bottom: 1rem;
            right: 1rem;
        }

        /* Mobile Responsive */
        @media (max-width: 768px) {
            .form-container {
                margin: 1rem;
                padding: 2rem;
            }

            .form-title {
                font-size: 1.75rem;
            }

            .main-content {
                padding: 2rem 1rem;
            }
        }

        /* Animation */
        .form-container {
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .floating {
            animation: float 3s ease-in-out infinite;
        }

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
        }
    </style>
</head>
<body>
    <!-- Main Content -->
    <main class="main-content">
        <div class="form-container floating">
            <!-- Decorative Icons -->
            <div class="decoration-icon icon-top-left">📱</div>
            <div class="decoration-icon icon-bottom-right">✨</div>

            <div class="form-header">
                <h2 class="form-title">Lengkapi Nomor HP</h2>
                <p class="form-subtitle">
                    Masukkan nomor HP Anda untuk melengkapi data dan memudahkan komunikasi dengan sekolah
                </p>
            </div>

            <form method="POST" action="{{ route('siswa.lengkapi.nohp.submit') }}">
                <!-- CSRF Token (placeholder for Laravel) -->
                <input type="hidden" name="_token" value="csrf-token-placeholder">

                <div class="form-group">
                    <label for="no_hp" class="form-label">Nomor HP</label>
                    <input 
                        type="tel" 
                        name="no_hp" 
                        id="no_hp" 
                        class="form-input" 
                        placeholder="Contoh: 08123456789"
                        required
                        pattern="[0-9]{10,13}"
                        title="Masukkan nomor HP yang valid (10-13 digit)"
                    >
                    <!-- Error message placeholder -->
                    <div class="error-message" style="display: none;">
                        ⚠️ Nomor HP harus berupa angka dan memiliki 10-13 digit
                    </div>
                </div>

                <button type="submit" class="submit-btn">
                    💾 Simpan Data
                </button>
            </form>
        </div>
    </main>

    <script>
        // Form validation
        document.getElementById('no_hp').addEventListener('input', function() {
            const input = this;
            const errorMsg = this.parentNode.querySelector('.error-message');
            const value = input.value.replace(/\D/g, ''); // Remove non-digits
            
            // Auto-format: only allow numbers
            input.value = value;
            
            // Validation
            if (value.length < 10 || value.length > 13) {
                input.style.borderColor = '#ef4444';
                errorMsg.style.display = 'flex';
            } else {
                input.style.borderColor = '#22c55e';
                errorMsg.style.display = 'none';
            }
        });

        // Form submission with validation
        document.querySelector('form').addEventListener('submit', function(e) {
            const noHp = document.getElementById('no_hp').value;
            const cleanNoHp = noHp.replace(/\D/g, '');
            
            if (cleanNoHp.length < 10 || cleanNoHp.length > 13) {
                e.preventDefault();
                alert('Mohon masukkan nomor HP yang valid (10-13 digit)');
                return false;
            }

            // Show loading state
            const submitBtn = this.querySelector('.submit-btn');
            submitBtn.innerHTML = '⏳ Menyimpan...';
            submitBtn.disabled = true;
        });

        // Add some interactive effects
        document.querySelectorAll('.form-input').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentNode.style.transform = 'scale(1.02)';
                this.parentNode.style.transition = 'transform 0.2s ease';
            });
            
            input.addEventListener('blur', function() {
                this.parentNode.style.transform = 'scale(1)';
            });
        });
    </script>
</body>
</html>