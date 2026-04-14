<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    /** @use HasFactory<\Database\Factories\TurmaFactory> */
    use HasFactory;

    protected $table = "turmas";

    protected $fillable = [
        'curso_id',
        'nome',
        'codigo',
        'data_inicio',
        'data_fim',
    ];

    protected $casts = [
        'curso_id' => 'integer',
        'data_inicio' => 'date',
        'data_fim' => 'date',
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
