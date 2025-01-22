<x-guest-layout>
    <form method="POST" action="{{ route('register') }}">
        @csrf

        <!-- Name -->
        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email -->
        <div>
            <label for="email">Email</label>
            <input id="email" type="email" name="email" value="{{ old('email') }}" required>
            @error('email')
                <span>{{ $message }}</span>
            @enderror
        </div>

         <!-- ROLE -->
         <div class="mt-4">
            <x-input-label for="role" :value="__('Role')" />
            <select name="role" id="usertype" class="block mt-1 w-full" required>
                <option value="">Pilih Role</option>
                <option value="siswa">Siswa</option>
                <option value="admin">Admin</option>
                <option value="superadmin">Superadmin</option>
            </select>
        </div>

        <!-- Kelas -->
        <div class="mt-4" id="kelas-section" style="display: none;">
            <x-input-label for="kelas" :value="__('Kelas')" />
            <select id="kelas" name="kelas" class="block mt-1 w-full">
                <option value="x">X</option>
                <option value="xi">XI</option>
                <option value="xii">XII</option>
            </select>
            <x-input-error :messages="$errors->get('kelas')" class="mt-2" />
        </div>

        <!-- Jurusan -->
        <div class="mt-4" id="jurusan-section" style="display: none;">
            <x-input-label for="jurusan" :value="__('Jurusan')" />
            <select id="jurusan" name="jurusan" class="block mt-1 w-full">
                <option value="pplg">PPLG</option>
                <option value="tkj">TKJ</option>
                <option value="an">AN</option>
            </select>
            <x-input-error :messages="$errors->get('jurusan')" class="mt-2" />
        </div>

        <!-- NISN -->
        <div class="mt-4" id="nisn-section" style="display: none;">
            <x-input-label for="nisn" :value="__('NISN')" />
            <x-text-input id="nisn" class="block mt-1 w-full" type="text" name="nisn" :value="old('nisn')" />
            <x-input-error :messages="$errors->get('nisn')" class="mt-2" />
        </div>
        
       <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

<script>
    document.getElementById('usertype').addEventListener('change', function () {
        const isSiswa = this.value === 'siswa';

        // Sections
        document.getElementById('kelas-section').style.display = isSiswa ? 'block' : 'none';
        document.getElementById('jurusan-section').style.display = isSiswa ? 'block' : 'none';
        document.getElementById('nisn-section').style.display = isSiswa ? 'block' : 'none';

        // Enable/Disable fields
        document.getElementById('kelas').disabled = !isSiswa;
        document.getElementById('jurusan').disabled = !isSiswa;
        document.getElementById('nisn').disabled = !isSiswa;

        // Required attribute
        document.getElementById('kelas').required = isSiswa;
        document.getElementById('jurusan').required = isSiswa;
        document.getElementById('nisn').required = isSiswa;
    });
</script>


