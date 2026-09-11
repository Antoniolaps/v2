<?php
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    public function up(): void
    {
        // Primero limpiar los que tienen letras
        \DB::table('productos')->where('codigo_barras', 'REGEXP', '[^0-9]')->update(['codigo_barras' => null]);

        Schema::table('productos', function (Blueprint $table) {
            $table->unsignedBigInteger('codigo_barras')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('productos', function (Blueprint $table) {
            $table->string('codigo_barras')->nullable()->change();
        });
    }
};