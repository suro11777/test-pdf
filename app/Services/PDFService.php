<?php


namespace App\Services;

use App\Models\Document;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use mikehaertl\pdftk\Pdf;

/**
 * Class PDFService
 * @package App\Services
 */
class PDFService extends BaseService
{
    /**
     * @param $data
     * @return array|bool|\Illuminate\Support\Collection
     */
    public function savePDF($data)
    {
        if (!$data['pdf']) {
            return false;
        }
        $fileName = time() . $data['pdf']->getClientOriginalName();
        $file = Storage::put($fileName, file_get_contents($data['pdf']));

        if (!$file) {
            return false;
        }
        session(['fileName' => $fileName]);

        return $file;
    }

    /**
     * @param $fileName
     * @return array|\Illuminate\Support\Collection
     */
    public function getFilds()
    {
        $fileName = session('fileName');
        $path = Storage::path($fileName);
        $pdf = new Pdf($path);
        $fields = $pdf->getDataFields()->__toArray();
        $fields = collect($fields)->map(function ($item) {
            if (count($item) > 4) {
                return $item;
            }
        })->filter();

        return $fields;
    }

    /**
     *
     * @param $data
     * @return array|bool
     */
    public function store($data)
    {
        $fileName = session('fileName');
        $path = Storage::path($fileName);
        $pdf = new Pdf($path);

        $newData = $this->getNewData($data);
        if (empty($newData)){
            return false;
        }
        $newPDF = $pdf->fillForm($newData)
            ->needAppearances()
            ->saveAs($path);
        if (!File::exists($path)){
            return false;
        }
        $document = $this->saveDocument($fileName);
        if (!$document){
            return false;
        }

        return [$newPDF, $fileName];
    }

    /**
     * @param $data
     * @return mixed
     */
    public function getNewData($data)
    {
        foreach ($data as $key => $value){
            $newData[str_replace('_', ' ', $key)] = $value;
        }
        return $newData;
    }

    /**
     * @param $data
     * @return mixed
     */
    public function saveDocument($fileName)
    {
        $data = ['url' => Storage::url($fileName), 'pdf_name' => $fileName];
        return Document::create($data);
    }

}
