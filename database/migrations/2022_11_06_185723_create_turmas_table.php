<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Professor;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('turma', function (Blueprint $table) {
            $table->id();
            $table->string("nome", 50);
            $table->integer("semestre");
            $table->integer("ano");
            $table->foreignIdFor(Professor::class);
            $table->timestamps();
            $table->foreign("professor_id")->references("id")->on("professor");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('turma');
    }
};
