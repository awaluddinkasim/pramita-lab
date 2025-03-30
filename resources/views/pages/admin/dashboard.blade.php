<x-layouts.main title="Dashboard">
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow widget-card border border-gray-200">
            <div class="flex items-center mb-2">
                <div class="p-2 bg-blue-100 rounded-md mr-3">
                    <i data-lucide="shield-user" class="text-blue-600"></i>
                </div>
                <span class="text-gray-600 font-medium">Total Petugas</span>
            </div>
            <div class="mt-2">
                <h3 class="text-2xl font-bold text-gray-800">{{ $deliveryPeople }}</h3>
            </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow widget-card border border-gray-200">
            <div class="flex items-center mb-2">
                <div class="p-2 bg-blue-100 rounded-md mr-3">
                    <i data-lucide="network" class="text-blue-600"></i>
                </div>
                <span class="text-gray-600 font-medium">Jumlah Divisi</span>
            </div>
            <div class="mt-2">
                <h3 class="text-2xl font-bold text-gray-800">{{ $divisions }}</h3>
            </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow widget-card border border-gray-200">
            <div class="flex items-center mb-2">
                <div class="p-2 bg-blue-100 rounded-md mr-3">
                    <i data-lucide="clipboard-list" class="text-blue-600"></i>
                </div>
                <span class="text-gray-600 font-medium">Permintaan Pengiriman Pending</span>
            </div>
            <div class="mt-2">
                <h3 class="text-2xl font-bold text-gray-800">{{ $pendingOrders }}</h3>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">

        <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow widget-card border border-gray-200">
            <div class="flex items-center mb-2">
                <div class="p-2 bg-orange-100 rounded-md mr-3">
                    <i data-lucide="users-round" class="text-orange-600"></i>
                </div>
                <span class="text-gray-600 font-medium">Pengguna Baru</span>
            </div>
            <div class="mt-2">
                <h3 class="text-2xl font-bold text-gray-800">{{ $newUsers }}</h3>
            </div>
        </div>

        <div class="bg-gray-50 rounded-lg p-4 hover:shadow-md transition-shadow widget-card border border-gray-200">
            <div class="flex items-center mb-2">
                <div class="p-2 bg-green-100 rounded-md mr-3">
                    <i data-lucide="user-round-check" class="text-green-600"></i>
                </div>
                <span class="text-gray-600 font-medium">Pengguna Aktif</span>
            </div>
            <div class="mt-2">
                <h3 class="text-2xl font-bold text-gray-800">{{ $activeUsers }}</h3>
            </div>
        </div>
    </div>

</x-layouts.main>
