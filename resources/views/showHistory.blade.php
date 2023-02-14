@extends('layouts.mainCareer')

@section('container')


@if (session()->has('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="section-title">
    <span>Our History</span>
    <h2>Our History</h2>
</div>

<div id="historydesign">
    <h3>Jasa Design</h3>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Email</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Nomor Handphone</th>
                    <th scope="col">Gambar Pelanggan</th>

                    <th scope="col">Bukti Transaksi DP</th>
                    <th scope="col">Total Harga</th>

                    @foreach ($pemesanandesign as $pemesananjasa)
                    @if ($pemesananjasa->total_harga != null)
                    <th scope="col">Bukti Pelunasan</th>    
                    @endif
                   
                    @endforeach
                    <th scope="col">Status</th>
                    @foreach ($pemesanandesign as $pemesananjasa)
                    @if($pemesananjasa->status == "Done")
                    <th scope="col">Gambar Development</th>

                    @endif
                    @endforeach
                </tr>
            </thead>
            <tbody>
                @foreach ($pemesanandesign as $pemesananjasa)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $pemesananjasa->nama_lengkap }}</td>
                    <td>{{ $pemesananjasa->email }}</td>
                    <td>{!! $pemesananjasa->deskripsi !!}</td>
                    <td>{{ $pemesananjasa->no_hp }}</td>
                    <td><a href="{{ asset('storage/' . $pemesananjasa->image) }}">Click to See</a></td>

                    @if ($pemesananjasa->bukti_transaksi == null)
                    <td></td>
                    @else
                    <td><a href="{{ asset('storage/' . $pemesananjasa->bukti_transaksi) }}">Click to See</a></td>
                    @endif

                    <td>{{ $pemesananjasa->total_harga }}</td>

                    @if($pemesananjasa->bukti_transaksi_pelunasan != null)
                    <td><a href="{{ asset('storage/' . $pemesananjasa->bukti_transaksi_pelunasan) }}">Click to See</a>
                    </td>
                        @elseif($pemesananjasa->total_harga != null)
                    <td>
                        <a href="/history/{{ $pemesananjasa->id }}/edit" class="badge bg-warning"> Submit Pelunasan</a>
                    </td>
                    @else
                    <td></td>
                    @endif

                     <!-- Membuat status menjadi kuning, merah dan hijau-->
                     @if($pemesananjasa->status == "Pending")
                     <td> <span class="badge bg-warning">{{ $pemesananjasa->status }}</span></td>
                     @elseif ($pemesananjasa->status == "Proses")
                     <td> <span class="badge bg-primary">{{ $pemesananjasa->status }}</span></td>
                     @elseif($pemesananjasa->status == "Done")
                     <td><span class="badge bg-success">{{ $pemesananjasa->status }}</span></td>
                     @endif

                    @if($pemesananjasa->status == "Done")
                    <td><a href="{{ asset('storage/' . $pemesananjasa->image_develop) }}">Click to See</a></td>
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<div id="historykonstruksi">
    <h3>Jasa Konstruksi</h3>
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Email</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Nomor Handphone</th>
                    <th scope="col">Gambar Pelanggan</th>
                    <th scope="col">Penawaran</th>
                    <th scope="col">DP</th>
                    <th scope="col">Bukti DP</th>
                    <th scope="col">Status</th>
                  

                </tr>
            </thead>
            <tbody>
                @foreach ($pemesanankonstruksi as $pemesananjasa)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $pemesananjasa->nama_lengkap }}</td>
                    <td>{{ $pemesananjasa->email }}</td>
                    <td>{!! $pemesananjasa->deskripsi !!}</td>
                    <td>{{ $pemesananjasa->no_hp }}</td>

                    <td><a href="{{ asset('storage/' . $pemesananjasa->image) }}">Click to See</a></td>
                    @if($pemesananjasa->penawaran == null)
                    <td></td>
                    @else
                    <td><a href="{{ asset('storage/' . $pemesananjasa->penawaran) }}">Click to See</a></td>
                    @endif
                    
                    <td>{{ $pemesananjasa->dp }}</td>
                    
                    @if ($pemesananjasa->bukti_transaksi != null)
                    <td><a href="{{ asset('storage/' . $pemesananjasa->bukti_transaksi) }}">Click to See</a></td>
                    @elseif ($pemesananjasa->status == "Pending")
                    <td></td>
                    @elseif($pemesananjasa->status == "Proses")
                        <td>
                            <a href="/historyKonstruksi/{{ $pemesananjasa->id }}/edit" class="badge bg-warning"> Submit Pembayaran DP</a>
                        </td>
                    @endif

                    
                   

                      <!-- Membuat status menjadi kuning, merah dan hijau-->
                      @if($pemesananjasa->status == "Pending")
                      <td> <span class="badge bg-warning">{{ $pemesananjasa->status }}</span></td>
                      @elseif ($pemesananjasa->status == "Proses")
                      <td> <span class="badge bg-primary">{{ $pemesananjasa->status }}</span></td>
                      @elseif($pemesananjasa->status == "Done")
                      <td><span class="badge bg-success">{{ $pemesananjasa->status }}</span></td>
                      @endif
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


@endsection