<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->foreignId('class_id')
            ->constrained('classes')
            ->restrictOnDelete();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('gender')->comment('Male; Female;');
            $table->text('address')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('members');
    }
};
