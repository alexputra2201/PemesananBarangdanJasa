@extends('layouts.mainCareer')

@section('container')


@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="section-title">
    <span>Our Product</span>
    <h2>Our Product</h2>
</div>
<a href="/product/create" class="btn btn-primary">Apply Jasa</a>
<a href="/pemesananbarang/create" class="btn btn-primary">Apply Perumahan</a>
<div class="row">

    @foreach ($products as $product)
    <div class="col-lg-4 col-md-6 mt-4 mt-md-0 mb-2 pt-4">
        <div class="col">
            <div class="card">
                <h4 class="d-flex flex-row-start ms-3 mt-3"><a href="/pemesananbarang/create">{{ $product->nama_produk }}</a>
                </h4>
                <div class="card-body">
                    <div class="card-text">
                        <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top" alt="..."
                            style="max-height: 200px; max-width: 400px;">
                    </div>
                </div>
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
                    <a href="/product/create/">{{ $j->nama_jasa }}</a>
                    @else
                    <a href="/pemesananjasakonstruksi/create/">{{ $j->nama_jasa }}</a>
                    @endif
                </h4>
                <div class="card-body">
                    <div class="card-text">
                        <img src="{{ asset('storage/' . $j->image) }}" class="card-img-top" alt="..."
                            style="max-height: 200px; max-width: 400px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach



</div>


@endsection