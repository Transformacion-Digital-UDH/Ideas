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
        Schema::create('documentos', function (Blueprint $table) {
            $table->bigIncrements('doc_id');
            $table->string('doc_nombre');
            $table->string('doc_file');
            $table->foreignId('nec_id')->references('nec_id')->on('necesidades');
            $table->tinyInteger('doc_estado')->unsigned()->default(1);
            $table->timestamp('doc_created')->useCurrent();
            $table->timestamp('doc_updated')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documentos');
    }
};
