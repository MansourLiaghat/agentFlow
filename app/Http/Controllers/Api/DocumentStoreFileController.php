<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentStoreFileRequest;
use App\Services\DocumentStoreFileService;
use Illuminate\Http\JsonResponse;

class DocumentStoreFileController extends Controller
{
    public function upload(DocumentStoreFileRequest $request, DocumentStoreFileService $service): JsonResponse
    {
        $validated = $request->validated();
        $file = $request->file('file');
        $result = $service->uploadAndUpsert($validated, $file);

        if (!$result) {
            return response()->json([
                'message' => "File upload failed"
            ], 422);
        }
        return response()->json([
            'message' => 'File uploaded and document stored',
            'data' => $result,
        ], 201);

    }
}






