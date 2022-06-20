@extends('layout/main')

@section('title', 'History | NayaCake')

@section('container')


<div class="container">
    <div class="row">
        <!-- <div class="col-md-12 mt-5"><br>
            <a href="{{ url('produk')}}" class="btn btn-primary"><i class="bi bi-arrow-left-circle mt-1"></i> Kembali</a>
        </div> -->
        <div class="col-md-12 mt-5"><br>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('produk')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">History</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-0">
        <div class="card">
                <div class="card-body">
                    <h3><i class="bi bi-clock-history"></i> Order History</h3>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($pesanans as $pesanan)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $pesanan->tanggal }}</td>
                                <td>
                                    @if($pesanan->status == 1)
                                    Ordered & Not yet paid
                                    @else
                                    Already Paid 
                                    @endif
                                </td>
                                <td>Rp. {{ number_format($pesanan->jumlah_harga) }}</td>
                                <td>
                                    <a href="{{ url('history') }}/{{ $pesanan->id }}" class="btn btn-primary"><i class="bi bi-info-lg"></i> Detail</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection