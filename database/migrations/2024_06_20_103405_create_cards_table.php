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
        Schema::create('cards', function (Blueprint $table) {
                 //primary key
                 $table->id();
                 //foreing key
                 $table->foreignId('user_id')
                 ->references('id')
                 ->on('users')
                 ->constrained()
                 ->onDelete('cascade');
                 $table->string('title');
                 $table->text('description')->nullable();
                 $table->text('photo')->nullable();
                 $table->decimal('price', 4, 2);
                 $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards');
    }
};