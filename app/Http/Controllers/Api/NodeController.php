<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NodeRequest;
use App\Models\ChatFlow;
use App\Models\Node;
use App\Services\NodeService;
use Illuminate\Http\JsonResponse;

class NodeController extends Controller
{
    public function store(NodeRequest $request, NodeService $service): JsonResponse
    {
        $node = $service->createNode($request->validated());
        return response()->json([
            'message' => 'Node created successfully',
            'data' => $node
        ], 201);
    }

    public function show(NodeService $service, string $chatFlowId, string $nodeId): ?JsonResponse
    {
        $node = $service->getNodeById($chatFlowId, $nodeId);
        if (!$node) {
            return response()->json([
                'message' => 'Node not found'
            ], 404);
        }
        return response()->json($node, 200);

    }

    public function index(NodeService $service, string $nodeId): JsonResponse
    {
        $nodes = $service->getAllNodes($nodeId);
        return response()->json($nodes, 200);
    }

    public function update(NodeService $service, string $chatFlowId, string $nodeId, NodeRequest $request): ?JsonResponse
    {
        $node = $service->updateNode($chatFlowId, $nodeId, $request->validated());
        if (!$node) {
            return response()->json([
                'message' => 'Node not found'
            ], 404);
        }
        return response()->json(['message' => 'Node updated successfully'], 200);

    }

    public function destroy(NodeService $service, string $chatFlowId, string $nodeId): ?JsonResponse
    {
        $node = $service->deleteNode($chatFlowId, $nodeId);
        if (!$node) {
            return response()->json(['message' => 'Node not found'], 404);
        }
        return response()->json(['message' => 'Node deleted successfully'], 200);
    }

}
