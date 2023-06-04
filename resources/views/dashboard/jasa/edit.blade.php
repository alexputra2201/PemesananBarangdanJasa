@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Jasa</h1>
</div>


<div class="col-lg-8">
    <form method="post" action="/dashboard/jasas/{{$jasa->id}}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama_jasa" class="form-label">Nama Jasa</label>
            <input type="text" class="form-control @error('nama_jasa') is-invalid @enderror" id="nama_jasa" name="nama_jasa" required autofocus value="{{old('nama_jasa', $jasa->nama_jasa)}}">
            @error('nama_jasa')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
      
        <div class="mb-3">
            <label for="image" class="form-label @error('image') is-invalid @enderror">Jasa Image</label>
            <input type="hidden" name="oldImage" value="{{ $jasa->image }}">
            @if($jasa->image)
            <img src="{{ asset('storage/' . $jasa->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
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
            <label for="body" class="form-label">Body</label>
            @error('body')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <input id="body" type="hidden" name="deskripsi" value="{{old('body', $jasa->deskripsi)}}">
            <trix-editor input="body"></trix-editor>
        </div>
    

        <button type="submit" class="btn btn-primary">Update Jasa</button>
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

    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>

@endsection