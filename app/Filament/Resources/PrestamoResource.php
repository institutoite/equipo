<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PrestamoResource\Pages;
use App\Models\Prestamo;
use App\Models\Estado;
use App\Models\Equipo;
use App\Models\Personal;
use Filament\Forms;
// use Filament\Forms\Components\Builder;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\Action;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;

class PrestamoResource extends Resource
{
    protected static ?string $model = Prestamo::class;
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('descripcion')
                    ->label('Descripción del préstamo')
                    ->required()
                    ->maxLength(1000),

                // Fecha automática, no editable
                Forms\Components\Hidden::make('fecha')
                    ->default(now()),
                Forms\Components\Hidden::make('state')
                    ->default(1),

                // Campo de archivo para 'foto'
                Forms\Components\FileUpload::make('foto')
                    ->label('Foto del préstamo')
                    ->required(),

                // Relación con la tabla 'personals'
                Forms\Components\Select::make('personal_id')
                    ->label('Personal')
                    ->relationship('personal', 'nombres', function ($query) {
                        return $query->selectRaw("id, CONCAT(nombres, ' ', apellidos, ' - Escalafón: ', escalafon) as nombres");
                    })
                    ->searchable()
                    ->required(),

                // Relación con la tabla 'equipos'
                Forms\Components\Select::make('equipo_id')
                    ->label('Equipo')
                    ->relationship('equipo', 'nombre')
                    ->searchable()
                    ->required(),

                // Relación con la tabla 'estados'
                Forms\Components\Select::make('estado_id')
                    ->label('Estado del préstamo')
                    ->options(Estado::all()->pluck('estado', 'id'))
                    ->required(),

                // Campo oculto para registrar el usuario logueado automáticamente
                Forms\Components\Hidden::make('user_id')
                    ->default(fn() => Auth::id()),
            ]);
    }

    /*public static function table(Table $table): Table 
    {
        return $table
            //->query(fn (Builder $query) => $query->where('state', 1)) 
            ->columns([
                Tables\Columns\TextColumn::make('descripcion')
                    ->label('Descripción')
                    ->searchable(),

                Tables\Columns\TextColumn::make('fecha')
                    ->label('Fecha de Préstamo')
                    ->date()
                    ->sortable(),
                    Tables\Columns\TextColumn::make('state')
                    ->label('Estado')
                    ->formatStateUsing(fn($state) => $state ? 'Activo' : 'Inactivo'),

                Tables\Columns\TextColumn::make('personal.nombres')
                    ->label('Prestador'),

                Tables\Columns\TextColumn::make('equipo.nombre')
                    ->label('Equipo'),

                Tables\Columns\TextColumn::make('estado.estado')
                    ->label('Estado'),

                Tables\Columns\TextColumn::make('user.name')
                    ->label('Registrado por'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),

                // Acción para abrir el modal de devolución
                Action::make('devolucion')
                    ->label('Devolución')
                    ->modalHeading('Registrar Devolución')
                    ->form([
                        Forms\Components\FileUpload::make('descargo')
                            ->label('Archivo de Descargo')
                            ->acceptedFileTypes(['application/pdf', 'application/msword', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 'application/vnd.ms-excel', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'])
                            ->maxSize(2048)
                            ->nullable(),

                        Forms\Components\DatePicker::make('fecha_devolucion')
                            ->label('Fecha de Devolución')
                            ->default(now())
                            ->disabled(),

                        Forms\Components\FileUpload::make('foto_devolucion')
                            ->label('Foto de Devolución')
                            ->image()
                            ->maxSize(1024),
                            //->enableCamera(),

                        Forms\Components\Hidden::make('user_devolucion')
                            ->default(fn() => Auth::id()),

                        Forms\Components\Select::make('estado_devolucion')
                            ->label('Estado de Devolución')
                            ->options(Estado::all()->pluck('estado', 'id'))
                            ->required(),
                    ])
                    ->action(function (Prestamo $record, array $data) {
                        $record->update([
                            'descargo' => $data['descargo'] ?? null,
                            'fecha_devolucion' => now(),
                            'foto_devolucion' => $data['foto_devolucion'] ?? null,
                            'user_devolucion' => Auth::id(),
                            'estado_devolucion' => $data['estado_devolucion'],
                        ]);
                    })
                    ->color('success'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('state')
                    ->options([
                        1 => 'Activo',
                        0 => 'Inactivo'
                    ])
                    ->default(1)
                    ->query(fn (Builder $query) => $query->where('state', 1)),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }*/

    public static function getTableQuery(): Builder
{
    return parent::getTableQuery()->where('state', 1);
}


    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('descripcion')
                ->label('Descripción')
                ->searchable(),

            Tables\Columns\TextColumn::make('fecha')
                ->label('Fecha de Préstamo')
                ->date()
                ->sortable(),

            // Tables\Columns\TextColumn::make('state')
            //     ->label('Estado')
            //     ->formatStateUsing(fn($state) => $state ? 'Activo' : 'Inactivo'),

            Tables\Columns\TextColumn::make('personal.nombres')
                ->label('Prestador'),

            Tables\Columns\TextColumn::make('equipo.nombre')
                ->label('Equipo'),

            Tables\Columns\TextColumn::make('estado.estado')
                ->label('Estado'),

            Tables\Columns\TextColumn::make('user.name')
                ->label('Registrado'),
            Tables\Columns\CheckboxColumn::make('state')
            ->disabled()
            ->sortable(),
        ])
        ->filters([
            SelectFilter::make('state')
            ->label('Estado del Préstamo')
            ->options([
                1 => 'Prestados',
                0 => 'Devueltos',
            ])
            ->query(fn (Builder $query, $state): Builder => $query->where('state', $state))
        ])
        //->getTableQuery()
        ->actions([
            Tables\Actions\EditAction::make(),

            // Acción para abrir el modal de devolución
            Action::make('devolucion')
                ->label('Devolución')
                ->modalHeading('Registrar Devolución')
                ->form([
                    Forms\Components\FileUpload::make('descargo')
                        ->label('Archivo de Descargo')
                        ->acceptedFileTypes([
                            'application/pdf', 
                            'application/msword', 
                            'application/vnd.openxmlformats-officedocument.wordprocessingml.document', 
                            'application/vnd.ms-excel', 
                            'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'
                        ])
                        ->maxSize(2048)
                        ->nullable(),

                    Forms\Components\DatePicker::make('fecha_devolucion')
                        ->label('Fecha de Devolución')
                        ->default(now())
                        ->disabled(),

                    Forms\Components\FileUpload::make('foto_devolucion')
                        ->label('Foto de Devolución')
                        ->image()
                        ->maxSize(1024),

                    Forms\Components\Hidden::make('user_devolucion')
                        ->default(fn() => Auth::id()),

                    Forms\Components\Select::make('estado_devolucion')
                        ->label('Estado de Devolución')
                        ->options(Estado::all()->pluck('estado', 'id'))
                        ->required(),
                ])
                ->action(function (Prestamo $record, array $data) {
                    $record->update([
                        'descargo' => $data['descargo'] ?? null,
                        'fecha_devolucion' => now(),
                        'foto_devolucion' => $data['foto_devolucion'] ?? null,
                        'user_devolucion' => Auth::id(),
                        'estado_devolucion' => $data['estado_devolucion'],
                        'state' => 0,
                    ]);
                    $equipo = $record->equipo;  // Asumiendo que 'equipo' es la relación definida en el modelo 'Prestamo'
                    // Incrementar el campo 'cantidad_total' del modelo 'Equipo' en 1
                    $equipo->update([
                        //'cantidad_total' => 0,
                        'cantidad_disponible' => ($equipo->cantidad_disponible ?? 0) + 1,
                    ]);
                })
                ->color('success'),
        ])
        ->bulkActions([
            Tables\Actions\DeleteBulkAction::make(),
        ]);
}


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListPrestamos::route('/'),
            'create' => Pages\CreatePrestamo::route('/create'),
            'edit' => Pages\EditPrestamo::route('/{record}/edit'),
        ];
    }
}

