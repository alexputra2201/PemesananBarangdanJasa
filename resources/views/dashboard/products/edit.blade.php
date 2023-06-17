@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Product</h1>
</div>


<div class="col-lg-8">
    <form method="post" action="/dashboard/products/{{$product->id}}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama_produk" class="form-label">Nama Product</label>
            <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" required autofocus value="{{old('nama_produk', $product->nama_produk)}}">
            @error('nama_produk')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
      
        <div class="mb-3">
            <label for="image" class="form-label @error('image') is-invalid @enderror">Product Image</label>
            <input type="hidden" name="oldImage" value="{{ $product->image }}">
            @if($product->image)
            <img src="{{ asset('storage/' . $product->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
            @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
            @endif

            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="site_plan" class="form-label @error('image2') is-invalid @enderror">Site Plan</label>
            <input type="hidden" name="oldImage" value="{{ $product->site_plan }}">
            @if($product->site_plan)
            <img src="{{ asset('storage/' . $product->site_plan) }}" class="img-preview2 img-fluid mb-3 col-sm-5 d-block">
            <input class="form-control" type="file" id="image2" name="site_plan" onchange="previewImage2()">
            @else
            <img class="img-preview2 img-fluid mb-3 col-sm-5">
            <input class="form-control" type="file" id="image2" name="site_plan" onchange="previewImage2()">
            @endif

            @error('image2')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <input id="body" type="hidden" name="deskripsi" value="{{old('body', $product->deskripsi)}}">
            <trix-editor input="body"></trix-editor>
        </div>
    

        <button type="submit" class="btn btn-primary">Update Product</button>
    </form>

</div>


<script>
    
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    function previewImage2() {
        const image = document.querySelector('#image2');
        const imgPreview = document.querySelector('.img-preview2');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>

@endsection