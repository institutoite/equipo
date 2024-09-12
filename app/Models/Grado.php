<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Grado extends Model
{
    use HasFactory;
    protected $fillable = ['grado'];

    public function personales(): HasMany
    {
        return $this->hasMany(Personal::class);
    }
}
