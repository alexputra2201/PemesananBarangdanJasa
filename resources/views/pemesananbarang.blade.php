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
        <select class="form-select" name="product_id">
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
        </div>
    </div>

    <div class="mb-3">
        <div id="mandiri" style="display: none">
            <a href="https://drive.google.com/drive/folders/1OKz_QKid3ZmKPE-wePADtpMfZW5T2g1W?usp=share_link">Form
                Mandiri</a> <br>
            <label for="formAplikasiKPR" class="form-label @error('formAplikasiKPR') is-invalid @enderror">Form Aplikasi KPR</label>
            <input class="form-control" type="file" id="formAplikasiKPR" name="formAplikasiKPR">
            @error('formAplikasiKPR')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror

            <br>
            <label for="lampiranFLPP" class="form-label @error('lampiranFLPP') is-invalid @enderror">Lampiran FLPP</label>
            <input class="form-control" type="file" id="lampiranFLPP" name="lampiranFLPP">
            @error('lampiranFLPP')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror


            <br>
            <label for="suratPernyataanKPR" class="form-label @error('suratPernyataanKPR') is-invalid @enderror">Format Surat Pernyataan Pemohon KPR Bersubsidi</label>
            <input class="form-control" type="file" id="suratPernyataanKPR" name="suratPernyataanKPR">
            @error('suratPernyataanKPR')
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
            <label for="formBtnSyariah" class="form-label @error('btnSyariah') is-invalid @enderror">BTN Syariah</label>
            <input class="form-control" type="file" id="btnSyariah" name="btnSyariah">
            @error('btnSyariah')
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