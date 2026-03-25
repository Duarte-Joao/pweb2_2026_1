<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    protected $fillable = [
        'nome',
        'requisito',
        'carga_horaria',
        'valor',
    ];

    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }
}
