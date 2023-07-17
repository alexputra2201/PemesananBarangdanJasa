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
                                    <th scope="col">Booking</th>
                                    <th scope="col">Booking Fee</th>
                                    <th scope="col">Syarat Pengambilan Rumah</th>
                                    <th scope="col">Bank</th>
                                    <th scope="col">Kredit</th>
                                    <th scope="col">Syarat KPR</th>
                                    <th scope="col">Form Aplikasi BTN</th>
                                    <th scope="col">Form Aplikasi Mandiri</th>
                                    <th scope="col">Nomor Handphone</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Serah Terima Kunci</th>
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
                                

                                <td>{{ $pb->kursi->nomor }}</td>
                                
                                    @if($pb->booking_fee != null) 
                                    <td><a href="{{ asset('storage/' . $pb->booking_fee) }}">Click to Download</a>
                                    </td>
                                    @else
                                    <td>-</td>
                                    @endif

                                    @if($pb->syaratpengambilanrumah != null) 
                                    <td><a href="{{ asset('storage/' . $pb->syaratpengambilanrumah) }}">Click to Download</a>
                                    </td>
                                    @else
                                    <td>-</td>
                                    @endif                          
                            
             
                                <td>{{ $pb->bank }}</td>
                                <td>{{ $pb->kredit }}</td>

                                @if($pb->syaratkpr != null) 
                                <td><a href="{{ asset('storage/' . $pb->syaratkpr) }}">Click to Download</a>
                                </td>
                                @else
                                <td>-</td>
                                @endif

                                
                                    @if($pb->formaplikasikprbtn != null) 
                                    <td><a href="{{ asset('storage/' . $pb->formaplikasikprbtn) }}">Click to Download</a>
                                    </td>
                                        @else
                                    <td>-</td>
                                    @endif

                                    @if($pb->formaplikasikprmandiri != null) 
                                    <td><a href="{{ asset('storage/' . $pb->formaplikasikprmandiri) }}">Click to Download</a>
                                    </td>
                                        @else
                                    <td>-</td>
                                    @endif
                                    
                         

                                <td>{{ $pb->no_hp }}</td>

                                @if(!$pb->tanggal == null)

                                <td>{{date('d-m-Y', strtotime($pb->tanggal)); }}</td>
                                @else
                                <td></td>
                                @endif

                                @if($pb->status == 'Done') 
                                    <td><a href="/generate-pdf-serahterima/{{ $pb->id }}">Generate BAST</a>
                                    </td>
                                        @else
                                    <td>-</td>
                                    @endif

                                <!-- Membuat status menjadi kuning, merah dan hijau-->
                                @if($pb->status == "Pending")
                                <td> <span class="badge bg-warning">{{ $pb->status }}</span></td>
                                @elseif ($pb->status == "Proses")
                                <td> <span class="badge bg-primary">{{ $pb->status }}</span></td>
                                @elseif($pb->status == "Done")
                                <td><span class="badge bg-success">{{ $pb->status }}</span></td>
                                @endif
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