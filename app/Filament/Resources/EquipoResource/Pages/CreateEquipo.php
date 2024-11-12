<?php

namespace App\Filament\Resources\EquipoResource\Pages;

use App\Filament\Resources\EquipoResource;
use App\Models\Equipo;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;


use Illuminate\Database\Eloquent\Model;

class CreateEquipo extends CreateRecord
{
    protected static string $resource = EquipoResource::class;
   
    protected function handleRecordCreation(array $data): Model
    {
        $data['cantidad_disponible']=$data['cantidad_total'];
        
        return static::getModel()::create($data);
    }
}
