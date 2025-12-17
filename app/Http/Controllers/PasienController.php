<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PasienController extends Controller
{

    public function getByRM($rm)
    {
        $data = DB::connection('sc')->selectOne("
            SELECT 
                P.FullName AS NamaIbu,
                P.Custom1Number AS NIK,
                A.Alamat +', '+ A.Kelurahan +', '+ A.Kecamatan +', '+ A.Kota +', '+ A.Propinsi AS Alamat ,
                Pk.PerkerjaanDesc AS Pekerjaan,
				RC.Custom AS GolDar
            FROM Person P
            LEFT JOIN RecordAddressLink RAL ON P.RecordKey = RAL.RecordKey
            LEFT JOIN Address A ON RAL.AddressKey = A.AddressKey
            LEFT JOIN Pekerjaan Pk ON P.PekerjaanKey = Pk.IdPekerjaan
			LEFT JOIN RecordCustom RC ON P.RecordCustom1Key=RC.RecordCustomKey
            WHERE P.Number = ?
        ", [$rm]);

        return response()->json($data);
    }
}
