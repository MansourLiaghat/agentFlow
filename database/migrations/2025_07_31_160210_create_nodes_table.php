<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('nodes', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('chat_flow_id');
            $table->string('type');
            $table->json('data');
            $table->integer('position_x')->nullable();
            $table->integer('position_y')->nullable();
            $table->timestamps();
            $table->foreign('chat_flow_id')->references('id')->on('chat_flows')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nodes');
    }
};
