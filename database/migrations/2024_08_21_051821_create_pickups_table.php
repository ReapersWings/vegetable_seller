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
        Schema::create('pickups', function (Blueprint $table) {
            $table->id();
            $table->integer('checkouts_id');//->constrained('carts','checkout_id')->onDelete('cascade');
            $table->string('c_token_pick_up');
            $table->dateTime('p_expire_date')->nullable();
            $table->dateTime('date_user_pickup')->nullable();
            $table->enum('p_state',['readying','successful']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pickups');
    }
};
