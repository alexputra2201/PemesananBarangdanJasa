@extends('layouts.mainCareer')

@section('container')
    

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="section-title">
    <span>Karir Kami</span>
    <h2>Karir Kami</h2>
</div>


@if($careers->count())

<a href="/career/create" class="btn btn-primary">Kirim Karir</a>

@foreach ($careers as $career)
<div class="row d-flex pt-3">
    <div class="col">
        <div class="card">
            <h4 class="d-flex flex-row-start ms-3 mt-3"><a href="/career/{{ $career->id }}">{{ $career->posisi_career }}</a></h4>
            <div class="card-body">
                <div class="card-text">
                    <p>{{ $career->excerpt }}</p>

                </div>
            </div>
            <div class="d-flex flex-row-reverse mb-3 mx-3">
                <a href="/career/{{ $career->id }}">Baca Selengkapnya</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@else

<p class="text-center fs-4">Tidak ada karir yang ditemukan.</p>

@endif

@endsection