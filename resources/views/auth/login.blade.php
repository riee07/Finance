<x-layout>
    <section class="flex items-center justify-center px-2 pt-20 min-h-screen bg-white">
      <div class="absolute hidden top-0 left-0 w-full h-screen lg:grid grid-rows-12 justify-center justify-items-center grid-cols-8 lg:grid-cols-11">
        <img src="assets/images/ak.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse col-start-3 col-end-4 row-start-3 lg:col-start-6  lg:col-end-7 lg:row-start-2">
        <img src="assets/images/an.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse  col-start-6 col-end-7 row-start-3 lg:col-start-2  lg:col-end-3 lg:row-start-3">
        <img src="assets/images/dpb.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse col-start-2 col-end-3 row-start-4 lg:col-start-10  lg:col-end-11 lg:row-start-3">
        <img src="assets/images/lps.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse col-start-7 col-end-8 row-start-4 lg:col-start-3  lg:col-end-4 lg:row-start-7">
        <img src="assets/images/mp.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse col-start-2 col-end-3 row-start-9 lg:col-start-9  lg:col-end-10 lg:row-start-7">
        <img src="assets/images/pplg.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse col-start-7 col-end-8 row-start-9 lg:col-start-2  lg:col-end-3 lg:row-start-9">
        <img src="assets/images/tkj.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse col-start-3 col-end-4 row-start-10 lg:col-start-10  lg:col-end-11 lg:row-start-9">
        <img src="assets/images/br.png" alt="" class="h-[40px] lg:h-[60px] animate-pulse col-start-6 col-end-7 row-start-10 lg:col-start-6  lg:col-end-7 lg:row-start-12">
      </div>
      <div class="bg-transparent lg:relative rounded-xl lg:shadow-md w-full max-w-md px-8 py-16 z-50">
        <a href="/">
            <div class="text-left flex items-center justify-start absolute top-0 left-0 m-5">
                <i class="bi bi-arrow-left-short text-2xl"></i>
                <p>kembali</p>
            </div>     
        </a>

            <div class="flex justify-center mb-6">
                <img src="assets/images/lps.png" class="h-20" alt="">
            </div>

            <h1 class="text-center text-2xl font-semibold text-gray-900 mb-1 capitalize">selamat datang di amaliah finance</h1>
            <p class="text-center text-sm text-gray-500 mb-14 capitalize">bayar semua pembayaran amaliah di sini</p>
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <form method="POST" action="{{ route('login') }}" class="space-y-4">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input id="email" name="email" type="email" placeholder="Email address" required autofocus autocomplete="username"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2.5 focus:ring-primary focus:border-primary" />
            </div>
            <div>
                <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                <input id="password" name="password" type="password" placeholder="Enter Password" required autocomplete="current-password"
                    class="mt-1 block w-full border border-gray-300 rounded-md p-2.5 focus:ring-primary focus:border-primary" />
                <x-input-error :messages="$errors->get('password')" class="mt-2 text-red-500" />

            </div>
            <div class="text-right">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-right text-gray-500 hover:text-gray-700 mt-5" href="{{ route('password.request') }}">
                        Lupa password?
                    </a>
                @endif
            </div>

            <button type="submit"
                    class="w-full py-2.5  font-semibold rounded-md bg-gradient-to-r bg-primary hover:opacity-90 transition">
                Submit
            </button>
            <div class="flex items-center w-full justify-center">
                <hr class="w-[200px] text-center">
            </div>
            </form>

            

            <p class="text-xs text-gray-400 text-center mt-6">
                
                    <i class="bi bi-info-circle text-xl my-auto mr-2"></i>

                jika tidak tahu cara login atau tidak tahu password atau tidak tahu email silahkan hubungi
            <a href="#" class="underline text-primary">admin</a>
            </p>
        </div>
    </section>
</x-layout>

<div class="min-h-screen hidden items-center justify-center bg-white px-4 py-12 ">
        {{-- Card login --}}
        <div class="w-full max-w-md !bg-white text-gray-800 p-8 rounded-2xl shadow-lg border border-gray-200 z-50">
            {{-- Judul --}}
            <div class="text-center mb-6">
                <h1 class="text-2xl font-bold">
                    Masuk ke <span class="text-green-500">Amaliah Finance</span>
                </h1>
                <p class="text-gray-500 text-sm mt-2">Permudah pembayaran dengan sistem online</p>
            </div>

            {{-- Session Status --}}

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
