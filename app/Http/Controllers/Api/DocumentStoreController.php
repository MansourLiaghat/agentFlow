<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\DocumentStoreRequest;
use App\Services\DocumentStoreService;

class DocumentStoreController extends Controller
{
    public function store(DocumentStoreRequest $request, DocumentStoreService $service)
    {
        return $service->CreateDocumentStore($request->validated());
    }

    public function show(DocumentStoreService $service, string $id)
    {
       return $service->getDocumentStoreById($id);
    }

    public function index(DocumentStoreService $service)
    {
       return $service->getAllDocumentStore();
    }

    public function update(string $id, DocumentStoreRequest $request, DocumentStoreService $service)
    {
       return $service->updateDocumentStore($id, $request->validated());
    }

    public function delete(DocumentStoreService $service, string $id)
    {
       return $service->deleteDocumentStore($id);
    }

}
