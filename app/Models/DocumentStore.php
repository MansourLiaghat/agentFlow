<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DocumentStore extends Model
{
    public $incrementing = false;
    protected $keyType = 'string';
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'name',
        'description',
        'loaders',
        'whereUsed',
        'status',
        'vectorStoreConfig',
        'embeddingConfig',
        'recordManagerConfig'];

    protected $casts = [
        'loaders' => 'array',
        'whereUsed' => 'array',
        'vectorStoreConfig' => 'array',
        'embeddingConfig' => 'array',
        'recordManagerConfig' => 'array',
    ];
}
