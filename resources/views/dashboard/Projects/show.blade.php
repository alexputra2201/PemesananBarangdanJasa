@extends('dashboard.layouts.main')


@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <article>
                <h1 class="mb-3">{{ $project->nama_project }}</h1>

                <a href="/dashboard/projects" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all my projects</a>
                <a href="/dashboard/projects/{{ $project->id}}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>

                <form action="/dashboard/projects/{{$project->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this?')"><span data-feather="x-circle"></span> Delete</button>

                </form>

                @if($project->image)
                <div style="max-height: 350px; overflow:hidden;">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="" class="img-fluid mt-3">
                </div>

                @endif



            </article>
        </div>
    </div>
</div>

@endsection