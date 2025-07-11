<?php

namespace App\Filament\Resources;

use App\Models\UserChecklist;
use App\Models\User;
use App\Models\BarangChecklist;
use App\Models\LokasiPindahan;

use Filament\Forms\Form;
use Filament\Forms;
use Filament\Tables\Table;
use Filament\Tables;
use Filament\Resources\Resource;

use App\Filament\Resources\UserChecklistResource\Pages;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;


class UserChecklistResource extends Resource
{
    protected static ?string $model = UserChecklist::class;

    protected static ?string $navigationIcon = 'heroicon-o-clipboard';
    protected static ?string $navigationLabel = 'Checklist Pengguna';
    protected static ?string $navigationGroup = 'Manajemen Checklist';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('User')
                    ->relationship('user', 'name')
                    ->required(),

                Forms\Components\Select::make('barang_checklist_id')
                    ->label('Barang')
                    ->relationship('barangChecklist', 'nama_barang')
                    ->required(),

                Forms\Components\Select::make('status')
                    ->label('Status')
                    ->options([
                        'belum dibawa' => 'Belum Dibawa',
                        'sudah dibawa' => 'Sudah Dibawa',
                        'tidak dibutuhkan' => 'Tidak Dibutuhkan',
                    ])
                    ->required(),

                Forms\Components\Textarea::make('catatan')
                    ->label('Catatan')
                    ->rows(3),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('user.name')->label('User'),
                Tables\Columns\TextColumn::make('barangChecklist.nama_barang')->label('Barang'),
                Tables\Columns\TextColumn::make('barangChecklist.kategori.nama')->label('Kategori'),
                Tables\Columns\TextColumn::make('status')
                ->badge()
                ->colors([
                    'danger' => 'belum dibawa',
                    'success' => 'sudah dibawa',
                    'warning' => 'tidak dibutuhkan',
                    ]),
                Tables\Columns\TextColumn::make('catatan')->limit(30)->wrap(),
                Tables\Columns\TextColumn::make('created_at')->dateTime()->label('Dibuat'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUserChecklists::route('/'),
            'create' => Pages\CreateUserChecklist::route('/create'),
            'edit' => Pages\EditUserChecklist::route('/{record}/edit'),
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
