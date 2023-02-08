@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit project</h1>
</div>


<div class="col-lg-8">
    <form method="post" action="/dashboard/projects/{{$project->id}}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama_project" class="form-label">Nama project</label>
            <input type="text" class="form-control @error('nama_project') is-invalid @enderror" id="nama_project" name="nama_project" required autofocus value="{{old('nama_project', $project->nama_project)}}">
            @error('nama_project')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label @error('image') is-invalid @enderror">Project Image</label>
            <input type="hidden" name="oldImage" value="{{ $project->image }}">
            @if($project->image)
            <img src="{{ asset('storage/' . $project->image) }}" class="img-preview img-fluid mb-3 col-sm-5 d-block">
            <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
            @else
            <img class="img-preview img-fluid mb-3 col-sm-5">
            <input class="form-control" type="file" id="image" name="image" onchange="previewImage()">
            @endif

            @error('image')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Update project</button>
    </form>

</div>


<script>
   function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }
</script>

@endsection