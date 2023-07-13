@extends('layouts.mainCareer')

@section('container')


@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="section-title">
    <span>Produk Kami</span>
    <h2>Produk Kami</h2>
</div>
{{-- <a href="/product/create" class="btn btn-primary">Pesan Jasa</a>
<a href="/pemesananbarang/create" class="btn btn-primary">Pesan Perumahan</a> --}}
<div class="row">

    @foreach ($products as $product)
    <div class="col-lg-4 col-md-6 mt-4 mt-md-0 mb-2 pt-4">
        <div class="col">
            <div class="card">
                <h4 class="d-flex flex-row-start ms-3 mt-3">
                    @if ($product->nama_produk == "Perumahan Rimbo Panjang")
                    <a href="/pemesananperumnasrimbo">{{ $product->nama_produk }}</a>
                    @else
                    <a href="/pemesananperumnasrovina">{{ $product->nama_produk }}</a>
                    @endif
                </h4>
                <div class="card-body">
                    <div class="card-text">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="..."
                            style="max-height: 250px; max-width: 400px;">
                    </div>


                </div>

                @if ($product->nama_produk == "Perumahan Rimbo Panjang")
                <div class="d-flex flex-row-reverse mb-3 mx-3">
                    <a href="" data-bs-toggle="modal" data-bs-target="#perumahanrimbopanjang">Baca Selengkapnya</a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="perumahanrimbopanjang" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Perumahan Rimbo Panjang</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {!! $products[0]->deskripsi !!}
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Selanjutnya</button> --}}
                                <a href="/pemesananperumnasrovina/">Selanjutnya</a>
                            </div>
                        </div>
                    </div>
                </div>

                @else
                <div class="d-flex flex-row-reverse mb-3 mx-3">
                    <a href="" data-bs-toggle="modal" data-bs-target="#perumahanrovina">Baca Selengkapnya</a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="perumahanrovina" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Perumahan Rovina Residence</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {!! $products[1]->deskripsi !!}
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                {{-- <button type="button" class="btn btn-primary">Selanjutnya</button> --}}
                                <a href="/pemesananperumnasrovina/">Selanjutnya</a>
                            </div>
                        </div>
                    </div>
                </div>

                @endif


            </div>
        </div>
    </div>
    @endforeach

    @foreach ($jasa as $j)
    <div class="col-lg-4 col-md-6 mt-4 mt-md-0 mb-2 pt-4">
        <div class="col">
            <div class="card">
                <h4 class="d-flex flex-row-start ms-3 mt-3">
                    @if ($j->nama_jasa == "Jasa Design")
                    <a href="/product/create">{{ $j->nama_jasa }}</a>
                    @else
                    <a href="/pemesananjasakonstruksi/create">{{ $j->nama_jasa }}</a>
                    @endif
                </h4>
                <div class="card-body">
                    <div class="card-text">
                        <img src="{{ asset('storage/' . $j->image) }}" class="card-img-top" alt="..."
                            style="max-height: 250px; max-width: 400px;">
                    </div>
                </div>
                @if ($j->nama_jasa == "Jasa Design")
                <div class="d-flex flex-row-reverse mb-3 mx-3">
                    <a href="" data-bs-toggle="modal" data-bs-target="#jasadesign">Baca Selengkapnya</a>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="jasadesign" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Jasa Desain</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {!! $jasa[0]->deskripsi !!}
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary">Selanjutnya</button> --}}
                                <a href="/product/create/">Selanjutnya</a>
                            </div>
                        </div>
                    </div>
                </div>

                @else
                <div class="d-flex flex-row-reverse mb-3 mx-3">
                    <a href="" data-bs-toggle="modal" data-bs-target="#jasakonstruksi">Baca Selengkapnya</a>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="jasakonstruksi" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Detail Konstruksi</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                {!! $jasa[1]->deskripsi !!}
                            </div>
                            <div class="modal-footer">
                                {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                {{-- <button type="button" class="btn btn-primary">Selanjutnya</button> --}}
                                <a href="/pemesananjasakonstruksi/create/">Selanjutnya</a>
                            </div>
                        </div>
                    </div>
                </div>

                @endif

            </div>
        </div>
    </div>
    @endforeach



</div>


@endsection