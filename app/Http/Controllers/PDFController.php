<?php


namespace App\Http\Controllers;


use App\Services\PDFService;
use Illuminate\Http\Request;

/**
 * Class PDFController
 * @package App\Http\Controllers
 */
class PDFController extends BaseController
{
    /**
     * PDFController constructor.
     * @param PDFService $PDFService
     */
    public function __construct(PDFService $PDFService)
    {
        $this->baseService = $PDFService;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function uploadPDFForm()
    {
        return view('pdf.upload');
    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function uploadPDF(Request $request)
    {
        $fields = $this->baseService->savePDF($request->all());
        if (!$fields) {
            return redirect()->back();
        }
        return view('pdf.form', compact('fields'));
    }

//    public function showFilds()
//    {
//        $fields = $this->baseService->getFilds();
//        return view('pdf.form', compact('fields'));
//    }

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\Http\RedirectResponse|\Illuminate\View\View
     */
    public function store(Request $request)
    {
        [$newPDF, $fileName] = $this->baseService->store($request->except('_token', 'submit'));
        if (!$newPDF) {
            return redirect()->route('upload-pdf-form');
        }

        return view('pdf.download-pdf', compact('fileName'));
    }
    
}
