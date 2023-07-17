<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style>
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Mengatur tinggi div agar terpusat secara vertikal */
        }

        .container img {
            display: block;
            margin: 0 auto;
        }

        .center-table {
      margin-left: auto;
      margin-right: auto;
    }
    </style>
</head>

<body>
    <h3 style="display: flex; text-align: center; justify-content: center;"><u>{{ $title }}</u></h3>
    <h4 style="display: flex; text-align: center; justify-content: center;"><i>No 001/BAST/ /PT ROVINA JAYA SENTOSA/VIII/2023</i></h4>
    @foreach ($pemesananjasa as $pj)
    Pekerjaan : {!! $pj->deskripsi !!} 
    Pada tanggal {{ $tanggal }}, yang bertandatangan dibawah ini :
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>Jo Jo Tan</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>Direktur</td>
        </tr>
    </table>
    
    Dengan ini menyatakan bahwa : 
    <br>
    <b>Nilai Yang ditagihkan</b>
    <br>
    Atas pekerjaan yang telah dilaksanakan tersebut, perhitungan pembayaran atas BAST tersebut sebagai berikut :
    <div class="container">
        <table class="center-table">
            <tr>
                <td></td>
                <td><img src="{{ asset('storage/' . $pj->penawaran) }}" alt="penawaran" style="width: 400px; height: 400px;"></td>
                <td></td>
            </tr>
        </table>

        <table class="center-table">
            <tr>
              <td></td>
              <td>Pekanbaru , {{$tanggal}}</td>
              <td></td>
            </tr>
            <tr>
              <td>PT Rovina Jaya Sentosa
                <br>Kontraktor Pelaksana
              </td>
              <td></td>
              <td>Yang Menerima</td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr>
              <td></td>
              <td></td>
            </tr>
            <tr></tr>
            <tr>
                <td><img src="{{ asset('assets/TTD.png') }}" alt="Header RJS" style="width: 200px;" class="image-right"></td>
                <td></td>
                <td></td>
            </tr>
            <tr>
              <td><b><u>Jo Jo Tan</u></b></td>
              <td></td>
              <td>{{ $pj->nama_lengkap }}</td>
            </tr>
            <tr>
                <td>Direktur</td>
                <td></td>
                <td></td>
            </tr>
          </table>
    </div>



    @endforeach
</body>

</html>