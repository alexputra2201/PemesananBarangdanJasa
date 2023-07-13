@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Proyek</h1>
</div>

@if (session()->has('success'))
<div class="alert alert-success" role="alert">
    {{ session('success') }}
</div>
@endif

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Kursi</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <a href="/dashboard/kursi/create" class="btn btn-primary mb-3">Tambah Kursi</a>
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nomor Kursi</th>
                        <th scope="col">Perumahan</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kursis as $kursi)
                    <tr>
                        
                        <td>{{$loop->iteration}}</td>
                        <td>{{ $kursi->nomor }}</td>
                        <td>{{ $kursi->Product->nama_produk }}</td>
                        <td>
                            <a href="/dashboard/kursi/{{ $kursi->id}}" class="badge bg-info"> <img
                                    src="{{ asset('assets/eye.svg') }}" alt="eye"></a>
                            <a href="/dashboard/kursi/{{ $kursi->id}}/edit" class="badge bg-warning"> <img
                                    src="{{ asset('assets/edit.svg') }}" alt="eye"></a>
                        </td>
                    </tr>
                    @endforeach
                   
                </tbody>
                {{ $kursis->links() }}
            </table>
        </div>
    </div>


    @endsection