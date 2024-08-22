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
        Schema::create('deliverys', function (Blueprint $table) {
            $table->id();
            $table->Integer('checjouts_id');//->constrained('carts','checkout_id')->onDelete('cascade');
            $table->foreignId('addres_id')->constrained('address','id')->onDelete('cascade');
            $table->enum('d_state',['be_ready','on_the_way','successful']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deliverys');
    }
};
