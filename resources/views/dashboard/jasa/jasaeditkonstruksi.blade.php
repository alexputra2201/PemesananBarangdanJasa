@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Jasa</h1>
</div>


<div class="col-lg-8">
    <form method="post" action="/dashboard/jasakonstruksi/{{$pemesananjasa->id}}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf

        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" name="nama_lengkap" disabled required value="{{ old('nama_lengkap',$pemesananjasa->nama_lengkap) }}">
            @error('nama_lengkap')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="image" class="form-label @error('image') is-invalid @enderror">Pelanggan Image</label>
            <img src="{{ asset('storage/' . $pemesananjasa->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">

        </div>

        <div class="mb-3">
            <label for="penawaran" class="form-label @error('penawaran') is-invalid @enderror">Penawaran</label>
            <input type="hidden" name="oldImage" value="{{ $pemesananjasa->penawaran }}">
            @if($pemesananjasa->penawaran)
            <img src="{{ asset('storage/' . $pemesananjasa->penawaran) }}" class="img-preview2 img-fluid mb-3 col-sm-5 d-block">
            <input class="form-control" type="file" id="penawaran" name="penawaran" onchange="previewImage()">
            @else
            <img class="img-preview2 img-fluid mb-3 col-sm-5">
            <input class="form-control" type="file" id="penawaran" name="penawaran" onchange="previewImage()">
            @endif

            @error('penawaran')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="total_harga" class="form-label">Total Harga</label>
            <input type="text" class="form-control @error('total_harga') is-invalid @enderror" id="total_harga" name="total_harga" required 
            value="{{old('total_harga', $pemesananjasa->total_harga)}}">
            @error('total_harga')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status">
                <option value="Done">Done</option>
                <option value="Proses">Proses</option>
                <option value="Pending" selected>Pending</option>

            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Pemesanan</button>
    </form>

</div>


<script>
    
    function previewImage() {
        const image = document.querySelector('#penawaran');
        const imgPreview = document.querySelector('.img-preview2');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection