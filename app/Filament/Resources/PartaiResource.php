<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PartaiResource\Pages;
use App\Filament\Resources\PartaiResource\RelationManagers;
use App\Models\Partai;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PartaiResource extends Resource
{
    protected static ?string $model = Partai::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
        protected static ?string $pluralLabel = 'Partai';
    protected static ?string $pluralModelLabel = 'Partai';
    protected static ?string $label = 'Partai';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
//                Forms\Components\TextInput::make('partai_uuid')
//                    ->required()
//                    ->maxLength(36),
                Forms\Components\TextInput::make('no_partai'),
                Forms\Components\TextInput::make('nama_partai')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('deskripsi')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
//                Tables\Columns\TextColumn::make('partai_uuid'),
                Tables\Columns\TextColumn::make('no_partai'),
                Tables\Columns\TextColumn::make('nama_partai'),
                Tables\Columns\TextColumn::make('deskripsi'),
//                Tables\Columns\TextColumn::make('created_at')
//                    ->dateTime(),
//                Tables\Columns\TextColumn::make('updated_at')
//                    ->dateTime(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManagePartais::route('/'),
        ];
    }
}
