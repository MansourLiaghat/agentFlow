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
        Schema::create('chat_flows', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->json('flowData')->nullable();
            $table->boolean('deployed')->default(false);
            $table->boolean('isPublic')->default(false);
            $table->string('apikeyid')->nullable();
            $table->json('chatbotConfig')->nullable();
            $table->json('apiConfig')->nullable();
            $table->json('analytic')->nullable();
            $table->json('speechToText')->nullable();
            $table->string('category')->nullable();
            $table->enum('type', ['CHATFLOW', 'CHATFLOWMULTIAGENT'])->default('CHATFLOW');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_flows');
    }
};
