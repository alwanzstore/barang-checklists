<?php

namespace App\Filament\Resources;

use App\Models\LokasiPindahan;
use Filament\Resources\Resource;
use Filament\Tables;
use App\Filament\Resources\LokasiPindahanUserResource\Pages;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class LokasiPindahanUserResource extends Resource
{
    protected static ?string $model = LokasiPindahan::class;

    protected static ?string $navigationGroup = 'Manajemen Lokasi'; // buat ganti nama kategori
    protected static ?string $navigationLabel = 'Lokasi Pindahan Saya';  // buat ganti nama sidebar
    
    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?string $pluralModelLabel = 'Lokasi Pindahan';
    protected static ?string $modelLabel = 'Lokasi Pindahan';
    protected static ?int $navigationSort = 4;

    public static function form(\Filament\Forms\Form $form): \Filament\Forms\Form
    {
        return $form->schema([
            \Filament\Forms\Components\Hidden::make('user_id')
                ->default(fn () => Auth::id()),

            \Filament\Forms\Components\TextInput::make('nama_lokasi')
                ->label('Nama Lokasi')
                ->required()
                ->maxLength(255),

            \Filament\Forms\Components\Textarea::make('alamat')
                ->label('Alamat')
                ->required()
                ->rows(3)
                ->maxLength(65535),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('nama_lokasi')->label('Nama Lokasi')->searchable(),
            Tables\Columns\TextColumn::make('alamat')->label('Alamat')->limit(50)->wrap(),
            Tables\Columns\TextColumn::make('created_at')->label('Tanggal')->dateTime('d M Y'),
        ])
        ->defaultSort('created_at', 'desc')
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ]);
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', Auth::id());
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLokasiPindahanUsers::route('/'),
            'create' => Pages\CreateLokasiPindahanUser::route('/create'),
            'edit' => Pages\EditLokasiPindahanUser::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return Auth::check() && Auth::user()->role === 'user';
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::check() && Auth::user()->role === 'user';
    }
}
