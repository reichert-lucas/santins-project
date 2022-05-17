<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserUniversityTable extends Migration
{
    public function up(): void
    {
        Schema::create('user_university', function (Blueprint $table) {
            $table->primary(['user_id', 'university_id']);

            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->uuid('university_id');
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_university');
    }
}
