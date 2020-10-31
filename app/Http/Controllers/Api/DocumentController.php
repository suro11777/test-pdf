<?php


namespace App\Http\Controllers\Api;

use App\Services\Api\DocumentService;

/**
 * Class DocumentController
 * @package App\Http\Controllers\Api
 */
class DocumentController extends BaseController
{
    /**
     * DocumentController constructor.
     * @param DocumentService $documentService
     */
    public function __construct(DocumentService $documentService)
    {
        $this->baseApiService = $documentService;
    }

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllDocuments()
    {
        $documents = $this->baseApiService->getAllDocuments();
        if ($documents->isEmpty()){
            return response()->json(['status' => 404, 'message' => 'document not found', 'data' => []]);
        }

        return response()->json(['status' => 200, 'message' => 'document found', 'data' => $documents]);
    }
}
