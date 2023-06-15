@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Edit Product</h1>
</div>


<div class="col-lg-8">
    <form method="post" action="/pemesananbarang/{{$pemesananbarang->id}}">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" required value="{{old('nama_lengkap', $pemesananbarang->nama_lengkap)}}" disabled>
            @error('nama_lengkap')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal</label>
            <input id="datepicker"  width="276" name="tanggal" required/>
        </div>
      
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select" name="status">
                <option value="Done">Done</option>
                <option value="Proses">Proses</option>
                <option value="Pending" selected>Pending</option>

            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Data</button>
    </form>

</div>

<script>
    $('#datepicker').datepicker({
        uiLibrary: 'bootstrap5',
    });
    
</script>

@endsection