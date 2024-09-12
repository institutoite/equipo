<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo; // agregar

class Equipo extends Model
{
    use HasFactory;
    protected $fillable =["descripcion","codigo",'qr','foto','estado','fechadealta'];

    /*public function estado(): BelongsTo
    {
        return $this->belongsTo(Estado::class);
    }

    public function personal(): BelongsTo
    {
        return $this->belongsTo(Personal::class);
    }*/


    public function devolverEquipo($id)
    {
        // Encuentra el registro del equipo por su ID
        $equipo = Equipo::find($id);

        // Establece la fecha de devolución como la fecha actual
        $equipo->fecha_devolucion = now();

        // Guarda los cambios
        $equipo->save();

        // Redirigir o mostrar un mensaje de éxito
        return redirect()->back()->with('success', 'Equipo devuelto correctamente');
    }




}
