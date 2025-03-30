<x-layouts.main title="Pengiriman Baru">
    <div class="grid lg:grid-cols-2 gap-4">

        <div class="text-center hidden lg:block">
            <img src="{{ asset('assets/svg/ec-air-delivery.svg') }}" alt="" class="w-2/3 mx-auto">
        </div>

        <section id="formPengiriman">
            <div class="card">
                @if ($hasOrder)
                    <div class="mt-2 mb-4 bg-yellow-100 border border-yellow-200 text-sm text-yellow-800 rounded-lg p-4 dark:bg-yellow-800/10 dark:border-yellow-900 dark:text-yellow-500 flex items-center"
                        role="alert" tabindex="-1" aria-labelledby="hs-soft-color-light-label">
                        <i data-lucide="alert-circle" class="size-4 me-2"></i>
                        Anda telah melakukan pengiriman sebelumnya, harap tunggu sampai pengiriman sebelumnya selesai
                    </div>
                @endif

                <x-errors />

                <form @if ($hasOrder) action="{{ route('new-order.store') }}" @endif method="post"
                    autocomplete="off">
                    @csrf
                    <div class="mb-3">
                        <label for="tujuanInput" class="block text-sm font-medium mb-2">Tujuan</label>
                        <input type="text" id="tujuanInput" name="tujuan"
                            class="py-2.5 sm:py-3 px-4 block w-full border border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none"
                            placeholder="Masukkan tujuan" required @if ($hasOrder) disabled @endif>
                    </div>
                    <div class="mb-3">
                        <label for="detailInput" class="block text-sm font-medium mb-2">Detail</label>
                        <textarea id="detailInput" name="detail"
                            class="py-2 px-3 sm:py-3 sm:px-4 block w-full border-gray-200 rounded-lg sm:text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                            rows="5" placeholder="Masukkan detail pengiriman" required @if ($hasOrder) disabled @endif></textarea>
                    </div>

                    <div class="flex justify-end ">
                        <button type="submit" @if ($hasOrder) disabled @endif
                            class="m-1 ms-0 py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-hidden focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                            Kirim
                        </button>
                    </div>
                </form>
            </div>
        </section>
    </div>
</x-layouts.main>
