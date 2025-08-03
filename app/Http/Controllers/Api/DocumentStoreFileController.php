<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentStoreFileRequest;
use App\Services\DocumentStoreFileService;

class DocumentStoreFileController extends Controller
{
    public function upload(DocumentStoreFileRequest $request, DocumentStoreFileService $service)
    {
        $validated = $request->validated();
        $file = $request->file('file');
        return $service->uploadAndUpsert($validated, $file);
    }
}
