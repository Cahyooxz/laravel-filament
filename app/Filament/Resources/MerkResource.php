<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MerkResource\Pages;
use App\Filament\Resources\MerkResource\RelationManagers;
use App\Models\Merk;
use Filament\Forms;
use Filament\Forms\Components\Select;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class MerkResource extends Resource
{
    protected static ?string $model = Merk::class;

    protected static ?string $navigationIcon = 'heroicon-o-tag';
  
    public static function getPluralLabel(): ?string
    {
        return 'Daftar Merk Barang'; // Plural label
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama_merk')
                ->label('Nama Merk')
                ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_merk')->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
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
            'index' => Pages\ListMerks::route('/'),
            'create' => Pages\CreateMerk::route('/create'),
            'edit' => Pages\EditMerk::route('/{record}/edit'),
        ];
    }
}
