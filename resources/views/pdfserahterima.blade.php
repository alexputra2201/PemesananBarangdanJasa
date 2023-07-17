<!DOCTYPE html>
<html>

<head>
    <title>{{ $title }}</title>
    <style type="text/css">
      .justify {
        text-align: justify;
      }

      .center-table {
      margin-left: auto;
      margin-right: auto;
    }

    .line-spacing {
      line-height: 1.5;
    }
    </style>
</head>

<body>
    <img src="{{ asset('assets/Header RJS.png') }}" alt="Header RJS" style="width: 700px; height: 150px;">
    <h3 style="display: flex; text-align: center; justify-content: center;">{{ $title }}
        <br> /RJS/PKU/ /2023</h3>
        <div class="line-spacing">
    <p class="justify">Pada hari dan Tanggal ini</p>
    @foreach ($pemesananbarang as $pb)
    <p class="justify">Hari : {{date('d-m-Y', strtotime($pb->tanggal)); }}</p>
    <p style="text-indent: 45px;" class="justify" align="justify">
        Telah dilakukan pemeriksaan fisik bersama antara pihak penjual (PT. Rovina Jaya 
        Sentosa) dengan Pihak Pembeli sebagai berikut :
    </p>
    <table>
        <tr>
            <td>Nama</td>
            <td>:</td>
            <td>{{ $pb->nama_lengkap }}</td>
        </tr>
        <tr>
            <td>Nomor Handphone</td>
            <td>:</td>
            <td>{{ $pb->no_hp }}</td>
        </tr>
    </table>

    <p style="text-indent: 45px;" class="justify" align="justify">
        Untuk Rumah tempat tinggal 1 (Satu) unit 1 (Satu) lantai dengan seluas 36 m<sup>2</sup> yang 
        terletak diatas tanah seluas 108m<sup>2</sup>, setempat dikenal sebagai perumahan Perumnas Rimbo 
        Panjang yang berlokasi di Jalan Sarana Utama No .... Keluarahan Rimbo Panjang, 
        Kecamatan Tambang, Kampar.
    </p>
    
  </div>

    <p class="justify" align="justify">Dan kedua belah pihak bersepakat sebagai berikut :</p>
    <p style="text-indent: 45px;" class="justify" align="justify">
        1. Pembeli menyatakan kepada penjual bahwa tanah dan bangunan yang diterima 
        dalam keadaan baik dan layak untuk dihuni. Dan bersamaan dengan 
        penandatangan berita acara ini, Pembeli menyatakan telah menerima 1 (satu) 
        set kunci dari penjual.
    </p>
    <p style="text-indent: 45px;" class="justify" align="justify">
        2. Hak dan kepemilikan atas bangunan rumah tersebut beralih sepenuhnya kepada 
        Pihak Pembeli setelah pelunasan angsuran atau Penandatanganan AJB (Akta Jual Beli).
    </p>
    <p style="text-indent: 45px;" class="justify" align="justify">
        3. Pembeli menyatakan bersedia menerima dengan baik jaminan pemeliharaan selama 
        30 (tigapuluh) hari yang diberikan oleh penjual, terhitung sejak tanggal berita acara ini.
    </p>
    <p style="text-indent: 45px;" align="justify">
        4. Terhitung sejak tanggal berita acara serah terima ini, segala keuntungan dan 
        kerugian atas tanah dan bangunan menjadi milik pembeli, dan pembeli 
        membebaskan penjual dari kewajiban apapun.
    </p>
    <div class="line-spacing">

    <p style="text-indent: 45px" class="justify" align="justify">
      Demikian Berita Acara Serah Terima ini dibuat untuk dapat diketahui oleh semua pihak 
      yang berkepentingan dan dipergunakan sebagaimana perlunya.
    </p>
  </div>

        <table class="center-table">
          <tr>
            <td></td>
            <td>Pekanbaru , {{date('d-m-Y', strtotime($pb->tanggal)); }}</td>
            <td></td>
          </tr>
          <tr>
            <td>Yang Menyerahkan</td>
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
          <tr>
            <td></td>
            <td></td>
          </tr>
          <tr>
            <td></td>
            <td></td>
          </tr>
          <tr></tr>
          <tr></tr>
          <tr>
            <td><b>PT Rovina Jaya Sentosa</b></td>
            <td></td>
            <td>{{ $pb->nama_lengkap }}</td>
          </tr>
        </table>
    


    @endforeach

</body>

</html>