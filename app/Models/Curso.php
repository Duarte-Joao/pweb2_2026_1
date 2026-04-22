<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curso extends Model
{
    /** @use HasFactory<\Database\Factories\CursoFactory> */
    use HasFactory;

    protected $fillable = [
        'nome',
        'requisito',
        'carga_horaria',
        'valor',

    ];
    // relação 1-n, 1 curso tem N turmas
    public function turmas()
    {
        return $this->hasMany(Turma::class);
    }

    //relação N-N, um Curso pode ter muitos alunos e muitos alunos podem estar em muitos cursos
    public function alunos(){
        return $this->belongsToMany(Aluno::class, 'matriculas', 'curso_id', 'aluno_id')
        ->withPivot('turma_id', 'data_matricula')
        ->withTimestamps();
    }
    //relação 1-N, 1 curso tem muitas matrículas
    public function matriculas(){
        return $this->hasMany(Matricula::class);
    }
}
