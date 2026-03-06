<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::disableForeignKeyConstraints(); //desablitando chave estrangeira

        Schema::table('alunos', function (Blueprint $table) {
            $table->string('imagem', 150)->nullable();
            $table->foreignId('categoria_id')->after('telefone')->constrained('categorias_alunos');
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
