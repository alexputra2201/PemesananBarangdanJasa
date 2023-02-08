@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Projects</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Project</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="/dashboard/projects/create" class="btn btn-primary mb-3">Create new project</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama Project</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($projects as $project)
                    <tr>
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $project->nama_project }}</td>
                        <td> @if($project->image)
                            <img src="{{ asset('storage/' . $project->image) }}" alt="" class="img-fluid mt-3 justify-content-center align-content-center" style="max-height:200px; max-width:200px;">
                            @endif
                        </td>
                        <td>
                            <a href="/dashboard/projects/{{ $project->id}}" class="badge bg-info"> <img
                                    src="{{ asset('assets/eye.svg') }}" alt="eye"></a>
                            <a href="/dashboard/projects/{{ $project->id}}/edit" class="badge bg-warning"> <img
                                    src="{{ asset('assets/edit.svg') }}" alt="eye"></a>

                            <form action="/dashboard/projects/{{$project->id}}" method="post" class="d-inline">
                                @method('delete')
                                @csrf
                                <button class="badge bg-danger border-0"
                                    onclick="return confirm('Are you sure you want to delete this?')"><img
                                        src="{{ asset('assets/trash.svg') }}" alt="eye"></button>

                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>


    @endsection