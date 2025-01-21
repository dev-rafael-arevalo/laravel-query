<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    // migrations/create_pedidos_table.php
    public function up()
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            $table->string('producto');
            $table->integer('cantidad');
            $table->decimal('total', 10, 2);
            $table->foreignId('usuario_id')->constrained('usuarios');
            $table->timestamps();
        });
    }
};
