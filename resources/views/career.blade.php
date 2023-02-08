@extends('layouts.mainCareer')

@section('container')
    

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<div class="section-title">
    <span>Our Career</span>
    <h2>Our Career</h2>
</div>
<a href="/career/create" class="btn btn-primary">Apply career</a>
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
                <a href="/career/{{ $career->id }}">Readmore</a>
            </div>
        </div>
    </div>
</div>
@endforeach

@endsection