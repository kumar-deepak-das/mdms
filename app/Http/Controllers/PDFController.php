<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mpdf\Mpdf;

class PDFController extends Controller
{
    public function downloadMPDF()
    {
        $mpdf = new Mpdf();

        $html = view('pdf.mpdfview', [
            'title' => 'mPDF Example',
            'date'  => date('Y-m-d')
        ])->render();

        $mpdf->WriteHTML($html);

        // return $mpdf->Output('mpdf-file.pdf', 'D'); // D = download
        
        // return response($mpdf->Output('', 'S'))
        //         ->header('Content-Type', 'application/pdf')
        //         ->header('Content-Disposition', 'attachment; filename="report.pdf"');

        
        
        $mpdf->Output('document.pdf', 'I'); // Inline display

    }
}
