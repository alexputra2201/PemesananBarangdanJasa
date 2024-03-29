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
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($response_careers as $response_career)
                <tr>
                    <td>{{$loop->iteration}}</td>
                    <td>{{ $response_career->nama_lengkap }}</td>
                    <td>{{ $response_career->email }}</td>
                    @if ($response_career->cv == null)
                    <td>-</td>
                    @else
                    <td><a href="{{ asset('storage/' . $response_career->cv) }}">Click to Download</a></td>
                    @endif

                    @if($response_career->berkas_lain == null)
                    <td>-</td>
                    @else
                    <td><a href="{{ asset('storage/' . $response_career->berkas_lain) }}">Click to Download</a></td>
                    @endif

                    <td>{{ $response_career->no_hp }}</td>
                    <td>    <a aria-label="Chat on WhatsApp" href="https://wa.me/+62{{ $response_career->no_hp }}?text=I'm%20interested%20in%20your%20CV"> <img alt="Chat on WhatsApp" src="{{ asset('assets/WhatsAppButtonGreenSmall.png') }}" style="width: 150px; height: 25px;"/> </a></td>
                    
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection