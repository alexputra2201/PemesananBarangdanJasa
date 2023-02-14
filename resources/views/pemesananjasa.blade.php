@extends('layouts.mainCareer')

@section('container')

<div class="section-title mt-3">
    <span>Form Pemesanan</span>
    <h2>Form Pemesanan</h2>
</div>

<form action="/product" method="post" class="mb-5" enctype="multipart/form-data">
    @csrf
    
    <div class="mb-3">
        <label for="category" class="form-label">Jasa</label>
        <select class="form-select" name="jasa_id" id="jasa_id" onchange="Div()">
            @foreach ($jasas as $jasa)
            @if(old('jasa_id') == $jasa->id)
            <option value="{{ $jasa->id }}" selected>{{ $jasa->nama_jasa }}</option>
            @else
            <option value="{{ $jasa->id }}" >{{ $jasa->nama_jasa }}</option>
            @endif

            @endforeach
        </select>
    </div>
<div class="design" id="design">
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" 
        aria-describedby="email" name="email" required autofocus value="{{ old('email') }}">
        @error('email')
        <div class="invalid-feedback">
            {{ $message}}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="no_hp" class="form-label">Nomor Handphone</label>
        <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" 
        aria-describedby="no_hp" name="no_hp" required value="{{ old('no_hp') }}">
        @error('no_hp')
        <div class="invalid-feedback">
            {{ $message = 'Nomor Handphone must be Number' }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="image" class="form-label @error('image') is-invalid @enderror">Sketsa</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
        @error('image')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="body" class="form-label" value="{{old('body')}}">Deskripsi</label>
        @error('body')
        <p class="text-danger">{{$message}}</p>
        @enderror
        <input id="body" type="hidden" name="deskripsi">
        <trix-editor input="body"></trix-editor>
    </div>

    <div class="alert alert-danger col-5" role="alert">
    <i class="bi bi-exclamation-circle"></i>
    Wajib Melakukan Pembayaran DP Sebesar Rp.100.000 ke <br> 
    Rekening : 1080077177377 PT Rovina Jaya Sentosa Bank Mandiri. Terima Kasih
    </div>

    <div class="mb-3">
        <label for="bukti_transaksi" class="form-label @error('bukti_transaksi') is-invalid @enderror">Bukti Transaksi</label>
        <img class="img-preview2 img-fluid mb-3 col-sm-5">
        <input class="form-control" type="file" id="bukti_transaksi" name="bukti_transaksi" onchange="previewImage2()">
        @error('bukti_transaksi')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>
</div>


    
        <button type="submit" class="btn btn-primary">Apply</button>
</form>    

@endsection

<script type="application/javascript" language="JavaScript">

document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })


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

    function previewImage2(){
            const image = document.querySelector('#bukti_transaksi');
            const imgPreview = document.querySelector('.img-preview2');
            
            imgPreview.style.display = 'block';
    
            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);
    
            oFReader.onload= function(oFREvent){
                imgPreview.src = oFREvent.target.result;
            }
        }

    
</script>