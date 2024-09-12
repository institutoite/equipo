<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Prestamo;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PrestamoResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PrestamoResource\RelationManagers;

class PrestamoResource extends Resource
{
    protected static ?string $model = Prestamo::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextArea::make('descripcion')
                    ->required()
                    ->maxLength(1000),
                Forms\Components\FileUpload::make('descargo')
                    ->label('descargo')
                    ->required()
                    ->disk('public')
                    ->directory('descargos')
                    ->maxSize(4096)
                    ->acceptedFileTypes(['application/pdf',
                                'application/msword',
                                'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
                                'application/vnd.ms-excel',
                                'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']),


                Forms\Components\DatePicker::make('fechaentrega')
                    ->label('Fecha de Entrega')
                    ->default(now())  // Esto debería ahora mostrar la fecha correcta
                    ->displayFormat('d/m/Y')
                    ->required(),



                Forms\Components\FileUpload::make('fotoentrega')
                    ->label('FOTO ENTREGA')
                    ->required()
                    ->disk('public')
                    ->directory('imagenes')
                    ->maxSize(4096)
                    ->image(),


               /* Forms\Components\DatePicker::make('fechadevolucion')
                    ->required(),*/

                Forms\Components\DatePicker::make('fechadevolucion')
                    ->label('Fecha de Devolución')
                    ->default(now())  // Esto se utiliza si necesitas mostrar la fecha en el formulario
                    ->displayFormat('d/m/Y')
                    ->required(),

                  /* en fecha de devolucion se modifico en models en equipo*/




                Forms\Components\FileUpload::make('fotodevolucion')
                    ->label('FOTO DE VOLUCION')
                    ->required()
                    ->disk('public')
                    ->directory('imagenes')
                    ->maxSize(4096)
                    ->image(),


                Forms\Components\Select::make('prestamista_id')
                    ->label("Prestamista")
                    ->relationship('personal', 'id')  // 'id' es el identificador de la relación
                    ->getOptionLabelFromRecordUsing(fn ($record) => $record->nombres . ' ' . $record->apellidos)  // Concatenar nombres y apellidos
                    ->required(),


                Forms\Components\TextInput::make('user_id')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('equipo_id')
                    ->required()
                    ->numeric(),



                Forms\Components\TextInput::make('estado_id')
                    ->required()
                    ->numeric(),

                Forms\Components\Select::make('estadoprestamo')
                    ->label('Estado del Equipo')
                    ->options([
                        'bueno' => 'Bueno',
                        'regular' => 'Regular',
                        'malo' => 'Malo',
                    ])
                    ->required(),


                /*Forms\Components\TextInput::make('estado_devolucion')
                    ->required()
                    ->numeric(),*/

                Forms\Components\Select::make('estado_devolucion')
                    ->label('Estado del Equipo')
                    ->options([
                        'bueno' => 'Bueno',
                        'regular' => 'Regular',
                        'malo' => 'Malo',
                    ])
                    ->required(),




            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('descripcion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('descargo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fechaentrega')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fotoentrega')
                    ->searchable(),
                Tables\Columns\TextColumn::make('fechadevolucion')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fotodevolucion')
                    ->searchable(),
                Tables\Columns\TextColumn::make('prestamista_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('user_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('equipo_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado_id')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('estado_devolucion')
                    ->numeric()
                    ->sortable(),
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
            'index' => Pages\ListPrestamos::route('/'),
            'create' => Pages\CreatePrestamo::route('/create'),
            'edit' => Pages\EditPrestamo::route('/{record}/edit'),
        ];
    }
    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['personal_id'] = 1;
        return $data;
    }
}
