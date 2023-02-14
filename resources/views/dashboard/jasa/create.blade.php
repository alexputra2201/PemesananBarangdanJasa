@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create New Jasa</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/jasas" method="post" class="mb-5" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="nama_jasa" class="form-label">Nama Jasa</label>
            <input type="text" class="form-control @error('nama_jasa') is-invalid @enderror" id="nama_jasa" 
            aria-describedby="nama_jasa" name="nama_jasa" required autofocus value="{{ old('nama_jasa') }}">
            @error('nama_jasa')
            <div class="invalid-feedback">
                {{ $message = 'Nama Jasa field is required.' }}
            </div>
            @enderror
        </div>
        
       
        <div class="mb-3">
            <label for="image" class="form-label @error('image') is-invalid @enderror">Product Image</label>
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        
            <button type="submit" class="btn btn-primary">Create Product</button>
    </form>
</div>

@endsection


<script>
    function previewImage(){
            const image = document.querySelector('#image');
            const imgPreview = document.querySelector('.img-preview');
            
            imgPreview.style.display = 'block';
    
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
    
            oFReader.onload= function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }
    
    </script>