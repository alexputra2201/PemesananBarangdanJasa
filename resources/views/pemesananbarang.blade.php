@extends('layouts.mainCareer')

@section('container')

<div class="section-title mt-3">
    <span>Form Pemesanan</span>
    <h2>Form Pemesanan</h2>
</div>

<form action="/pemesananbarang" method="post" class="mb-5" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" 
        aria-describedby="nama_lengkap" name="nama_lengkap"  autofocus value="{{ old('nama_lengkap') }}">
        @error('nama_lengkap')
        <div class="invalid-feedback">
            {{ $message}}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" 
        aria-describedby="email" name="email"  value="{{ old('email') }}">
        @error('email')
        <div class="invalid-feedback">
            {{ $message}}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="no_hp" class="form-label">Nomor Handphone</label>
        <input type="number" class="form-control @error('no_hp') is-invalid @enderror" id="no_hp" 
        aria-describedby="no_hp" name="no_hp"  value="{{ old('no_hp') }}">
        @error('no_hp')
        <div class="invalid-feedback">
            {{ $message = 'Nomor Handphone must be Number' }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="kredit" class="form-label">Kredit</label><br>
        <input type="radio" id="yes" name="kredit" value="yes" > 
        <label for="kredit">yes</label> &nbsp&nbsp
        <input type="radio" id="no" name="kredit" value="no" checked />
        <label for="kredit">no</label><br>
    </div>

    <div class="mb-3">
       <div id="kartu" style="display:none">
        <select class="form-select" name="kartu">
            <option value="bank_riau" selected>Bank Riau</option>
            <option value="BRI" >BRI</option>
            <option value="Mandiri" >Mandiri</option>
            <option value="Nagari" >Nagari</option>
            <option value="Syariah" >Syariah</option>
        </select>
       </div>
    </div>
    
    {{-- <div>
        <input type="radio" id="hide" name="example" value="hide" checked />
        <label for="hide">Hide</label>
      </div>

    <div>
        <input type="radio" id="show" name="example" value="show" />
        <label for="show">Show</label>
      </div>
  
      <div id="box">Box is now shown</div> --}}
    
    <button type="submit" class="btn btn-primary">Apply</button>
</form>    

@endsection


