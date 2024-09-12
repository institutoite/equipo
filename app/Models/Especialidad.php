<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Especialidad extends Model
{
    use HasFactory;
    protected $fillable =['escpecialidad']; // aumentar

    public function personales(): HasMany
    {
        return $this->hasMany(Personal::class);
    }
}
