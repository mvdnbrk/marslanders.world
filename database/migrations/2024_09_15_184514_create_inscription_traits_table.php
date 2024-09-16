<?php

use App\Models\Inscription;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('inscription_traits', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Inscription::class)->constrained();
            $table->string('type');
            $table->string('value');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('inscription_traits');
    }
};
