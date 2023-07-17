<?php

namespace App\Http\Controllers;

use App\Models\PemesananBarang;
use App\Models\User;
use App\Models\PemesananJasa;
use Illuminate\Routing\Controller;
use Barryvdh\DomPDF\Facade\Pdf as PDF;



class PDFController extends Controller
{
    public function generatePDF($id)
    {
        $currentDate = date('d-m-Y');
            $data = [
                'title' => 'Invoice',
                'pemesananjasa' => PemesananJasa::where('id', $id)->get(),
                'tanggal' => $currentDate
            ];
    
            $pdf = PDF::loadView('pdf', $data);
            return $pdf->download('invoice.pdf');
        
    }

    public function generatePDFSerahTerima($id)
    {
            $data = [
                'title' => 'Berita Acara Serah Terima Tanah dan Bangunan',
                'pemesananbarang' => PemesananBarang::where('id', $id)->get()
            ];
    
            $pdf = PDF::loadView('pdfserahterima', $data);
            return $pdf->download('serahterimakunci.pdf');
        
    }
    public function generatePDFBAST($id)
    {
            $currentDate = date('d-m-Y');
            $data = [
                'title' => 'Berita Acara Serah Terima Jasa Konstruksi',
                'pemesananjasa' => PemesananJasa::where('id', $id)->get(),
                'tanggal' => $currentDate
            ];
    
            $pdf = PDF::loadView('pdfbastkonstruksi', $data);
            return $pdf->download('BASTJasaKonstruksi.pdf');
        
    }
}