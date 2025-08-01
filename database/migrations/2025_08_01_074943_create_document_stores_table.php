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
        Schema::create('document_stores', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->text('description')->nullable();
            $table->json('loaders')->nullable();
            $table->json('whereUsed')->nullable();
            $table->enum('status', [
                'EMPTY', 'SYNC', 'SYNCING', 'STALE', 'NEW', 'UPSERTING', 'UPSERTED'
            ])->default('NEW');
            $table->json('vectorStoreConfig')->nullable();
            $table->json('embeddingConfig')->nullable();
            $table->json('recordManagerConfig')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_stores');
    }
};
