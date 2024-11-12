<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Personal extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function equipos(): HasMany
    {
        return $this->hasMany(Equipo::class);
    }
    public function grado(): BelongsTo
    {
        return $this->belongsTo(Grado::class);
    }
    public function especialidad(): BelongsTo
    {
        return $this->belongsTo(Especialidad::class);
    }


    public function prestamos(): HasMany
    {
        return $this->hasMany(Prestamo::class);
    }

}

