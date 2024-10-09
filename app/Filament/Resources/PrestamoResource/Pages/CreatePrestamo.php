<?php

namespace App\Filament\Resources\PrestamoResource\Pages;

use App\Filament\Resources\PrestamoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreatePrestamo extends CreateRecord
{
    protected static string $resource = PrestamoResource::class;
    protected function mutateFormData(array $data): array
    {
        // Asigna el ID del usuario autenticado al campo user_id
        $data['user_id'] = auth()->id(); // O cualquier lógica para obtener el ID del usuario

        return $data;
    }
    protected function afterSave()
    {
        // Cualquier lógica que necesites después de guardar
    }
}
