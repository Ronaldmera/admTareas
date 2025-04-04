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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            //foranea de Users
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')
            -> references('id')
            ->on('users')
            ->onDelete('cascade');

            $table->string('title');
            $table->text('content');
            $table->enum('status', ['pendiente', 'completada'])->default('pendiente');
            $table->date('end_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taks');
    }
};
