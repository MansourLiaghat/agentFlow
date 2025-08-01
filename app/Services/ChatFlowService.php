<?php

namespace App\Services;

use App\Models\ChatFlow;

class ChatFlowService
{
    public function store(array $data): ChatFlow
    {
        return ChatFlow::create($data);
    }

    public function find(string $chatFlowId): ?ChatFlow
    {
        return ChatFlow::find($chatFlowId);
    }

    public function findByApikey(string $apikey)
    {
        return ChatFlow::where('apikeyid', $apikey)->first();
    }

    public function update(string $chatFlowId, array $data): ?ChatFlow
    {
        $chatFlow = ChatFlow::find($chatFlowId);
        if (!$chatFlow) return null;

        $chatFlow->update($data);
        return $chatFlow;
    }

    public function delete(string $chatFlowId): bool
    {
        $chatFlow = ChatFlow::find($chatFlowId);
        if (!$chatFlow) return false;

        $chatFlow->delete();
        return true;
    }

    public function all()
    {
        return ChatFlow::all();
    }

}
