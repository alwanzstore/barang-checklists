<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BarangChecklistResource\Pages;
use App\Models\BarangChecklist;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Support\Facades\Auth; // ✅ Tambahan

class BarangChecklistResource extends Resource
{
    protected static ?string $model = BarangChecklist::class;

    protected static ?string $navigationGroup = 'Manajemen Checklist';
    protected static ?string $navigationIcon = 'heroicon-o-clipboard-document-check';
    protected static ?string $navigationLabel = 'Barang Checklist';
    protected static ?string $pluralModelLabel = 'Barang Checklist';
    protected static ?string $modelLabel = 'Barang';
    protected static ?int $navigationSort = 2;

    // ✅ Sembunyikan dari admin
    public static function canAccess(): bool
    {
        return Auth::check() && Auth::user()->role !== 'admin';
    }

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\FileUpload::make('foto')
                ->label('Foto')
                ->image()
                ->directory('barang-fotos')
                ->imageEditor()
                ->nullable(),

            Forms\Components\TextInput::make('nama_barang')
                ->label('Nama Barang')
                ->required()
                ->maxLength(100),

            Forms\Components\Textarea::make('deskripsi')
                ->label('Deskripsi')
                ->rows(4)
                ->maxLength(65535),

            Forms\Components\Select::make('kategori_barang_id')
                ->label('Kategori')
                ->relationship('kategori', 'nama')
                ->searchable()
                ->required(),

            Forms\Components\Select::make('prioritas')
                ->label('Prioritas')
                ->options([
                    'tinggi' => 'Tinggi',
                    'sedang' => 'Sedang',
                    'rendah' => 'Rendah',
                ])
                ->required()
                ->native(false),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            ImageColumn::make('foto')
                ->label('Foto')
                ->getStateUsing(fn ($record) => $record->foto
                    ? asset('storage/' . $record->foto)
                    : null)
                ->circular()
                ->height(60)
                ->width(60)
                ->extraImgAttributes(['style' => 'object-fit: cover']),

            Tables\Columns\TextColumn::make('nama_barang')
                ->label('Nama Barang')
                ->sortable()
                ->searchable(),

            Tables\Columns\TextColumn::make('kategori.nama')
                ->label('Kategori')
                ->sortable()
                ->searchable(),

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
            'index' => Pages\ListBarangChecklists::route('/'),
            'create' => Pages\CreateBarangChecklist::route('/create'),
            'edit' => Pages\EditBarangChecklist::route('/{record}/edit'),
        ];
    }
}
