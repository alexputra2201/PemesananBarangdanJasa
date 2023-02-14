@extends('dashboard.layouts.main')


@section('container')

<div class="container">
    <div class="row my-3">
        <div class="col-lg-8">
            <article>
                <h1 class="mb-3">{{ $product->nama_produk }}</h1>
                <a href="/dashboard/products" class="btn btn-success"><span data-feather="arrow-left"></span> Back to all
                    my products</a>
                <a href="/dashboard/products/{{ $product->id}}/edit" class="btn btn-warning"><span
                        data-feather="edit"></span> Edit</a>

                <form action="/dashboard/products/{{$product->id}}" method="post" class="d-inline">
                    @method('delete')
                    @csrf
                    <button class="btn btn-danger"
                        onclick="return confirm('Are you sure you want to delete this?')"><span
                            data-feather="x-circle"></span> Delete</button>

                </form>

                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Lengkap</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Bank</th>
                                    <th scope="col">Kredit</th>
                                    <th scope="col">Nomor Handphone</th>
                                    <th scope="col">Tanggal</th>
                                </tr>
                            </thead>
                            <tbody>
                               
                            </tbody>
                        </table>
                    </div>
                </div>

            </article>

        </div>
    </div>
</div>


@endsection