<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniversitiesTable extends Migration
{
    public function up(): void
    {
        Schema::create('universities', function (Blueprint $table) {
            $table->uuid('id')->primary();
            
            $table->string('alpha_two_code', 2)->nullable();
            $table->json('domains')->nullable();
            $table->string('country')->nullable();
            $table->string('state_province')->nullable();
            $table->json('web_pages')->nullable();
            $table->string('name')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
}
