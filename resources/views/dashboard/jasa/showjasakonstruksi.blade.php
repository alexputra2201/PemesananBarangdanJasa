@extends('dashboard.layouts.main')


@section('container')

    <div class="row my-3">
        <div class="col">
            <article>
                <h1 class="mb-3">{{ $jasa->nama_jasa }}</h1>
                <a href="/dashboard/jasas" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all
                    my jasa</a>
                <a href="/dashboard/jasas/{{ $jasa->id}}/edit" class="btn btn-warning"><span
                        data-feather="edit"></span> Edit</a>

                <form action="/dashboard/jasas/{{$jasa->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this?')"><span
                            data-feather="x-circle"></span> Delete</button>

                </form>

                <div class="card-body">
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
                                    <th scope="col">Gambar Penawaran</th>
                                    <th scope="col">Down Payment (DP)</th>
                                    <th scope="col">Bukti Transaksi DP</th>
                                    <th scope="col">Total Harga</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($pemesananjasas as $pemesananjasa)
                               <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $pemesananjasa->nama_lengkap }}</td>
                                <td>{{ $pemesananjasa->email }}</td>
                                <td>{!! $pemesananjasa->deskripsi !!}</td>
                                <td><a aria-label="Chat on WhatsApp" href="https://wa.me/+62{{ $pemesananjasa->no_hp }}"> {{ $pemesananjasa->no_hp }}</td>
                                <td><a href="{{ asset('storage/' . $pemesananjasa->image) }}">Click to See</a></td>
                                
                                <td><a href="{{ asset('storage/' . $pemesananjasa->penawaran) }}">Click to See</a></td>
                                <td>{{ $pemesananjasa->dp }}</td>
                                @if ($pemesananjasa->bukti_transaksi == null)
                                <td></td>
                                @else
                                <td><a href="{{ asset('storage/' . $pemesananjasa->bukti_transaksi) }}">Click to See</a></td>
                                @endif

                                <td>{{ $pemesananjasa->total_harga }}</td>
                               
                                <!-- Membuat status menjadi kuning, merah dan hijau-->
                                @if($pemesananjasa->status == "Pending")
                                <td> <span class="badge bg-warning">{{ $pemesananjasa->status }}</span></td>
                                @elseif ($pemesananjasa->status == "Proses")
                                <td> <span class="badge bg-primary">{{ $pemesananjasa->status }}</span></td>
                                @elseif($pemesananjasa->status == "Done")
                                <td><span class="badge bg-success">{{ $pemesananjasa->status }}</span></td>
                                @endif
                                
                                <td>
                                    <a href="/dashboard/jasakonstruksi/{{ $pemesananjasa->id }}/edit" class="badge bg-warning"> <img src="{{ asset('assets/edit.svg') }}" alt="eye"></a>
                                </td>
                                
                            </tr>
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </article>

        </div>
    </div>


@endsection