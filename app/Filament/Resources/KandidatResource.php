<?php

namespace App\Filament\Resources;

use App\Filament\Resources\KandidatResource\Pages;
use App\Filament\Resources\KandidatResource\RelationManagers;
use App\Models\Kandidat;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KandidatResource extends Resource
{
    protected static ?string $model = Kandidat::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('kandidat_uuid')
                    ->required()
                    ->maxLength(36),
                Forms\Components\TextInput::make('no_kandidat')
                    ->required(),
                Forms\Components\TextInput::make('nama_kandidat')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kandidat_uuid'),
                Tables\Columns\TextColumn::make('no_kandidat'),
                Tables\Columns\TextColumn::make('nama_kandidat'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ManageKandidats::route('/'),
        ];
    }    
}
