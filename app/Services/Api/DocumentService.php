<?php


namespace App\Services\Api;

use App\Models\Document;

/**
 * Class DocumentService
 * @package App\Services\Api
 */
class DocumentService extends BaseService
{

    /**
     * get all documents
     * @return mixed
     */
    public function getAllDocuments()
    {
        return Document::paginate(15);
    }
}
