<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LokasiPindahanResource\Pages;
use App\Models\LokasiPindahan;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class LokasiPindahanResource extends Resource
{
    protected static ?string $model = LokasiPindahan::class;

    protected static ?string $navigationGroup = 'Manajemen Lokasi';

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';
    protected static ?string $navigationLabel = 'Lokasi Pindahan';
    protected static ?string $pluralModelLabel = 'Lokasi Pindahan';
    protected static ?string $modelLabel = 'Lokasi';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Select::make('user_id')
            ->label('User')
            ->relationship('user', 'name')
            ->searchable()
            ->preload()
            ->required(),

            Forms\Components\TextInput::make('nama_lokasi')
                ->label('Nama Lokasi')
                ->required()
                ->maxLength(255),

            Forms\Components\Textarea::make('alamat')
                ->label('Alamat')
                ->rows(4)
                ->maxLength(65535),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('user.name')
                ->label('Pengguna')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('nama_lokasi')
                ->label('Nama Lokasi')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('alamat')
                ->label('Alamat')
                ->limit(50)
                ->wrap(),

            Tables\Columns\TextColumn::make('created_at')
                ->label('Dibuat')
                ->date('d M Y'),
        ])
        ->defaultSort('created_at', 'desc')
        ->filters([])
        ->actions([
            Tables\Actions\EditAction::make(),
            Tables\Actions\DeleteAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLokasiPindahans::route('/'),
            'create' => Pages\CreateLokasiPindahan::route('/create'),
            'edit' => Pages\EditLokasiPindahan::route('/{record}/edit'),
        ];
    }

    public static function canAccess(): bool
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }

    public static function shouldRegisterNavigation(): bool
    {
        return Auth::check() && Auth::user()->role === 'admin';
    }
}
