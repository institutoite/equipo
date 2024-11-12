<?php

namespace App\Filament\Resources\PrestamoResource\Pages;

use App\Filament\Resources\PrestamoResource;
use App\Models\Equipo;
use App\Models\Prestamo;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

use Illuminate\Database\Eloquent\Model;

class CreatePrestamo extends CreateRecord
{
    protected static string $resource = PrestamoResource::class;
   
    
 
    protected function handleRecordCreation(array $data): Model
    {
        $e=Equipo::findOrFail($data['equipo_id']);
        $e->cantidad_disponible=$e->cantidad_disponible-1;
        $e->save();
        
        return static::getModel()::create($data);
    }
    
}
