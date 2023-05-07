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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unsigned();
            $table->string('image')->nullable();
            $table->string('phone_number')->unique()->nullable();
            $table->tinyText('address')->nullable();
            $table->string('beloved')->nullable();
            $table->text('biography')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->tinyInteger('role')->default(3);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
