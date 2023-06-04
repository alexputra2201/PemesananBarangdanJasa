@extends('layouts.mainCareer')


@section('container')
<div class="mt-3">
    <div class="section-title">
        <span>Submit Pembayaran DP</span>
        <h2>Submit Pembayaran DP</h2>
    </div>
<form method="post" action="/historyKonstruksi/{{$pemesananjasa->id}}" class="mb-5" enctype="multipart/form-data">
    @method('put')
    @csrf

    <div class="mb-3">
        <label for="dp" class="form-label">Total DP</label>
        <input type="text" class="form-control @error('dp') is-invalid @enderror" id="dp" name="dp" required 
        value="{{old('dp', $pemesananjasa->dp)}}" disabled>
        @error('dp')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="alert alert-danger col-5" role="alert">
        <i class="bi bi-exclamation-circle"></i>
        Wajib Melakukan DP <br>
        Rekening : 1080077177377 PT Rovina Jaya Sentosa Bank Mandiri. Terima Kasih
    </div>

    <div class="mb-3">
        <label for="bukti_transaksi" class="form-label @error('bukti_transaksi') is-invalid @enderror">Bukti Transaksi DP</label>
        <input type="hidden" name="oldImage" value="{{ $pemesananjasa->bukti_transaksi }}">
        @if($pemesananjasa->bukti_transaksi)
        <img src="{{ asset('storage/' . $pemesananjasa->bukti_transaksi) }}" class="img-preview2 img-fluid mb-3 col-sm-5 d-block">
        <input class="form-control" type="file" id="bukti_transaksi" name="bukti_transaksi" onchange="previewImage()">
        @else
        <img class="img-preview2 img-fluid mb-3 col-sm-5">
        <input class="form-control" type="file" id="bukti_transaksi" name="bukti_transaksi" onchange="previewImage()">
        @endif

        @error('bukti_transaksi')
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
        const image = document.querySelector('#bukti_transaksi');
        const imgPreview = document.querySelector('.img-preview2');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>