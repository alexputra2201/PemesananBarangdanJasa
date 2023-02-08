@extends('dashboard.layouts.main')

@section('container')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Create new Career</h1>
</div>

<div class="col-lg-8">
    <form action="/dashboard/careers" method="post">
        @csrf

        <div class="mb-3">
            <label for="posisi_career" class="form-label">Posisi Career</label>
            <input type="text" class="form-control @error('posisi_career') is-invalid @enderror" id="posisi" 
            aria-describedby="posisi" name="posisi_career" required autofocus value="{{ old('posisi_career') }}">
            @error('posisi_career')
            <div class="invalid-feedback">
                {{ $message = 'Posisi career field is required.' }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="work_type" class="form-label">Work Type</label>
            <input type="text" class="form-control @error('work_type') is-invalid @enderror" id="work_type" 
            aria-describedby="work_type" name="work_type" required value="{{ old('work_type') }}">
            @error('work_type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="body" class="form-label" value="{{old('body')}}">Body</label>
            @error('body')
            <p class="text-danger">{{$message}}</p>
            @enderror
            <input id="body" type="hidden" name="description_career">
            <trix-editor input="body"></trix-editor>
        </div>
        
        
            <button type="submit" class="btn btn-primary">Create Career</button>
    </form>
</div>

@endsection


<script>
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })

</script>