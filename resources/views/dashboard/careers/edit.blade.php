@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Career</h1>
</div>


<div class="col-lg-8">
    <form method="post" action="/dashboard/careers/{{$career->id}}" class="mb-5" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="posisi_career" class="form-label">Posisi Career</label>
            <input type="text" class="form-control @error('posisi_career') is-invalid @enderror" id="posisi_career" name="posisi_career" required autofocus value="{{old('posisi_career', $career->posisi_career)}}">
            @error('posisi_career')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="work_type" class="form-label @error('work_type') is-invalwork_type @enderror">Work Type</label>
            <input type="text" class="form-control" id="work_type" name="work_type" required value="{{old('work_type', $career->work_type)}}">
            @error('work_type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    
        <div class="mb-3">
            <label for="body" class="form-label">Body</label>
            @error('body')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <input id="body" type="hidden" name="description_career" value="{{old('body', $career->description_career)}}">
            <trix-editor input="body"></trix-editor>
        </div>

        <button type="submit" class="btn btn-primary">Update career</button>
    </form>

</div>


<script>
    document.addEventListener('trix-file-accept', function(e) {
        e.preventDefault();
    })
</script>

@endsection