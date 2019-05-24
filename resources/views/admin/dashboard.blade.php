@extends('admin.master-admin')

@section ('title', 'Dashboard')
    
@section('heading')
<div class="panel-header bg-primary-gradient">
    <div class="page-inner py-5">
        <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
            <div>
                <h2 class="text-white pb-2 fw-bold">Dashboard</h2>
                <h5 class="text-white op-7 mb-2">Selamat Datang di Dashboard Admin</h5>
            </div>	
        </div>
        
    </div>
</div>
@endsection

@section('content')
<canvas id="grafikBatang"></canvas> 

<div class="row mt-5">
    <div class="col-6">
            <div class="card bg-light mb-3" >
                    <div class="card-header"><b>Penjualan Pada Tahun 2019</b></div>
                    <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Bulan</th>
                                    <th scope="col">Jumlah Penjaulan</th>
                                    <th scope="col">Total Penjaulan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        @foreach ($dataChart as $data)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$data['bulan']}}</td>
                                            <td>{{$data['jumlah']}}</td>
                                            <td>Rp. {{$data['penjualan']}}</td>
                                        </tr>
                                        @endforeach
                                </tbody>
                            </table>
                    </div>
                </div>
        </div>
    <div class="col-6">
            <div class="card bg-light mb-3">
                <div class="card-header"><b>Penjualan Per Tahun 2019</b></div>
                <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tahun</th>
                                <th scope="col">Jumlah Penjaulan</th>
                                <th scope="col">Total Penjaulan</th>
                                </tr>
                            </thead>
                            <tbody>
                                    @foreach ($dataPertahun as $data)
                                    <tr>
                                        <td>{{$loop->iteration}}</td>
                                        <td>{{$data['tahun']}}</td>
                                        <td>{{$data['jumlah']}}</td>
                                        <td>Rp. {{$data['penjualan']}}</td>
                                    </tr>
                                    @endforeach  
                            </tbody>
                        </table>
                </div>
            </div>
        </div>
</div>

@endsection





