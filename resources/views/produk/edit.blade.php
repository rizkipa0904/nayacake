@extends('layout/main')

@section('title', 'Edit Produk')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-8"><br><br>
            <h1 class="mt-4">Form Ubah Data Produk</h1>

        <form method="post" action="/produk/{{ $barang->id }}" enctype="multipart/form-data">
            @method('patch')
            @csrf
        
            <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" placeholder="Masukkan Produk" name="nama_barang"
             value="{{$barang->nama_barang }}">
            @error('nama_barang')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>

            <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukkan Harga" name="harga"
            value="{{$barang->harga }}">
            @error('harga')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>

            <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Masukkan Stok" name="stok"
            value="{{$barang->stok }}">
            @error('stok')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>

            <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Masukkan Keterangan" name="keterangan"
            value="{{$barang->keterangan }}">
            @error('keterangan')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>
            

            <!-- <div class="mb-3">
            <label for="image" class="form-label">Masukkan Gambar</label>
            <input class="form-control @error('image') is-invalid @enderror" type="file" id="image" name="image">
            @error('image')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div> -->

            <button class="btn btn-primary" type="submit">Ubah Data</button>
        </form>
        </div>
    </div>
</div>
@endsection