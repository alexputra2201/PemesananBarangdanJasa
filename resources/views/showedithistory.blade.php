@extends('layouts.mainCareer')


@section('container')
<div class="mt-3">
    <div class="section-title">
        <span>Submit Pembayaran Lunas</span>
        <h2>Submit Pembayaran Lunas</h2>
    </div>
<form method="post" action="/history/{{$pemesananjasa->id}}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf

    <div class="mb-3">
        <label for="total_harga" class="form-label">Total Harga</label>
        <input type="text" class="form-control @error('total_harga') is-invalid @enderror" id="total_harga" name="total_harga" required 
        value="{{old('total_harga', $pemesananjasa->total_harga)}}" disabled>
        @error('total_harga')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="bukti_transaksi_pelunasan" class="form-label @error('bukti_transaksi_pelunasan') is-invalid @enderror">Bukti Pelunasan</label>
        <input type="hidden" name="oldImage" value="{{ $pemesananjasa->bukti_transaksi_pelunasan }}">
        @if($pemesananjasa->bukti_transaksi_pelunasan)
        <img src="{{ asset('storage/' . $pemesananjasa->bukti_transaksi_pelunasan) }}" class="img-preview2 img-fluid mb-3 col-sm-5 d-block">
        <input class="form-control" type="file" id="bukti_transaksi_pelunasan" name="bukti_transaksi_pelunasan" onchange="previewImage()">
        @else
        <img class="img-preview2 img-fluid mb-3 col-sm-5">
        <input class="form-control" type="file" id="bukti_transaksi_pelunasan" name="bukti_transaksi_pelunasan" onchange="previewImage()">
        @endif

        @error('bukti_transaksi_pelunasan')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>

@endsection

<script>
    
    function previewImage() {
        const image = document.querySelector('#bukti_transaksi_pelunasan');
        const imgPreview = document.querySelector('.img-preview2');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>