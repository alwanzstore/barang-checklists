<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\UserChecklist;
use Illuminate\Support\Facades\Auth;

class UserDashboard extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-home';
    protected static string $view = 'filament.pages.user-dashboard';
    protected static ?string $title = 'Dashboard Pengguna';

    public array $checklists = [];

    public int $totalChecklist = 0;
    public int $totalChecked = 0;
    public int $progressPercent = 0;

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::check() && Auth::user()->role === 'user';
    }

    public function mount(): void
    {
        $this->loadChecklistData();
    }

    protected function loadChecklistData(): void
    {
        $data = UserChecklist::with('barangChecklist.kategori')
            ->where('user_id', Auth::id())
            ->get();

        $this->totalChecklist = $data->count();
        $this->totalChecked = $data->filter(function ($item) {
            return strtolower($item->status ?? '') === 'sudah dibawa';
        })->count();
        $this->progressPercent = $this->totalChecklist > 0
            ? round(($this->totalChecked / $this->totalChecklist) * 100)
            : 0;

        $this->checklists = $data->map(function ($item) {
            return [
                'nama_barang' => $item->barangChecklist->nama_barang ?? 'Barang tidak ditemukan',
                'kategori' => $item->barangChecklist->kategori->nama ?? '-',
                'is_checked' => $item->status === 'sudah dibawa',
            ];
        })->toArray();
    }

    // ✅ Tambahkan ini untuk mengirimkan data ke Blade
    protected function getViewData(): array
    {
        return [
            'checklists' => $this->checklists,
            'totalChecklist' => $this->totalChecklist,
            'totalChecked' => $this->totalChecked,
            'progressPercent' => $this->progressPercent,
        ];
    }
}
