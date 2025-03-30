<x-layouts.auth title="Register">
    <img src="{{ asset('assets/images/logo.jpg') }}" alt="" class="rounded mb-10 w-sm mx-auto">

    <h1 class="text-4xl dark:text-white">Buat Akun</h1>
    <p class="text-lg dark:text-white">Silahkan lengkapi form dibawah</p>

    <form action="{{ route('register.store') }}" method="post" class="mt-5" autocomplete="off">
        @csrf

        <x-errors />

        <div class="mb-3">
            <label for="nameInput" class="block text-sm font-medium mb-2">Nama Lengkap</label>
            <input type="text" id="nameInput" name="nama"
                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                placeholder="Masukkan nama" required>
        </div>

        <div class="mb-3">
            <label for="emailInput" class="block text-sm font-medium mb-2">Email</label>
            <input type="email" id="emailInput" name="email"
                class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                placeholder="Masukkan email" required>
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium mb-2" for="passwordInput">Password</label>
            <div class="relative">
                <input id="passwordInput" type="password" name="password"
                    class="py-2.5 sm:py-3 ps-4 pe-10 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                    placeholder="Masukkan password" required>
                <button type="button" data-hs-toggle-password='{"target": "#passwordInput"}'
                    class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-hidden focus:text-blue-600">
                    <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                        </path>
                        <path class="hs-password-active:hidden"
                            d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                        </path>
                        <path class="hs-password-active:hidden"
                            d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                        </path>
                        <line class="hs-password-active:hidden" x1="2" x2="22" y1="2"
                            y2="22"></line>
                        <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                        </path>
                        <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3">
                        </circle>
                    </svg>
                </button>
            </div>
        </div>

        <div class="mb-3">
            <label class="block text-sm font-medium mb-2" for="passwordConfirmationInput">Konfirmasi Password</label>
            <div class="relative">
                <input id="passwordConfirmationInput" type="password" name="password_confirmation"
                    class="py-2.5 sm:py-3 ps-4 pe-10 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                    placeholder="Masukkan ulang password" required>
                <button type="button" data-hs-toggle-password='{"target": "#passwordConfirmationInput"}'
                    class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-hidden focus:text-blue-600">
                    <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path class="hs-password-active:hidden" d="M9.88 9.88a3 3 0 1 0 4.24 4.24">
                        </path>
                        <path class="hs-password-active:hidden"
                            d="M10.73 5.08A10.43 10.43 0 0 1 12 5c7 0 10 7 10 7a13.16 13.16 0 0 1-1.67 2.68">
                        </path>
                        <path class="hs-password-active:hidden"
                            d="M6.61 6.61A13.526 13.526 0 0 0 2 12s3 7 10 7a9.74 9.74 0 0 0 5.39-1.61">
                        </path>
                        <line class="hs-password-active:hidden" x1="2" x2="22" y1="2"
                            y2="22"></line>
                        <path class="hidden hs-password-active:block" d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                        </path>
                        <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3">
                        </circle>
                    </svg>
                </button>
            </div>
        </div>

        <div class="mb-3">
            <label for="divisionSelect" class="block text-sm font-medium mb-2">Divisi</label>
            <select id="divisionSelect" name="division_id"
                class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                required>
                <option value="" selected hidden>Pilih</option>
                @foreach ($divisions as $division)
                    <option value="{{ $division->id }}">{{ $division->nama }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit"
            class="mb-3 mt-5 w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Daftar
        </button>

        <button type="button" onclick="location.href='{{ route('login') }}'"
            class="w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-hidden focus:text-blue-800 disabled:opacity-50 disabled:pointer-events-none dark:text-blue-500 dark:hover:text-blue-400 dark:focus:text-blue-400">
            Sudah punya akun
        </button>
    </form>
</x-layouts.auth>
