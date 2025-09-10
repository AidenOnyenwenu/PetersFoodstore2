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
        Schema::create('medewerkers', function (Blueprint $table) {
            $table->id(); // automatisch een 'id' kolom (primary key, auto increment)
            $table->string('naam');
            $table->string('email')->unique();
            $table->string('telefoonnummer')->nullable();
            $table->string('functie');
            $table->timestamps(); // created_at en updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medewerkers');
    }
};
