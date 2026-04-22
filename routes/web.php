<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AlunoController;
use App\Http\Controllers\TurmaController;
use App\Http\Controllers\CursoController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/teste', function () {
    return view('aluno.list');
});

Route::get('/aluno', [AlunoController::class, 'index'])->name('aluno.index');
Route::get('/aluno/create', [AlunoController::class, 'create'])->name('aluno.create');
Route::post('/aluno', [AlunoController::class, 'store'])->name('aluno.store');
Route::delete('/aluno/{id}', [AlunoController::class, 'destroy'])
    ->name('aluno.destroy');
route::get('aluno/edit/{id}', [AlunoController::class, 'edit'])->name('aluno.edit');
route::put('aluno/update/{id}', [AlunoController::class, 'update'])->name('aluno.update');
route::post('/aluno/search', [AlunoController::class, 'search'])->name('aluno.search');


route::get('curso/chart',[\App\Http\Controllers\CursoController::class, 'chart'])->name('curso.chart');
route::get('curso/reportMatriculados', [CursoController::class, 'reportMatriculados'])->name('curso.reportMatriculados');
route::get('curso/report', [CursoController::class, 'report'])->name('curso.report');
route::resource('curso', \App\Http\Controllers\CursoController::class);
route::get('curso/{curso}/turmas', [TurmaController::class, 'index'])->name('curso.turmas');
route::get(
    'curso/{curso}/turmas/create',
    [TurmaController::class, 'create']
)->name('curso.turmas.create');


route::post('/curso/search', [\App\Http\Controllers\CursoController::class, 'search'])
->name('curso.search');

route::resource('turma', \App\Http\Controllers\TurmaController::class);
route::post('/turma/search', [\App\Http\Controllers\TurmaController::class, 'search'])
->name('turma.search');



