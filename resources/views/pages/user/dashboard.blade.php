<x-layouts.main title="Dashboard">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow widget-card border border-gray-200">
            <div class="flex items-center mb-2">
                <div class="p-2 bg-blue-100 rounded-md mr-3">
                    <i data-lucide="history" class="text-blue-600"></i>
                </div>
                <span class="text-gray-600 font-medium">Total Pengiriman</span>
            </div>
            <div class="mt-2">
                <h3 class="text-2xl font-bold text-gray-800">{{ number_format($totalOrders) }}</h3>
            </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow widget-card border border-gray-200">
            <div class="flex items-center mb-2">
                <div class="p-2 bg-orange-100 rounded-md mr-3">
                    <i data-lucide="file-clock" class="text-orange-600"></i>
                </div>
                <span class="text-gray-600 font-medium">Pengiriman Pending</span>
            </div>
            <div class="mt-2">
                <h3 class="text-2xl font-bold text-gray-800">{{ number_format($pendingOrders) }}</h3>
            </div>
        </div>
        <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow widget-card border border-gray-200">
            <div class="flex items-center mb-2">
                <div class="p-2 bg-green-100 rounded-md mr-3">
                    <i data-lucide="file-check-2" class="text-green-600"></i>
                </div>
                <span class="text-gray-600 font-medium">Pengiriman Selesai</span>
            </div>
            <div class="mt-2">
                <h3 class="text-2xl font-bold text-gray-800">{{ number_format($deliveredOrders) }}</h3>
            </div>
        </div>
    </div>
</x-layouts.main>
