@extends('layouts.mainCareer')

@section('container')

<div class="section-title mt-3">
    <span>Form Pemesanan</span>
    <h2>Form Pemesanan</h2>
</div>
<form action="/pemesananjasakonstruksi" method="post" class="mb-5" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="category" class="form-label">Jasa</label>
        <select class="form-select" name="jasa_id" id="jasa_id" onchange="Div()">
            @foreach ($jasas as $jasa)
            @if(old('jasa_id') == $jasa->id)
            <option value="{{ $jasa->id }}">{{ $jasa->nama_jasa }}</option>
            @else
            <option value="{{ $jasa->id }}" selected>{{ $jasa->nama_jasa }}</option>
            @endif

            @endforeach
        </select>
    </div>

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

    <div class="konstruksi" id="konstruksi">
        <div class="mb-3" id="imagekonstruksi">
            <label for="image" class="form-label @error('image') is-invalid @enderror">Gambar</label>
            <a href="" class="bi bi-exclamation-circle" data-bs-toggle="modal" data-bs-target="#image-gambar"></a>

            <div class="modal fade" id="image-gambar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deskripsi Gambar</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            Gambar ini merupakan desain dari customer yang ingin dibuat atau direnovasi.
                            <br> adapun bentuk fisik jasa konstruksi:
                            <li> Rumah </li>
                            <li> Gedung </li>
                            <li> Jalan </li>
                            <li> Taman </li>
                            <li> Perabotan Rumah </li>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
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

            <a href="" class="bi bi-exclamation-circle" data-bs-toggle="modal" data-bs-target="#deskripsi"></a>

            <div class="modal fade" id="deskripsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Deskripsi</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           Deskripsi ini memaparkan atau menguraikan pesanan dari customer ke developer PT Rovina Jaya Sentosa
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            @error('deskripsi')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <input id="body" type="hidden" name="deskripsi">
            <trix-editor input="body"></trix-editor>
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

    </div>
    <button type="submit" class="btn btn-primary">Kirim</button>
</form>
@endsection

<script type="application/javascript" language="JavaScript">
    document.addEventListener('trix-file-accept', function (e) {
        e.preventDefault();
    })


    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function (oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>