@push('scripts')
    <script type="module">
        $('#passwordInput').on('keyup', function() {
            if ($(this).val().length > 0) {
                if ($('#passwordConfirmationSection').length == 0) {
                    $('#passwordSection').after(`
                        <div class="mb-3" id="passwordConfirmationSection">
                            <label class="block text-sm mb-2" for="passwordConfirmationInput">Konfirmasi Password</label>
                            <div class="relative">
                                <input id="passwordConfirmationInput" type="password" name="password_confirmation"
                                    class="py-2.5 sm:py-3 ps-4 pe-10 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                    placeholder="Masukkan ulang password" required>
                                <button type="button" data-hs-toggle-password='{"target": "#passwordConfirmationInput"}'
                                    class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-hidden focus:text-blue-600">
                                    <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
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
                                        <path class="hidden hs-password-active:block"
                                            d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
                                        </path>
                                        <circle class="hidden hs-password-active:block" cx="12" cy="12" r="3">
                                        </circle>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    `)
                }
            } else {
                if ($('#passwordConfirmationSection').length > 0) {
                    $('#passwordConfirmationSection').remove()
                }
            }
        })
    </script>
@endpush

<x-layouts.main title="Edit Data Pengguna">
    <div class="grid lg:grid-cols-2 gap-4">
        <section id="divisions">
            <div class="card">
                <x-errors />

                <form action="{{ route('admin.user.update', $user) }}" method="post" autocomplete="off">
                    @method('PUT')
                    @csrf
                    <div class="mb-3">
                        <label for="nameInput" class="block text-sm font-medium mb-2">Nama Lengkap</label>
                        <input type="text" id="nameInput" name="nama"
                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            placeholder="Masukkan nama" value="{{ $user->nama }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="emailInput" class="block text-sm font-medium mb-2">Email</label>
                        <input type="email" id="emailInput" name="email"
                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            placeholder="Masukkan email" value="{{ $user->email }}" required>
                    </div>

                    <div class="mb-3" id="passwordSection">
                        <label class="block text-sm mb-2" for="passwordInput">Ganti Password</label>
                        <div class="relative">
                            <input id="passwordInput" type="password" name="password"
                                class="py-2.5 sm:py-3 ps-4 pe-10 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                                placeholder="Masukkan password">
                            <button type="button" data-hs-toggle-password='{"target": "#passwordInput"}'
                                class="absolute inset-y-0 end-0 flex items-center z-20 px-3 cursor-pointer text-gray-400 rounded-e-md focus:outline-hidden focus:text-blue-600">
                                <svg class="shrink-0 size-3.5" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round">
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
                                    <path class="hidden hs-password-active:block"
                                        d="M2 12s3-7 10-7 10 7 10 7-3 7-10 7-10-7-10-7Z">
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
                            @foreach ($divisions as $division)
                                <option value="{{ $division->id }}" @if ($division->id == $user->division_id) selected @endif>
                                    {{ $division->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button type="submit"
                            class="m-1 ms-0 py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-hidden focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                            Simpan
                        </button>
                    </div>
                </form>
            </div>
        </section>

        <div class="text-center">
            <img src="{{ asset('assets/svg/oc-on-the-laptop.svg') }}" alt="" class="w-2/3 mx-auto">
        </div>
    </div>
</x-layouts.main>
