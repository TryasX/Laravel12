<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
class SKLController extends Controller
{
    public function index()
{
    $dokters = DB::connection('sc')->select("
        SELECT fd.FingerPrintID, d.FullName, mu.NoSIP
        FROM FAR_DOKTER fd
        JOIN EMR.dbo.Mst_User mu ON mu.FingerPrintID=fd.FingerPrintID
        JOIN Person d ON fd.RecordKey=d.RecordKey AND d.GCRecord IS NULL
        JOIN DokterKlinikLink dkl ON fd.RecordKey=dkl.RecordKey AND dkl.GCRecord IS NULL
        JOIN Location l ON dkl.LocationKey=l.LocationKey AND l.LocationKey=83

    ");

    return view('SKL', compact('dokters'));
}
public function preview(Request $request)
{

    $data = $request->all();

    // ===== DATA DOKTER =====
    $fingerprint = $request->dokter_fingerprint;
    $namaDokter  = $request->nama_dokter;
    $noSip       = $request->no_sip;
    
    if ($fingerprint && $namaDokter) {
        $qrText = "{$fingerprint}|{$namaDokter}|{$noSip}";
        $data['qr_dokter'] =
        'https://quickchart.io/qr?size=150&text=' .
        urlencode($qrText);
    }
    
    // ===== LOGO RS =====
    
    $logoPath = public_path('images/logo-rs.png');
    
    if (file_exists($logoPath)) {
        $logoBase64 = 'data:image/png;base64,' . base64_encode(file_get_contents($logoPath));
    } else {
        $logoBase64 = null;
    }
    
    $data['logo_rs'] = $logoBase64;
    
  
    // ===== Print =====
    return Pdf::loadView('print.skl', $data)
            ->setPaper('A4')
            ->setOptions([
            'isRemoteEnabled' => true])
            ->stream('preview-skl.pdf');
    }


    public function print(Request $request)
    {
        return $this->generatePdf($request, 'skl.pdf');
    }

}
