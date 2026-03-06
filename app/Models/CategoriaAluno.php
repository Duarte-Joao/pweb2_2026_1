<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaAluno extends Model
{
    use HasFactory;
    protected $table = 'categoria_alunos';
    protected $fillable = [
        'nome',
        'nivel'
    ];

    public function alunos()
    {
        return $this->hasMany(Aluno::class);
    }
}
