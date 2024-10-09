<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Prestamo extends Model
{
    use HasFactory;
    protected $guarded=[];
    protected $fillable=["descripcion",
                    "descargo",
                    "fecha",
                    "foto",
                    "personal_id",
                    "personal",
                    "user_id",
                    "equipo_id",
                    "estado_id",];




    public function personal(): BelongsTo
    {
        return $this->belongsTo(Personal::class);
    }



}
