<?php

namespace App\Services;

use App\Models\DocumentStore;
use Illuminate\Http\JsonResponse;

class DocumentStoreService
{
    public function CreateDocumentStore(array $data): JsonResponse
    {
        $doc = DocumentStore::create($data);
        if (!$doc) {
            return response()->json([
                'message' => 'Document Store Failed',
            ], 404);
        }
        return response()->json([
            'message' => 'Document Store Success',
            'data' => $doc
        ], 201);
    }

    public function getDocumentStoreById(string $id): JsonResponse
    {
        $doc = DocumentStore::find($id);
        if (!$doc) {
            return response()->json([
                'message' => 'Document Store Not Found',
            ], 404);
        }
        return response()->json([
            'data' => $doc,
        ], 200);
    }

    public function getAllDocumentStore(): JsonResponse
    {
        $docAll = DocumentStore::all();

        return response()->json([
            'data' => $docAll,
        ], 200);

    }

    public function updateDocumentStore(string $id, array $data): JsonResponse
    {
        $doc = DocumentStore::find($id);
        if (!$doc) {
            return response()->json([
                'message' => 'Document Store Not Found',
            ], 404);
        }
        $doc->update($data);
        return response()->json([
            'message' => 'Document Store Updated Success',
        ], 200);

    }

    public function deleteDocumentStore(string $id): JsonResponse
    {
        $doc = DocumentStore::find($id);

        if (!$doc) {
            return response()->json([
                'message' => 'Document Store not found'
            ], 404);
        }
        $doc->delete();
        return response()->json([
            'message' => 'Document Store deleted successfully'
        ], 200);
    }

}
