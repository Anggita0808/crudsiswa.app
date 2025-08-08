<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clas_id');
            $table->string('photo')->nullable();
            $table->string('name');
            $table->string('nisn')->unique();
            $table->text('alamat');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('no_handphone');
            $table->timestamps(); // created_at dan updated_at

            // Foreign key
            // $table->foreign('clas_id')->references('id')->on('classes')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
}