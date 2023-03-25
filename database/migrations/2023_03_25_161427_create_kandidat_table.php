<?php
 declare(strict_types=1);
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
        Schema::create('kandidat', static function (Blueprint $table) {
            $table->id();
            $table->uuid('kandidat_uuid');
            $table->unsignedInteger('no_kandidat')->default(1);
            $table->string('nama_kandidat')->default('Kandidat 1');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kandidat');
    }
};
