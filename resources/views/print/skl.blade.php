<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8">
    <title>Surat Keterangan Kelahiran</title>
    <style>
        body {
            /* font-family: DejaVu Sans, sans-serif; */
            font-size: 11.5px;
            line-height: 1.45;
            margin: 2.5px 5px;
        }


    /* ====== KOP ====== */
    .kop {
        text-align: center;
        border-bottom: 3px solid #000;
        padding-bottom: 8px;
        margin-bottom: 7px;
    }
    .kop h2 {
        margin: 0;
        font-size: 17px;
        letter-spacing: .5px;
    }
    .kop p {
        margin: 2px 0;
        font-size: 10.5px;
    }

    /* ====== TITLE ====== */
    .title {
        text-align: center;
        font-size: 15px;
        font-weight: bold;
        margin: 8px 0 12px;
        /* text-decoration: underline; */
    }

    /* ====== CONTENT ====== */
    p {
        margin: 4px 0;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 2px;
    }
    td {
        padding: 3px 2px;
        vertical-align: top;
    }
    .label {
        width: 32%;
    }

    .section {
        margin-top: 10px;
        margin-bottom: 4px;
        font-weight: bold;
    }

    /* ====== SIGNATURE ====== */
    .ttd-wrapper {
        margin-top: 18px;
        width: 100%;
    }
    .ttd {
        width: 42%;
        float: right;
        text-align: center;
    }
    .ttd p {
        margin: 3px 0;
    }
    .qr {
        margin: 6px 0 4px;
    }
    .clear {
        clear: both;
    }
    .en {
        font-style: italic;
        font-size: 9.5px;
        color: #333;
        margin-top: 1px;
    }
    .en2 {
        font-style: italic;
        font-size: 9.5px;
        color: #333;
        display: inline;
        margin-left: 6px;
    }
</style>


</head>
<body>

<!-- ====== HEADER LOGO ====== -->
<div style="text-align:center;margin-bottom:6px">
    @if(!empty($logo_rs))
    <img src="{{ $logo_rs }}" style="height:65px">
@endif

</div>

<!-- ====== TITLE ====== -->
<div class="title" style="margin-top:0">SURAT KETERANGAN LAHIR</div>


<!-- ====== BODY FRAME ====== -->
<div style="border:1px solid #000;padding:10px">
    <!-- ====== NOMOR & DOKTER ====== -->
    {{-- <p class="text-justify">Nomor : {{ $no_surat ?? '-' }}</p> --}}
    <table style="margin-bottom:3px">
        <tr>
            <td style="text-align:center">Nomor : {{ $no_surat ?? '-' }}</td>
        </tr>
    </table>
    {{-- <table style="margin-bottom:8px">
        <tr>
            <td width="50%" style="text-align:left">Yang bertanda tangan di bawah ini :</td>
            <td width="50%" style="text-align:left">{{ $nama_dokter ?? '-' }}</td>
        </tr>
    </table>

    <p>Menerangkan bahwa telah lahir seorang bayi:</p> --}}
    
    <table>
        <tr>
            <td class="label">Yang bertanda tangan di bawah ini : 
                 <div class="en">The undersigned Obstetrician</div>
            </td>
            <td>: {{ $nama_dokter ?? '-' }}</td></tr>
        <tr>
            <td colspan="2">
                Menerangkan dengan sesungguhnya bahwa telah lahir seorang bayi <strong>{{ $gender ?? '-' }}</strong> di SHBK
                <div class="en">Herewith certify the birth of a</div>
               
            </td>
        </tr>
        <tr><td class="label">Nama Bayi/
            <div class="en2">Baby Name</div>
            </td>
            <td>: {{ $nama_bayi ?? '-' }}</td>
        </tr>
    </table>

    <!-- ====== BAYI ====== -->

    <!-- ====== IBU ====== -->
    <div class="section">IBU / MOTHER</div>
    <table>
        <tr><td class="label">Nama Ibu /<div class="en2">Mother's Name</div></td><td>: {{ $nama_ibu ?? '-' }}</td></tr>
        <tr><td class="label">No. RM</td><td>: {{ $no_rm ?? '-' }}</td></tr>
        <tr><td class="label">No. KTP/Paspor/SIM <div class="en">ID No./Passport No./Driving License</div></td><td>: {{ $nik_ibu ?? '-' }}</td></tr>
        <tr><td class="label">Alamat /<div class="en2">Address</div></td><td>: {{ $alamat_ibu ?? '-' }}</td></tr>
        <tr><td class="label">Pekerjaan /<div class="en2">Occupation</td><td>: {{ $pekerjaan_ibu ?? '-' }}</td></tr>
        <tr><td class="label">Gol. Darah /<div class="en2">Blood Type</td><td>: {{ $gol_darah_ibu ?? '-' }}</td></tr>
    </table>

    <!-- ====== AYAH ====== -->
    <div class="section">AYAH / FATHER</div>
    <table>
        <tr><td class="label">Nama Ayah /<div class="en2">Father's Name</td><td>: {{ $nama_ayah ?? '-' }}</td></tr>
        <tr><td class="label">No KTP/Paspor/SIM /<div class="en">ID No./Passport No./Driving License</td><td>: {{ $nik_ayah ?? '-' }}</td></tr>
        <tr><td class="label">Alamat /<div class="en2">Address</td><td>: {{ $alamat_ayah ?? '-' }}</td></tr>
        <tr><td class="label">Pekerjaan /<div class="en2">Occupation</td><td>: {{ $pekerjaan_ayah ?? '-' }}</td></tr>
        <tr><td class="label">Gol. Darah /<div class="en2">Blood Type</td><td>: {{ $gol_darah_ayah ?? '-' }}</td></tr>
    </table>

    <!-- ====== DETAIL LAHIR ====== -->
    <div class="section"></div>
        <div style="margin-left:55%; width:45%;">
            <table>
                <tr>
                    <td class="label">
                        Pada <span class="en2">On</span>
                    </td>
                    <td>: Hari <span class="en2">day</span> : <strong>{{ $hari_lahir ?? '-' }}</strong></td>
                    <td>
                        
                    </td>
                </tr>

                <tr>
                    <td class="label">
                        Tanggal <span class="en2">date</span>
                    </td>
                    <td>:  <strong>
                        {{ \Carbon\Carbon::parse($tgl_lahir)->locale('id')->translatedFormat('d F Y') }}
                    </strong>
                    </td>
                    <td>
                        
                    </td>
                </tr>

                <tr>
                    <td class="label">
                        Jam <span class="en2">time</span>
                    </td>
                    <td>: <strong>{{ $jam_lahir ?? '-' }} WIB</strong></td>
                    <td>
                        
                    </td>
                </tr>

                <tr>
                    <td class="label">
                        1. Berat <span class="en2">weight</span>
                    </td>
                    <td>: {{ $berat ?? '-' }} gr</td>
                    
                </tr>

                <tr>
                    <td class="label">
                        Panjang <span class="en2">length</span>
                    </td>
                    <td>: {{ $tinggi ?? '-' }} cm</td>
                    
                </tr>

                <tr>
                    <td class="label">
                        2. Persalinan <span class="en2">labor</span>
                    </td>
                    <td>: {{ $persalinan ?? '-' }}</td>
                    <td></td>
                </tr>

                <tr>
                    <td class="label">
                        3. Anak ke <span class="en2">Child No</span>
                    </td>
                    <td>: {{ $anak_ke ?? '-' }}</td>
                    <td></td>
                </tr>
            </table>
        </div>



    <!-- ====== SIGN ====== -->
    <table style="margin-top:14px">
        <tr>
            <td width="60%" style="vertical-align:bottom">
                <div style="border:1px solid #000;padding:6px;font-size:10px">
                    <strong>Perhatian :</strong><br>
                    Surat keterangan ini harus dilaporkan kepada kelurahan setempat dalam waktu 14 (empat belas) hari.
                </div>
            </td>
            <td width="40%" style="text-align:center">
                <p>Bandung, {{ $tgl_surat ?? now()->format('d F Y') }}</p>
                <div class="qr">
                    @if(!empty($qr_dokter))
                        <img src="{{ $qr_dokter }}" width="110">
                    @endif
                </div>
                <p><strong>{{ $nama_dokter ?? '-' }}</strong></p>
                <div class="en">Obstetrician</div>
            </td>
        </tr>
    </table>

</div>

</body>
</html>
