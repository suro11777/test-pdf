<?php


namespace App\Services;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;
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
//        return $file;
//        Storage::put(time() . $data['pdf']->getClientOriginalName(), $data['pdf']);
        if (!$file) {
            return false;
        }

        $fields = $this->getFilds($fileName);

        return $fields;
    }

    /**
     * @param $fileName
     * @return array|\Illuminate\Support\Collection
     */
    public function getFilds($fileName)
    {
        $path = Storage::path($fileName);
        $pdf = new Pdf($path);
        $fields = $pdf->getDataFields()->__toArray();dd($fields);
        $fields = collect($fields)->map(function ($item) {
            if (count($item) > 4) {
                return $item;
            }
        })->filter();
        session(['fileName' => $fileName]);

        return $fields;


    }

    /**
     * @param $data
     * @return bool
     */
    public function store($data)
    {
//        dd($data);
        $fileName = session('fileName');
        $path = Storage::path($fileName);
        $pdf = new Pdf($path);

        foreach ($data as $key => $value){
            $newData[str_replace('_', ' ', $key)] = $value;
        }

        $newPDF = $pdf->fillForm($newData)
            ->needAppearances()
            ->saveAs($path);

        return [$newPDF, $fileName];
    }

//    /**
//     * @return \Symfony\Component\HttpFoundation\BinaryFileResponse
//     */
//    public function download()
//    {
//        $fileName = session('fileName');
//        $file= Storage::path($fileName);
////        $file= storage_path("app/public/{$fileName}");
//        $headers = array(
//            'Content-Type: application/pdf',
//        );
////return Response::download($file, $fileName, $headers);
//        return \response()->download($file/*, $fileName, $headers*/);
//    }
}
