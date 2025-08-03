<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentStoreFile extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'document_store_id',
        'doc_id',
        'file_path',
        'metadata',
        'replace_existing',
        'create_new_doc_store',
        'doc_store',
        'loader',
        'splitter',
        'embedding',
        'vector_store',
        'record_manager',
        'uploaded_by',
    ];

    protected $casts = [
        'metadata' => 'array',
        'replace_existing' => 'boolean',
        'create_new_doc_store' => 'boolean',
        'doc_store' => 'array',
        'loader' => 'array',
        'splitter' => 'array',
        'embedding' => 'array',
        'vector_store' => 'array',
        'record_manager' => 'array',
    ];

    public function documentStore()
    {
        return $this->belongsTo(DocumentStore::class, 'document_store_id');
    }
}
