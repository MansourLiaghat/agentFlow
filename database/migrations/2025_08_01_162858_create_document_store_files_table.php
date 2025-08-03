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
        Schema::create('document_store_files', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('document_store_id');
            $table->uuid('doc_id')->nullable();
            $table->string('original_name');
            $table->string('mime_type');
            $table->integer('file_size');
            $table->string('file_path');
            $table->json('metadata')->nullable();
            $table->boolean('replace_existing')->default(false);
            $table->boolean('create_new_doc_store')->default(false);
            $table->json('doc_store')->nullable();
            $table->json('loader')->nullable();
            $table->json('splitter')->nullable();
            $table->json('embedding')->nullable();
            $table->json('vector_store')->nullable();
            $table->json('record_manager')->nullable();
            $table->uuid('uploaded_by')->nullable();
            $table->timestamps();
            $table->foreign('document_store_id')->references('id')->on('document_stores')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_store_files');
    }
};
