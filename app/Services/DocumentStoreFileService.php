<?php

namespace App\Services;

use App\Models\DocumentStoreFile;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Str;

class DocumentStoreFileService
{
    public function uploadAndUpsert(array $data, $file): ?DocumentStoreFile
    {

        if (
            !$file || !$file->isValid() ||
            empty($data['document_store_id']) ||
            empty($data['doc_id'])
        ) {
            return null;
        }

        try {
            $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $filePath = $file->storeAs('document_store_files', $fileName, 'public');
        } catch (\Exception $e) {
            return null;
        }


        return DocumentStoreFile::create([
            'id' => Str::uuid(),
            'document_store_id' => $data['document_store_id'],
            'doc_id' => $data['doc_id'],
            'original_name' => $file->getClientOriginalName(),
            'mime_type' => $file->getClientMimeType(),
            'file_size' => $file->getSize(),
            'file_path' => $filePath,
            'replace_existing' => $data['replace_existing'] ?? false,
            'create_new_doc_store' => $data['create_new_doc_store'] ?? false,
            'metadata' => $data['metadata'] ?? null,
            'doc_store' => $data['doc_store'] ?? null,
            'loader' => $data['loader'] ?? null,
            'splitter' => $data['splitter'] ?? null,
            'embedding' => $data['embedding'] ?? null,
            'vector_store' => $data['vector_store'] ?? null,
            'record_manager' => $data['record_manager'] ?? null,
            'uploaded_by' => auth()->id(),
        ]);


    }

}
