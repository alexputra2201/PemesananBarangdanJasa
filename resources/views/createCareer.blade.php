@extends('layouts.mainCareer')

@section('container')

<div class="section-title mt-3">
    <span>Form Karir</span>
    <h2>Form Karir</h2>
</div>

<form action="/career" method="post" class="mb-5" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="nama" class="form-label">Nama Lengkap</label>
        <input type="text" class="form-control @error('nama_lengkap') is-invalid @enderror" id="nama_lengkap" 
        aria-describedby="nama_lengkap" name="nama_lengkap" required autofocus value="{{ old('nama_lengkap') }}">
        @error('nama_lengkap')
        <div class="invalid-feedback">
            {{ $message}}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="category" class="form-label">Karir</label>
        <select class="form-select" name="career_id">
            @foreach ($careers as $career)
            @if(old('career_id') == $career->id)
            <option value="{{ $career->id }}" selected>{{ $career->posisi_career }}</option>
            @else
            <option value="{{ $career->id }}">{{ $career->posisi_career }}</option>
            @endif

            @endforeach
        </select>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" 
        aria-describedby="email" name="email" required value="{{ old('email') }}">
        @error('email')
        <div class="invalid-feedback">
            {{ $message}}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="CV" class="form-label @error('cv') is-invalid @enderror">CV</label>
        <input class="form-control" type="file" id="cv" name="cv">
        @error('cv')
        <div class="invalid-feedback">
            {{ $message }}
        </div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="berkas_lain" class="form-label @error('berkas_lain') is-invalid @enderror">Berkas Pendukung Lainnya</label>
        <input class="form-control" type="file" id="berkas_lain" name="berkas_lain">
        @error('berkas_lain')
        <div class="invalid-feedback">
            {{ $message }}
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
        <button type="submit" class="btn btn-primary">Kirim</button>
</form>
@endsection