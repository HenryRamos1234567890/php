<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('docente_grupo', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('docente_id');
            $table->unsignedInteger('grupo_id');
            $table->timestamps();

            $table->foreign('docente_id')
                ->references('id')
                ->on('docente')
                ->onDelete('cascade');

            $table->foreign('grupo_id')
                ->references('id')
                ->on('grupo')
                ->onDelete('cascade');

            $table->index(['docente_id', 'grupo_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('docente_grupo');
    }
};