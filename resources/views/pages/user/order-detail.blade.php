<x-layouts.main title="Detail Pengiriman">
    <div class="card">
        <div class="grid lg:grid-cols-2 gap-4">

            <div class="text-center">
                <img src="{{ asset('assets/svg/ec-contactless-payment.svg') }}" alt="" class="w-2/3 mx-auto">
            </div>

            <section id="formPengiriman">
                <h2 class="text-3xl dark:text-white mb-5">Detail Pengiriman</h2>

                <div class="mb-3">
                    <h4 class="text-lg dark:text-white font-medium">Tujuan</h4>
                    <p class="dark:text-white">{{ $order->tujuan }}</p>
                </div>

                <div class="mb-3">
                    <h4 class="text-lg dark:text-white font-medium">Detail</h4>
                    <p class="dark:text-white">{{ $order->detail }}</p>
                </div>

                <hr class="my-7  text-gray-200 dark:text-neutral-600">

                <h2 class="text-3xl dark:text-white mb-5">Informasi Pengiriman</h2>

                @if ($order->delivery)
                    <div class="mb-3">
                        <h4 class="text-lg dark:text-white font-medium">Nama Petugas</h4>
                        <p class="dark:text-white">{{ $order->delivery->nama_petugas }}</p>
                    </div>

                    <div class="mb-3">
                        <h4 class="text-lg dark:text-white font-medium">Tanggal Pengiriman</h4>
                        <p class="dark:text-white">{{ createDate($order->delivery->created_at) }}</p>
                    </div>

                    <div class="mb-3">
                        <h4 class="text-lg dark:text-white font-medium">Status</h4>
                        <p class="dark:text-white">
                            @if ($order->delivery->selesai)
                                Selesai
                            @else
                                Proses
                            @endif
                        </p>
                    </div>

                    @if ($order->delivery->selesai)
                        <div class="mb-3">
                            <h4 class="text-lg dark:text-white font-medium">Selesai Pada</h4>
                            <p class="dark:text-white">{{ createDateTime($order->delivery->waktu_selesai) }}</p>
                        </div>

                        <div class="mb-3">
                            <h4 class="text-lg dark:text-white font-medium">Bukti Pengiriman</h4>
                            <img src="{{ asset('pengiriman/' . $order->delivery->foto_pengiriman) }}" alt=""
                                class="rounded-xl">
                        </div>
                    @endif
                @else
                    <div class="mb-5">
                        Masih menunggu pengiriman
                    </div>

                    <form action="{{ route('order.cancel', $order) }}" method="post">
                        @method('DELETE')
                        @csrf
                        <button type="submit"
                            class="ms-0 py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-hidden focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                            Batalkan
                        </button>
                    </form>
                @endif

            </section>
        </div>
    </div>
</x-layouts.main>
