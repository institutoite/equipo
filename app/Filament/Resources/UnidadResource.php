<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UnidadResource\Pages;
use App\Filament\Resources\UnidadResource\RelationManagers;
use App\Models\Unidad;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UnidadResource extends Resource
{
    protected static ?string $model = Unidad::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('unidad')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('direccion')
                    ->required()
                    ->maxLength(150),
                Forms\Components\TextInput::make('latitud')
                    ->required()
                    ->maxLength(20),
                Forms\Components\TextInput::make('longitud')
                    ->required()
                    ->maxLength(20),
                Forms\Components\FileUpload::make('foto')
                    ->label('Foto')
                    ->required()
                    ->disk('public')
                    ->directory('imagenes')
                    ->maxSize(2048)
                    ->image(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('unidad')
                    ->searchable(),
                Tables\Columns\TextColumn::make('direccion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('latitud')
                    ->searchable(),
                Tables\Columns\TextColumn::make('longitud')
                    ->searchable(),

                Tables\Columns\ImageColumn::make('foto')
                    ->label('foto')
                    ->disk('public')
                    ->width(100)
                    ->height(100)
                    ->defaultImageUrl('path/to/default/image.jpg'),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
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
            'index' => Pages\ListUnidads::route('/'),
            'create' => Pages\CreateUnidad::route('/create'),
            'edit' => Pages\EditUnidad::route('/{record}/edit'),
        ];
    }
}
