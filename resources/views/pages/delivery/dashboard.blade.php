<x-layouts.main title="Dashboard">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow widget-card border border-gray-200">
            <div class="flex items-center mb-2">
                <div class="p-2 bg-blue-100 rounded-md mr-3">
                    <i data-lucide="box" class="text-blue-600"></i>
                </div>
                <span class="text-gray-600 font-medium">Permintaan Pengiriman</span>
            </div>
            <div class="mt-2">
                <h3 class="text-2xl font-bold text-gray-800">{{ $hasActiveOrder ? 'Ada' : 'Tidak Ada' }}</h3>
            </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow widget-card border border-gray-200">
            <div class="flex items-center mb-2">
                <div class="p-2 bg-blue-100 rounded-md mr-3">
                    <i data-lucide="clipboard-list" class="text-blue-600"></i>
                </div>
                <span class="text-gray-600 font-medium">Permintaan Pengiriman Tersedia</span>
            </div>
            <div class="mt-2">
                <h3 class="text-2xl font-bold text-gray-800">{{ number_format($availableOrders) }}</h3>
            </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow widget-card border border-gray-200">
            <div class="flex items-center mb-2">
                <div class="p-2 bg-blue-100 rounded-md mr-3">
                    <i data-lucide="history" class="text-blue-600"></i>
                </div>
                <span class="text-gray-600 font-medium">Total Pengantaran</span>
            </div>
            <div class="mt-2">
                <h3 class="text-2xl font-bold text-gray-800">{{ number_format($totalDeliveries) }}</h3>
            </div>
        </div>
    </div>
</x-layouts.main>
