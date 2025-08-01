<?php

namespace App\Http\Controllers\Api;


use App\Http\Controllers\Controller;
use App\Http\Requests\ChatFlowRequest;
use App\Services\ChatFlowService;
use Illuminate\Http\JsonResponse;

class ChatFlowController extends Controller
{
    public function store(ChatFlowRequest $request, ChatFlowService $service): JsonResponse
    {
        $chatFlow = $service->store($request->validated());

        return response()->json([
            'message' => 'ChatFlow created successfully',
            'data' => $chatFlow
        ], 201);
    }

    public function show(string $chatFlowId, ChatFlowService $service): JsonResponse
    {
        $chatFlow = $service->find($chatFlowId);
        if (!$chatFlow) {
            return response()->json(['message' => 'ChatFlow not found'], 404);
        }

        return response()->json($chatFlow, 200);
    }

    public function showByApikey(string $apikey, ChatFlowService $service): JsonResponse
    {
        $chatFlow = $service->findByApikey($apikey);
        if (!$chatFlow) {
            return response()->json(['message' => 'ChatFlow not found'], 404);
        }

        return response()->json($chatFlow, 200);
    }

    public function update(string $chatFlowId, ChatFlowRequest $request, ChatFlowService $service): JsonResponse
    {
        $chatFlow = $service->update($chatFlowId, $request->validated());
        if (!$chatFlow) {
            return response()->json(['message' => 'ChatFlow not found'], 404);
        }

        return response()->json([
            'message' => 'ChatFlow updated successfully',
            'data' => $chatFlow
        ], 200);
    }

    public function destroy(string $chatFlowId, ChatFlowService $service): JsonResponse
    {
        if (!$service->delete($chatFlowId)) {
            return response()->json(['message' => 'ChatFlow not found'], 404);
        }

        return response()->json(['message' => 'ChatFlow deleted successfully'], 200);
    }

    public function index(ChatFlowService $service): JsonResponse
    {
        return response()->json($service->all(), 200);
    }
}
