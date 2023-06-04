@extends('dashboard.layouts.main')


@section('container')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Selamat Datang Kembali, {{ auth()->user()->username }}</h1>

    
</div>

{{-- row design --}}
<div class="row">

    <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Jasa Design dan Konstruksi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingdesign }}</div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Proses Jasa Design dan Konstruksi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $prosesdesign }}</div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Done Jasa Design dan Konstruksi</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $donedesign }}</div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>

{{-- row konstruksi --}}
<div class="row">
 <!-- Pending Requests Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Pending Penjualan Perumahan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $pendingperumahan }}</div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Proses Penjualan Perumahan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $prosesperumahan }}</div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Done Penjualan Perumahan</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $doneperumahan }}</div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
