<?php

namespace App\Services;

use App\Models\DocumentStoreFile;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class DocumentStoreFileService
{
    public function uploadAndUpsert(array $data, $file): JsonResponse
    {
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $filePath = $file->storeAs('document_store_files', $fileName);

        var_dump($filePath);

        if (!$filePath) {
            return response()->json(['message' => 'File upload failed'], 500);
        }

        $data['file_path'] = $filePath;

        $docFile = DocumentStoreFile::create($data);

        return response()->json([
            'message' => 'File uploaded and document stored',
            'data' => $docFile,
        ], 201);

    }
}

