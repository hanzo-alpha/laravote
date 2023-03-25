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
        Schema::create('vote', function (Blueprint $table) {
            $table->id();
            $table->uuid('vote_uuid');
            $table->foreignId('partai')->constrained('partai','id');
            $table->foreignId('kandidat')->constrained('kandidat','id');
            $table->unsignedDouble('jumlah_suara')->nullable()->default(0);
            $table->unsignedDouble('total_suara')->nullable()->default(0);
            $table->unsignedFloat('persentase_suara')->nullable()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vote');
    }
};
