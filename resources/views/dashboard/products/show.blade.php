@extends('dashboard.layouts.main')


@section('container')

    <div class="row my-3">
        <div class="col">
                <h1 class="mb-3">{{ $product->nama_produk }}</h1>
                <a href="/dashboard/products" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all
                    my products</a>
                <a href="/dashboard/products/{{ $product->id}}/edit" class="btn btn-warning"><span
                        data-feather="edit"></span> Edit</a>

                {{-- <form action="/dashboard/products/{{$product->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this?')"><span
                            data-feather="x-circle"></span> Delete</button>

                </form> --}}

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Bank</th>
                                    <th scope="col">Kredit</th>
                                    <th scope="col">KPR BTN Syariah</th>
                                    <th scope="col">Form Aplikasi Mandiri</th>
                                    <th scope="col">FLPP Mandiri</th>
                                    <th scope="col">Surat Pernyataan KPR Mandiri</th>
                                    <th scope="col">Nomor Handphone</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               @foreach ($pemesananbarangs as $pb)
                               <tr>
                                <td>{{$loop->iteration}}</td>
                                <td>{{ $pb->nama_lengkap }}</td>
                                <td>{{ $pb->email }}</td>
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
                                    <a href="{{ asset('storage/' . $pb->formaplikasikprmandiri) }}">Click to Download</a>
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
                                    <a href="{{ asset('storage/' . $pb->suratPernyataanKPRmandiri) }}">Click to Download</a>
                                    @else
                                    -
                                    @endif
                                    
                                </td>

                                <td>{{ $pb->no_hp }}</td>
                                <td>{{ $pb->tanggal }}</td>
                                <td>{{ $pb->status }}</td>
                                <td> <a href="/pemesananbarang/{{ $pb->id }}/edit" class="badge bg-warning"> <img src="{{ asset('assets/edit.svg') }}" alt="eye"></a></td>
                               </tr>
                                  
                               @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
    </div>
</div>


@endsection