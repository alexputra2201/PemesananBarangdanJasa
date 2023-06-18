@extends('layouts.mainCareer')

@section('container')

<div class="section-title mt-3">
    <span>Form Pemesanan</span>
    <h2>Form Pemesanan</h2>
</div>

<form action="/pemesananbarang" method="post" class="mb-5" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="category" class="form-label">Perumahan</label>
        <select class="form-select" name="product_id" id="product_id" onchange="Div2()">
            @foreach ($products as $product)
            @if(old('product_id') == $product->id)
            <option value="{{ $product->id }}" selected>{{ $product->nama_produk }}</option>
            @else
            <option value="{{ $product->id }}">{{ $product->nama_produk }}</option>
            @endif

            @endforeach
        </select>
    </div>


    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
            aria-describedby="email" name="email" value="{{ old('email') }}">
        @error('email')
        <div class="invalid-feedback">
            {{ $message}}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="no_hp" class="form-label">Nomor Handphone</label>
        <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp"
            aria-describedby="no_hp" name="no_hp" value="{{ old('no_hp') }}">
        @error('no_hp')
        <div class="invalid-feedback">
            {{ $message = 'Nomor Handphone must be Number' }}
        </div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="Site Plan" class="form-label">Site Plan</label><br>
        @foreach ($products as $product) 
        @if($product->id == 1)
        <img src="{{ asset('storage/' . $product->site_plan) }}" alt="" class="img-fluid mt-3 justify-content-center align-content-center" style="max-height:400px; max-width:400px;">
        @endif

        @endforeach
    </div>

    {{-- yang mau ditambahkan --}}

    <div class="mb-3">
        <label for="booking" class="form-label">Booking</label>
        <input type="text" class="form-control @error('booking') is-invalid @enderror" id="booking"
            aria-describedby="booking" name="booking" value="{{ old('booking') }}">
        @error('booking')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="alert alert-danger col-5" role="alert">
        <i class="bi bi-exclamation-circle"></i>
        Wajib Melakukan Booking Fee Sebesar Rp.500.000 ke <br>
        Rekening : 1080077177377 PT Rovina Jaya Sentosa Bank Mandiri. Terima Kasih
    </div>

    <div class="mb-3">
        <label for="booking_fee" class="form-label @error('image') is-invalid @enderror">Booking Fee</label>
        <img class="img-preview img-fluid mb-3 col-sm-5">
        <input class="form-control" type="file" id="image" name="booking_fee"
            onchange="previewImage()">
        @error('image')
        <div class="invalid-feedback">
            {{ $message = 'Bukti Transaksi field is required'}}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <div id="syaratpengambilanrumah">
            <label for="syaratpengambilanrumah" class="form-label @error('syaratpengambilanrumah') is-invalid @enderror">Syarat Pengambilan Rumah</label>
            <a href="" class="bi bi-exclamation-circle" data-bs-toggle="modal" data-bs-target="#deskripsi"></a>

            <div class="modal fade" id="deskripsi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Syarat Pengambilan Rumah</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                           Lampirkan PDF berupa KTP dan KK.
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>



            <input class="form-control" type="file" id="syaratpengambilanrumah" name="syaratpengambilanrumah">
            @error('syaratpengambilanrumah')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

    {{-- selesai ditambahkan --}}

    <div class="mb-3">
        <label for="kredit" class="form-label">Kredit</label><br>
        <input type="radio" id="yes" name="kredit" value="yes">
        <label for="kredit">yes</label> &nbsp&nbsp
        <input type="radio" id="no" name="kredit" value="no" checked />
        <label for="kredit">no</label><br>
    </div>


    <div class="mb-3">
        <div id="kartu" style="display:none">
            <select id="bank" name="bank" class="form-select" onchange="showDiv(this)">
                <option value="mandiri" selected>Bank Mandiri</option>
                <option value="btnSyariah">BTN Syariah</option>
            </select>
            
            <br>
            <a href="https://drive.google.com/drive/folders/1bUKOBFOjUg1YvVq2_BF5awqkY8CH-Nv_?usp=sharing">Download
                Syarat KPR</a> <br>
            <label for="" class="form-label @error('syaratkpr') is-invalid @enderror">Syarat KPR</label>
            <input class="form-control" type="file" id="syaratkpr" name="syaratkpr">
            @error('syaratkpr')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>

   

    <div class="mb-3">
        <div id="mandiri" style="display: none">
            <a href="https://drive.google.com/drive/folders/1OKz_QKid3ZmKPE-wePADtpMfZW5T2g1W?usp=share_link">Download
                Form
                Mandiri</a> <br>
            <label for="formaplikasikprmandiri" class="form-label @error('formaplikasikprmandiri') is-invalid @enderror">Form Aplikasi KPR</label>
            <input class="form-control" type="file" id="formaplikasikprmandiri" name="formaplikasikprmandiri">
            @error('formaplikasikprmandiri')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
            

        </div>
    </div>

    <div class="mb-3">
        <div id="btnSyariah" style="display: none">
            <a href="https://drive.google.com/drive/folders/1w07shpeBrVbO3VoW3lQwWYoWa0WyVeSW?usp=share_link">Download
                Form
                BTN Syariah</a> <br>
            <label for="formaplikasikprbtn" class="form-label @error('formaplikasikprbtn') is-invalid @enderror">Form Aplikasi KPR</label>
            <input class="form-control" type="file" id="formaplikasikprbtn" name="formaplikasikprbtn">
            @error('formaplikasikprbtn')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

        </div>

        
    </div>

    <div class="mb-3" style="display: none">

    </div>





    <button type="submit" class="btn btn-primary">Kirim</button>
</form>

@endsection


<script>

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