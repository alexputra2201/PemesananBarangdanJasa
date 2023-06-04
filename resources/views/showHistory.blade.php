@extends('layouts.mainCareer')

@section('container')


@if (session()->has('success'))
<div class="alert alert-success mt-3" role="alert">
    {{ session('success') }}
</div>
@endif


<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title">
            <span>History Saya</span>
            <h2>History Saya</h2>

        </div>

        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-jasadesign" class="filter">Jasa Design</li>
                    <li data-filter=".filter-jasakonstruksi" class="filter">Jasa Konstruksi</li>
                    <li data-filter=".filter-rimbopanjang" class="filter">Perumahan Rimbo Panjang</li>
                    <li data-filter=".filter-rovinaresidence" class="filter">Perumahan Rovina Residence</li>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container">

            <div class="portfolio-item filter-jasadesign">
                <h3>Jasa Design</h3>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Lengkap</th>
                                {{-- <th scope="col">Email</th> --}}
                                <th scope="col">Deskripsi</th>
                                <th scope="col">Nomor Handphone</th>
                                <th scope="col">Gambar Pelanggan</th>

                                <th scope="col">Bukti Transaksi DP</th>
                                <th scope="col">Total Harga</th>

                                <th scope="col">Bukti Pelunasan</th>

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
                                {{-- <td>{{ $pemesananjasa->email }}</td> --}}
                                <td>{!! $pemesananjasa->deskripsi !!}</td>
                                <td>{{ $pemesananjasa->no_hp }}</td>
                                <td><a href="{{ asset('storage/' . $pemesananjasa->image) }}">Click to See</a></td>

                                @if ($pemesananjasa->bukti_transaksi != null)
                                <td><a href="{{ asset('storage/' . $pemesananjasa->bukti_transaksi) }}">Click to See</a>
                                </td>
                                @else
                                <td>Belum membayar DP</td>
                                @endif

                                <td>{{ $pemesananjasa->total_harga }}</td>


                                @if($pemesananjasa->bukti_transaksi_pelunasan != null)
                                <td><a href="{{ asset('storage/' . $pemesananjasa->bukti_transaksi_pelunasan) }}">Click
                                        to
                                        See</a></td>
                                @elseif($pemesananjasa->status == "Pending")
                                <td></td>
                                @elseif($pemesananjasa->status == "Proses")
                                <td>
                                    <a href="/history/{{ $pemesananjasa->id }}/edit" class="badge bg-warning"> Submit
                                        Pelunasan</a>
                                </td>
                                @endif

                                {{-- @if($pemesananjasa->bukti_transaksi_pelunasan != null)
                    <td><a href="{{ asset('storage/' . $pemesananjasa->bukti_transaksi_pelunasan) }}">Click to See</a>
                                </td>
                                @elseif($pemesananjasa->total_harga != null)
                                <td>
                                    <a href="/history/{{ $pemesananjasa->id }}/edit" class="badge bg-warning"> Submit
                                        Pelunasan</a>
                                </td>
                                @endif --}}



                                <!-- Membuat status menjadi kuning, merah dan hijau-->
                                @if($pemesananjasa->status == "Pending")
                                <td> <span class="badge bg-warning">{{ $pemesananjasa->status }}</span></td>
                                @elseif ($pemesananjasa->status == "Proses")
                                <td> <span class="badge bg-primary">{{ $pemesananjasa->status }}</span></td>
                                @elseif($pemesananjasa->status == "Done")
                                <td><span class="badge bg-success">{{ $pemesananjasa->status }}</span></td>
                                @endif

                                @if($pemesananjasa->status == "Done")
                                <td><a href="{{ asset('storage/' . $pemesananjasa->image_develop) }}">Click to See</a>
                                </td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="portfolio-item filter-jasakonstruksi">
                <h3>Jasa Konstruksi</h3>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Lengkap</th>
                                {{-- <th scope="col">Email</th> --}}
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
                                {{-- <td>{{ $pemesananjasa->email }}</td> --}}
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
                                <td><a href="{{ asset('storage/' . $pemesananjasa->bukti_transaksi) }}">Click to See</a>
                                </td>
                                @elseif ($pemesananjasa->status == "Pending")
                                <td></td>
                                @elseif($pemesananjasa->status == "Proses")
                                <td>
                                    <a href="/historyKonstruksi/{{ $pemesananjasa->id }}/edit" class="badge bg-warning">
                                        Submit Pembayaran DP</a>
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

            
            <div class="portfolio-item filter-rimbopanjang">
                <h3>Perumahan Rimbo Panjang</h3>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Lengkap</th>
                                {{-- <th scope="col">Email</th> --}}
                                <th scope="col">Bank</th>
                                <th scope="col">Kredit</th>
                                <th scope="col">KPR BTN Syariah</th>
                                <th scope="col">Form Aplikasi Mandiri</th>
                                <th scope="col">FLPP Mandiri</th>
                                <th scope="col">Surat Pernyataan KPR Mandiri</th>
                                <th scope="col">Tanggal Ketemu</th>
                                <th scope="col">Nomor Handphone</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($pemesananbarangs as $pb)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $pb->nama_lengkap }}</td>
                                {{-- <td>{{ $pb->email }}</td> --}}
                                <td>{{ $pb->bank }}</td>
                                <td>{{ $pb->kredit }}</td>
                                <td>
                                    @if($pb->formbtn != null)
                                    <a href="{{ asset('storage/' . $pb->formbtn) }}">Click to Download</a>
                                    @else
                                    -
                                    @endif
                                </td>

                                <td>
                                    @if($pb->formaplikasikprmandiri != null)
                                    <a href="{{ asset('storage/' . $pb->formaplikasikprmandiri) }}">Click to
                                        Download</a>
                                    @else
                                    -
                                    @endif
                                </td>

                                <td>
                                    @if ($pb->lampiranflppmandiri != null)
                                    <a href="{{ asset('storage/' . $pb->lampiranflppmandiri) }}">Click to Download</a>
                                    @else
                                    -
                                    @endif
                                </td>

                                <td>
                                    @if ($pb->suratPernyataanKPRmandiri != null)
                                    <a href="{{ asset('storage/' . $pb->suratPernyataanKPRmandiri) }}">Click to
                                        Download</a>
                                    @else
                                    -
                                    @endif

                                </td>
                                <td>{{date('d-m-Y', strtotime($pb->tanggal)); }}</td>
                                <td>{{ $pb->no_hp }}</td>

                                <!-- Membuat status menjadi kuning, merah dan hijau-->
                                @if($pb->status == "Pending")
                                <td> <span class="badge bg-warning">{{ $pb->status }}</span></td>
                                @elseif ($pb->status == "Proses")
                                <td> <span class="badge bg-primary">{{ $pb->status }}</span></td>
                                @elseif($pb->status == "Done")
                                <td><span class="badge bg-success">{{ $pb->status }}</span></td>
                                @endif
                            </tr>
                            @endforeach
                           
                        </tbody>
                    </table>
                   
                </div>
            </div>
            

            <div class="portfolio-item filter-rovinaresidence">
                <h3>Perumahan Rovina Residence</h3>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Nama Lengkap</th>
                                {{-- <th scope="col">Email</th> --}}
                                <th scope="col">Bank</th>
                                <th scope="col">Kredit</th>
                                <th scope="col">KPR BTN Syariah</th>
                                <th scope="col">Form Aplikasi Mandiri</th>
                                <th scope="col">FLPP Mandiri</th>
                                <th scope="col">Surat Pernyataan KPR Mandiri</th>
                                <th scope="col">Tanggal Ketemu</th>
                                <th scope="col">Nomor Handphone</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($rovinaresidences as $pb)
                            <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $pb->nama_lengkap }}</td>
                                {{-- <td>{{ $pb->email }}</td> --}}
                                <td>{{ $pb->bank }}</td>
                                <td>{{ $pb->kredit }}</td>
                                <td>
                                    @if($pb->formbtn != null)
                                    <a href="{{ asset('storage/' . $pb->formbtn) }}">Click to Download</a>
                                    @else
                                    -
                                    @endif
                                </td>

                                <td>
                                    @if($pb->formaplikasikprmandiri != null)
                                    <a href="{{ asset('storage/' . $pb->formaplikasikprmandiri) }}">Click to
                                        Download</a>
                                    @else
                                    -
                                    @endif
                                </td>

                                <td>
                                    @if ($pb->lampiranflppmandiri != null)
                                    <a href="{{ asset('storage/' . $pb->lampiranflppmandiri) }}">Click to Download</a>
                                    @else
                                    -
                                    @endif
                                </td>

                                <td>
                                    @if ($pb->suratPernyataanKPRmandiri != null)
                                    <a href="{{ asset('storage/' . $pb->suratPernyataanKPRmandiri) }}">Click to
                                        Download</a>
                                    @else
                                    -
                                    @endif

                                </td>
                                <td>{{date('d-m-Y', strtotime($pb->tanggal)); }}</td>
                                <td>{{ $pb->no_hp }}</td>

                                <!-- Membuat status menjadi kuning, merah dan hijau-->
                                @if($pb->status == "Pending")
                                <td> <span class="badge bg-warning">{{ $pb->status }}</span></td>
                                @elseif ($pb->status == "Proses")
                                <td> <span class="badge bg-primary">{{ $pb->status }}</span></td>
                                @elseif($pb->status == "Done")
                                <td><span class="badge bg-success">{{ $pb->status }}</span></td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>

    </div>
</section><!-- End Portfolio Section -->



@endsection