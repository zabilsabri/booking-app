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
        Schema::create('transactions', function (Blueprint $table) {
            $table->uuid('id')->primary()->default(DB::raw('(UUID())'));
            $table->uuid('device_id');
            $table->uuid('user_id');
            $table->unsignedInteger('total_price');
            $table->enum('status', ['pending', 'completed', 'cancelled']);
            $table->string('snap_token')->nullable();
            $table->timestamps();

            $table->foreign('device_id')->references('id')->on('devices');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
