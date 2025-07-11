<x-filament::page>
    {{-- Greeting dan Ringkasan --}}
    <div class="bg-gradient-to-r from-amber-400 to-yellow-300 text-black rounded-xl p-6 shadow-md">
        <h2 class="text-2xl font-bold">Halo, {{ auth()->user()->name }} 👋</h2>
        <p class="mt-2 text-md">Selamat datang di dashboard kamu. Yuk cek barang-barang yang sudah dan belum kamu siapkan untuk pindahan!</p>
    </div>

    {{-- Progress Checklist --}}
    <div class="bg-white dark:bg-gray-800 rounded-xl p-6 shadow">
    <h3 class="text-lg font-semibold mb-4">Progress Checklist</h3>

    <progress value="{{ $totalChecked }}" max="{{ $totalChecklist }}"
        class="w-full h-4 rounded overflow-hidden accent-amber-500 bg-gray-200">
    </progress>

    <p class="text-sm text-gray-500 mt-2">
        {{ $totalChecked }} dari {{ $totalChecklist }} barang sudah siap ({{ $progressPercent }}%)
    </p>
</div>


    {{-- Daftar Checklist --}}
    <div>
        <h3 class="text-lg font-semibold mb-4">Checklist Barang Kamu</h3>

        @if(count($checklists ?? []))
            <div class="space-y-3">
                @foreach($checklists as $item)
                    <div class="flex items-center justify-between bg-white dark:bg-gray-800 border rounded-lg px-4 py-3 shadow-sm">
                        <div class="flex items-center space-x-3">
                            <x-heroicon-o-check-circle
                                :class="$item['is_checked'] ? 'text-green-500' : 'text-gray-400'"
                                class="w-6 h-6"
                            />
                            <div>
                                <h4 class="font-medium">{{ $item['nama_barang'] }}</h4>
                                <p class="text-sm text-gray-500">{{ $item['kategori'] ?? '-' }}</p>
                            </div>
                        </div>
                        <span class="text-sm px-2 py-1 rounded 
                            {{ $item['is_checked'] ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ $item['is_checked'] ? 'Sudah dibawa' : 'Belum dibawa' }}
                        </span>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center p-6 bg-white dark:bg-gray-800 rounded-xl shadow">
                <p class="text-gray-500 mb-3">Checklist kamu masih kosong 😅</p>
                <a href="{{ route('filament.admin.resources.barang-checklists.index') }}" class="inline-block bg-amber-500 hover:bg-amber-600 text-white font-semibold px-4 py-2 rounded transition">
                    Tambahkan Barang
                </a>
            </div>
        @endif
    </div>
</x-filament::page>
