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
        Schema::create('calculator', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->nullable();
            $table->string('key', 12)->nullable()->unique();
            $table->string('name')->nullable();
            $table->mediumText('description')->nullable();
            $table->mediumText('answer')->nullable();
            $table->text('feedback')->nullable();
            $table->tinyInteger('status')->default(0);
            $table->string('ip', 45)->nullable();
            $table->tinyInteger('is_spam')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('dislikes')->default(0);
            $table->integer('rating')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('calculator');
    }
};
