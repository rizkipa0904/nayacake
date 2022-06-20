@extends('layout/main')

@section('title', 'CheckOut | NayaCake')

@section('container')


<div class="container">
    <div class="row">
        <div class="col-md-12 mt-5"><br>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('produk')}}">Product</a></li>
                    <li class="breadcrumb-item active" aria-current="page">CheckOut</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h3><i class="bi bi-cart4"></i> CheckOut</h3>
                    @if(!empty($pesanan))
                    <p id="date">Date : {{ $pesanan->tanggal }}</p>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Product</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Price</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pesanan_details as $pesanan_detail)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $pesanan_detail->barang->nama_barang }}</td>
                                <td>{{ $pesanan_detail->jumlah }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->barang->harga) }}</td>
                                <td>Rp. {{ number_format($pesanan_detail->jumlah_harga) }}</td>
                                <td>
                                <form action="{{ url('check-out') }}/{{ $pesanan_detail->id }}" method="post" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                        @method('delete') 
                                        @csrf
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash"></i></button>
                                </form>
                                </td>
                            </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-center"><strong>Grandtotal </strong></td>
                                <td><strong>Rp. {{ number_format($pesanan->jumlah_harga) }}</strong></td>
                                <td>
                                    <a href="{{ url('konfirmasi-check-out') }}" class="btn btn-success" onclick="return confirm('Are you sure?')">
                                    <i class="bi bi-cart-check"></i> CheckOut </a>
                                </td>
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