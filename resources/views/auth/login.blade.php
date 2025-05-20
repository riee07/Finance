<x-allLinks></x-allLinks>
    <div class="min-h-screen flex items-center justify-center !bg-white px-4 py-12">
        {{-- Card login --}}
        <div class="w-full max-w-md !bg-white text-gray-800 p-8 rounded-2xl shadow-lg border border-gray-200">
            {{-- Judul --}}
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold">
                    Masuk ke <span class="text-green-500">Amaliah Finance</span>
                </h1>
                <p class="text-gray-500 text-sm mt-2">Permudah pembayaran dengan sistem online</p>
            </div>

            {{-- Session Status --}}
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}">
                @csrf

                {{-- Email --}}
                <div class="mb-4">
                    <x-input-label for="email" class="text-gray-700" value="Email" />
                    <x-text-input id="email" name="email" type="email"
                        class="mt-1 w-full !bg-white text-gray-900 border-gray-300 focus:ring-green-500 focus:border-green-500 rounded-md"
                        required autofocus autocomplete="username" />
                </div>

                {{-- Password --}}
                <div class="mb-4">
                    <x-input-label for="password" class="text-gray-700" value="Password" />
                    <x-text-input id="password" name="password" type="password"
                        class="mt-1 w-full !bg-white text-gray-900 border-gray-300 focus:ring-green-500 focus:border-green-500 rounded-md"
                        required autocomplete="current-password" />
                    <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />
                </div>

                {{-- Remember --}}
                <div class="flex items-center mb-4">
                    <input id="remember_me" type="checkbox" name="remember"
                        class="rounded border-gray-300 text-green-600 shadow-sm focus:ring-green-500">
                    <label for="remember_me" class="ms-2 text-sm text-gray-600">Ingat saya</label>
                </div>

                {{-- Lupa dan Masuk --}}
                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-500 hover:text-gray-700" href="{{ route('password.request') }}">
                            Lupa password?
                        </a>
                    @endif

                    <x-primary-button class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-md">
                        MASUK
                    </x-primary-button>
                </div>
            </form>
        </div>
    </div>
