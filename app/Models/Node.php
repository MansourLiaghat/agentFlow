<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Node extends Model
{
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = ['id', 'chat_flow_id', 'type', 'data', 'position_x', 'position_y',];
    protected $casts = [
        'id' => "string",
        'chat_flow_id' => "string",
        'data' => 'array',
    ];

    public function chatFlow()
    {
        return $this->belongsTo(ChatFlow::class);
    }
}
