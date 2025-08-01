<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatFlow extends Model
{
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'id',
        'name',
        'flowData',
        'deployed',
        'isPublic',
        'apikeyid',
        'chatbotConfig',
        'apiConfig',
        'analytic',
        'speechToText',
        'category',
        'type',
    ];

    protected $casts = [
        'flowData' => 'array',
        'chatbotConfig' => 'array',
        'apiConfig' => 'array',
        'analytic' => 'array',
        'speechToText' => 'array',
        'deployed' => 'boolean',
        'isPublic' => 'boolean',
    ];

    public function nodes()
    {
        return $this->hasMany(Node::class, 'chat_flow_id', 'id');
    }

}
