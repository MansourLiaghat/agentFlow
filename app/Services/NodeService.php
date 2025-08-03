<?php

namespace App\Services;

use App\Models\Node;
use Illuminate\Database\Eloquent\Collection;


class NodeService
{
    public function createNode(array $data): Node
    {
        return Node::create($data);
    }

    public function getNodeById(string $chatFlowId, string $nodeId): ?Node
    {
        return Node::where('id', $nodeId)->where('chat_flow_id', $chatFlowId)->first();
    }

    public function getAllNodes(string $nodeId): Collection
    {
        return Node::where('chat_flow_id', $nodeId)->get();
    }

    public function updateNode(string $chatFlowId, string $nodeId, array $data): ?Node
    {
        $node = Node::where('chat_flow_id', $chatFlowId)->where('id', $nodeId)->first();
        if (!$node) {
            return null;
        }
        $node->update($data);
        return $node;
    }

    public function deleteNode(string $chatFlowId, string $nodeId): bool
    {
        $node = Node::where('chat_flow_id', $chatFlowId)->where('id', $nodeId)->first();
        if (!$node) {
            return false;
        }
        return (bool)$node->delete();
    }

}
