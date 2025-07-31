<?php

namespace App\Services;

use App\Models\ChatFlow;

class ChatFlowService
{
    public function store(array $data): ChatFlow
    {
        return ChatFlow::create($data);
    }
    public function find(string $id): ?ChatFlow
    {
        return ChatFlow::find($id);
    }
    public function findByApikey(string $apikey)
    {
        return ChatFlow::where('apikeyid', $apikey)->first();
    }
    public function update(string $id, array $data): ?ChatFlow
    {
        $chatFlow = ChatFlow::find($id);
        if (!$chatFlow) return null;

        $chatFlow->update($data);
        return $chatFlow;
    }
    public function delete(string $id): bool
    {
        $chatFlow = ChatFlow::find($id);
        if (!$chatFlow) return false;

        $chatFlow->delete();
        return true;
    }

    public function all()
    {
        return ChatFlow::all();
    }
}
