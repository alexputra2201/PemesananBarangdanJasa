<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <style>
        /* table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        } */

        .image-right {
            float: right;
        }

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
    <img src="{{ asset('assets/Header RJS.png') }}" alt="Header RJS" style="width: 700px; height: 150px;">
    <h3 style="display: flex; text-align: center; justify-content: center;"><u>{{ $title }}</u></h3>
    @foreach ($pemesananjasa as $pj)
    <b style="text-align: left">Untuk : {{ htmlspecialchars($pj->nama_lengkap) }}</b>
    <b style="float: right;">No Inovice : 022/ESP/III/23</b>
    <br>
    <b style="text-align: left">Attn : Finance Department</b>
<br>
    <b style="text-align: left">Credit Term : 30 days</b>
    <div class="container">
        <table class="center-table">
            <tr>
                <td></td>
                <td><img src="{{ asset('storage/' . $pj->penawaran) }}" alt="penawaran" style="width: 550px; height: 550px;"></td>
                <td></td>
            </tr>
        </table>
        
    </div>

    

    @endforeach

    <p style="text-align: right;">Pekanbaru,{{$tanggal}}</p>
    <img src="{{ asset('assets/TTD.png') }}" alt="Header RJS" style="width: 200px;" class="image-right"><br><br>
    <br>
    <p style="text-align: right;"><b>Jo Jo Tan</b></p>






</body>

</html>