<x-filament::page>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
        <div class="bg-white p-6 rounded-xl shadow text-center">
            <p class="text-sm text-gray-600">Total User</p>
            <p class="text-3xl font-bold text-blue-600">{{ \App\Models\User::count() }}</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow text-center">
            <p class="text-sm text-gray-600">Total Barang Checklist</p>
            <p class="text-3xl font-bold text-green-600">{{ \App\Models\BarangChecklist::count() }}</p>
        </div>
        <div class="bg-white p-6 rounded-xl shadow text-center">
            <p class="text-sm text-gray-600">Total Lokasi Pindahan</p>
            <p class="text-3xl font-bold text-purple-600">{{ \App\Models\LokasiPindahan::count() }}</p>
        </div>
    </div>

    <div class="bg-white p-6 rounded-xl shadow">
        <h2 class="text-xl font-bold mb-4">Selamat Datang Admin 🎉</h2>
        <p class="text-gray-700">Gunakan dashboard ini untuk memantau aktivitas pengguna, checklist barang, dan data lokasi pindahan.</p>
    </div>
</x-filament::page>
