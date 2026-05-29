<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('modelos', function (Blueprint $table) {
            $table->string('tipo')->nullable()->after('precio_dolares');
        });
    }

    public function down(): void
    {
        Schema::table('modelos', function (Blueprint $table) {
            $table->dropColumn('tipo');
        });
    }
};
