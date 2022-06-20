@extends('layout/main')

@section('title', 'Product | NayaCake')

@section('container')

<div class="container">
    <div class="row"> 
    <div class="col-md-12 mb-1"><br><br><br>
            <img src="{{ url('images/nayacake.png') }}" class="rounded mx-auto d-block" width="400" alt="">
        </div>    

        <div class="row">
            <div class="col-md-5">
                    @if(auth()->user()->level == 'admin')
                    <a href="/produk/create" class="btn btn-primary my-3">Add Product</a>
                    @endif
            </div>
        </div>

        @if (session('status'))
            <div class="alert alert-success"> 
                    {{ session('status') }}
            </div>
        @endif
            
        @foreach($barangs as $barang)
        <div class="col-md-3 mt-1 mb-5">
            <div class="card">
                    <img src="{{ asset('storage/'.$barang->image )}}" class="card-img-top" alt="{{ $barang->image }}">
                    <div class="card-body">
                    <h5 class="card-title mb-3">{{ $barang-> nama_barang }}</h5>
                    <p class="card-text">
                        {{ $barang->keterangan }}</p> <br><br>
                    <p class="card-text"><strong>Price :</strong> Rp. {{ number_format($barang->harga) }}</p>
                    <p class="card-text"><strong>Stock : </strong> {{ $barang->stok }}</p>

                    <div class="text-center">
                    <a href="{{ url('pesan') }}/{{ $barang->id }} " class="btn btn-primary"><i class="bi bi-cart3"></i> Add</a>
                    <a href="/produk/{{ $barang->id }}/edit" class="btn btn-warning"><i class="bi bi-pencil"></i></i> Edit</a>

                    <form action="/produk/{{ $barang->id }}" method="post" class="d-inline" onsubmit="return confirm('Yakin Hapus Data?')">
                        @method('delete') 
                        @csrf
                        <button class="btn btn-danger" type="submit"><i class="bi bi-x-circle"></i> Delete</button>
                    </form>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection