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
                    <li class="breadcrumb-item active" aria-current="page">{{ $barang->nama_barang }}</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-0">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <img src="{{ asset('storage/'.$barang->image )}}" class="rounded mx-auto d-block" alt="{{ $barang->image }}" id="image">
                        </div>
                        <div class="col-md-6 mt-4">
                            <h3>{{ $barang-> nama_barang }}</h3>
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td>Price</td>
                                        <td>:</td>
                                        <td>Rp. {{ number_format($barang->harga)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Stock</td>
                                        <td>:</td>
                                        <td>{{ number_format($barang->stok)}}</td>
                                    </tr>
                                    <tr>
                                        <td>Description</td>
                                        <td>:</td>
                                        <td>{{ ($barang->keterangan) }}</td>
                                    </tr>
                                    <tr>
                                        <td>Quantity</td>
                                        <td>:</td>
                                        <td>
                                            <form action="{{ url('pesan')}}/{{ $barang->id }}" method="post">
                                            @csrf
                                                <input type="text" name="jumlah_pesan" class="form-control" required="">
                                                <button type="submit" class="btn btn-primary mt-2"><i class="bi bi-cart3"></i> Add to Cart</button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection