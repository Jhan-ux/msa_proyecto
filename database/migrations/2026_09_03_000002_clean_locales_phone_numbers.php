<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (Schema::hasTable('locals')) {
            // Actualizar cualquier teléfono fijo o de ejemplo por el número oficial +51 966 154 210
            DB::table('locals')
                ->where('telefono', 'like', '(0%')
                ->orWhere('telefono', 'like', '076%')
                ->orWhere('telefono', 'like', '%123-456%')
                ->orWhere('telefono', 'like', '%789-012%')
                ->orWhere('telefono', 'like', '%340 000%')
                ->update([
                    'telefono' => '+51 966 154 210',
                ]);
        }
    }

    public function down(): void
    {
        // No destructivo
    }
};
