@extends('dashboard.layouts.main')


@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <article>
                <h1 class="mb-3">{{ $career->posisi_career }}</h1>
                <h3 class="mb-3">{{ $career->work_type }} </h3>
                <a href="/dashboard/careers" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all
                    my careers</a>
                <a href="/dashboard/careers/{{ $career->id}}/edit" class="btn btn-warning"><span
                        data-feather="edit"></span> Edit</a>

                <form action="/dashboard/careers/{{$career->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this?')"><span
                            data-feather="x-circle"></span> Delete</button>

                </form>

                <article class="my-3 fs-6">
                    {!! $career->description_career !!}
                </article>

            </article>

        </div>
    </div>
</div>

<div class="card-body">
    <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nama Lengkap</th>
                    <th scope="col">Email</th>
                    <th scope="col">CV</th>
                    <th scope="col">Berkas Lain</th>
                    <th scope="col">Nomor Handphone</th>
                </tr>
            </thead>
            <tbody>
                @foreach($response_careers as $response_career)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $response_career->nama_lengkap }}</td>
                    <td>{{ $response_career->email }}</td>
                    <td><a href="{{ asset('storage/' . $response_career->cv) }}">Click to Download</a></td>
                    <td>{{ $response_career->berkas_lain }}</td>
                    <td>{{ $response_career->no_hp }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection