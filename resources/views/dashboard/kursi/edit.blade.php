@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Kursi</h1>
</div>


<div class="col-lg-8">
    <form method="post" action="/dashboard/kursi/{{$kursi->id}}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nomor" class="form-label">Nomor Kursi</label>
            <input type="text" class="form-control @error('nomor') is-invalid @enderror" id="nomor" name="nomor" required autofocus value="{{old('nomor', $kursi->nomor)}}">
            @error('nomor')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="category" class="form-label">Perumahan</label>
            <select class="form-select" name="product_id" id="product_id">
                @foreach ($products as $product)
                @if(old('product_id') == $product->id)
                <option value="{{ $product->id }}" selected>{{ $product->nama_produk }}</option>
                @else
                <option value="{{ $product->id }}">{{ $product->nama_produk }}</option>
                @endif
    
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Kursi</button>
    </form>

</div>


@endsection