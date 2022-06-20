@extends('layout/main')

@section('title', 'Order | NayaCake')

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
                    <li class="breadcrumb-item"><a href="{{ url('history') }}">Order History</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Order Details</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-0">
        <div class="card">
                <div class="card-body">
                    <h3>CheckOut</h3>
                    <h5>Please make payment to the following account number : <br> <strong>Bank BRI : 32113-821312-123</strong> <br> Total : <strong>Rp. {{ number_format($pesanan->kode+$pesanan->jumlah_harga) }}</strong></h5>
                </div>
            </div>
            <div class="card mt-2">
                <div class="card-body">
                    <h3><i class="bi bi-cart3"></i></i> Order Details</h3>
                    @if(!empty($pesanan))
                    <p id="date">Date : {{ $pesanan->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Product</th>
                                <th>Order</th>
                                <th>Quantity</th>
                                <th>Price</th>
                                <th>Total</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1; ?>
                            @foreach($pesanan_details as $pesanan_detail)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ url('images') }}/{{ $pesanan_detail->barang->gambar }}" width="100" alt="...">
                                </td>
                                <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                <td>{{ $pesanan_detail->jumlah }} </td>
                                <td>Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="5" class="text-center" id="total"><strong>Grandtotal :</strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                            </tr>
                        </tbody>
                    </table>
                    @endif
                </div>
            </div>
        </div> 
    </div>
</div>
@endsection