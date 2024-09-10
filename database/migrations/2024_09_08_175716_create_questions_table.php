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
        Schema::create('sections', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('description')->unique();
            $table->foreignIdFor(\App\Models\Section::class)->nullable()->constrained()->cascadeOnUpdate();
            $table->string('answer_a');
            $table->string('answer_b');
            $table->string('answer_c')->nullable();
            $table->string('answer_d')->nullable();
            $table->string('answer_e')->nullable();
            $table->string('correct_answer');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
        Schema::dropIfExists('sections');
    }
};
