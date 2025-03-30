<x-layouts.main title="Pengiriman Aktif">
    <div class="card">
        <div class="grid lg:grid-cols-2 gap-4">

            <div class="text-center">
                <img src="{{ asset('assets/svg/ec-contactless-payment.svg') }}" alt="" class="w-2/3 mx-auto">
            </div>

            <section id="pengiriman">
                <div class="h-full place-content-center">
                    @if ($delivery)
                        <h2 class="text-3xl dark:text-white mb-5">Detail Pengiriman</h2>

                        <div class="mb-3">
                            <h4 class="text-lg dark:text-white">Tujuan</h4>
                            <p class="dark:text-white">{{ $delivery->order->tujuan }}</p>
                        </div>

                        <div class="mb-3">
                            <h4 class="text-lg dark:text-white">Detail</h4>
                            <p class="dark:text-white">{{ $delivery->order->detail }}</p>
                        </div>

                        <div class="flex justify-end mb-4">
                            <button type="button"
                                class="py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-hidden focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none"
                                aria-haspopup="dialog" aria-expanded="false" aria-controls="formSelesai"
                                data-hs-overlay="#formSelesai">
                                Selesai
                            </button>
                        </div>

                        <div id="formSelesai"
                            class="hs-overlay hidden size-full fixed top-0 start-0 z-80 overflow-x-hidden overflow-y-auto pointer-events-none"
                            role="dialog" tabindex="-1" aria-labelledby="formSelesai-label">
                            <div
                                class="hs-overlay-open:mt-7 hs-overlay-open:opacity-100 hs-overlay-open:duration-500 mt-0 opacity-0 ease-out transition-all sm:max-w-lg sm:w-full m-3 sm:mx-auto min-h-[calc(100%-56px)] flex items-center">
                                <div
                                    class="w-full flex flex-col bg-white border border-gray-200 shadow-2xs rounded-xl pointer-events-auto dark:bg-neutral-800 dark:border-neutral-700 dark:shadow-neutral-700/70">
                                    <div
                                        class="flex justify-between items-center py-3 px-4 border-b border-gray-200 dark:border-neutral-700">
                                        <h3 id="formSelesai-label" class="font-bold text-gray-800 dark:text-white">
                                            Pengiriman Selesai
                                        </h3>
                                        <button type="button"
                                            class="size-8 inline-flex justify-center items-center gap-x-2 rounded-full border border-transparent bg-gray-100 text-gray-800 hover:bg-gray-200 focus:outline-hidden focus:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-700 dark:hover:bg-neutral-600 dark:text-neutral-400 dark:focus:bg-neutral-600"
                                            aria-label="Close" data-hs-overlay="#formSelesai">
                                            <span class="sr-only">Close</span>
                                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg"
                                                width="24" height="24" viewBox="0 0 24 24" fill="none"
                                                stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path d="M18 6 6 18"></path>
                                                <path d="m6 6 12 12"></path>
                                            </svg>
                                        </button>
                                    </div>
                                    <form action="{{ route('delivery.active-order.selesai') }}" method="post"
                                        enctype="multipart/form-data" autocomplete="off">
                                        @method('PUT')
                                        @csrf
                                        <input type="hidden" name="delivery_id" value="{{ $delivery->id }}">
                                        <div class="p-4 overflow-y-auto">
                                            <div class="mb-3">
                                                <label for="imageInput" class="block text-sm font-medium mb-2">Bukti
                                                    Foto Pengiriman</label>
                                                <input type="file" name="foto_pengiriman" id="imageInput"
                                                    class="block w-full border border-gray-200 shadow-sm rounded-lg text-sm focus:z-10 focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400
                                                    file:bg-gray-50 file:border-0
                                                    file:me-4
                                                    file:py-3 file:px-4
                                                    dark:file:bg-neutral-700 dark:file:text-neutral-400">
                                            </div>
                                        </div>
                                        <div
                                            class="flex justify-end items-center gap-x-2 py-3 px-4 border-t border-gray-200 dark:border-neutral-700">
                                            <button type="button"
                                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-2xs hover:bg-gray-50 focus:outline-hidden focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
                                                data-hs-overlay="#formSelesai">
                                                Tutup
                                            </button>
                                            <button type="submit"
                                                class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-green-600 text-white hover:bg-green-700 focus:outline-hidden focus:bg-green-700 disabled:opacity-50 disabled:pointer-events-none">
                                                Simpan
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="bg-yellow-50 border border-yellow-200 text-sm text-yellow-800 rounded-lg p-4"
                            role="alert" tabindex="-1" aria-labelledby="hs-with-description-label">
                            <div class="flex">
                                <div class="shrink-0">
                                    <svg class="shrink-0 size-4 mt-0.5" xmlns="http://www.w3.org/2000/svg"
                                        width="24" height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                        stroke-linejoin="round">
                                        <path
                                            d="m21.73 18-8-14a2 2 0 0 0-3.48 0l-8 14A2 2 0 0 0 4 21h16a2 2 0 0 0 1.73-3Z">
                                        </path>
                                        <path d="M12 9v4"></path>
                                        <path d="M12 17h.01"></path>
                                    </svg>
                                </div>
                                <div class="ms-4">
                                    <h3 id="hs-with-description-label" class="text-sm font-semibold">
                                        Tidak ada pengiriman aktif
                                    </h3>
                                    <div class="mt-1 text-sm text-yellow-700">
                                        Silahkan pilih pengiriman di halaman <a
                                            class="underline text-blue-600 dark:text-blue-400 hover:text-blue-700 dark:hover:text-blue-300"
                                            href="{{ route('delivery.orders') }}">Permintaan
                                            Pengiriman</a> terlebih dahulu
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>

            </section>
        </div>
    </div>
</x-layouts.main>
