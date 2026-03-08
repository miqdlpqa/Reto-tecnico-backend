<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('divisions', function (Blueprint $table) {
            $table->id();
            $table->string('name', 45)->unique();
            $table->unsignedBigInteger('parent_id')->nullable();
            $table->integer('level')->unsigned();
            $table->integer('collaborators')->unsigned();
            $table->string('ambassador')->nullable();
            $table->timestamps();
            
            $table->foreign('parent_id')
                ->references('id')
                ->on('divisions')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('divisions');
    }
};
