@extends('layout/main')

@section('title', 'Tambah Produk')

@section('container')

<div class="container">
    <div class="row">
        <div class="col-8"><br><br>
            <h1 class="mt-3">Form Tambah Produk</h1>

        <form method="post" action="/produk" enctype="multipart/form-data">
            @csrf
        
            <div class="mb-3">
            <label for="nama_barang" class="form-label">Nama Produk</label>
            <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" id="nama_barang" placeholder="Masukkan Produk" name="nama_barang"
             value="{{old('nama_barang') }}">
            @error('nama_barang')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>

            <div class="mb-3">
            <label for="harga" class="form-label">Harga</label>
            <input type="text" class="form-control @error('harga') is-invalid @enderror" id="harga" placeholder="Masukkan Harga" name="harga"
             value="{{old('harga') }}">
            @error('harga')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>

            <div class="mb-3">
            <label for="stok" class="form-label">Stok</label>
            <input type="text" class="form-control @error('stok') is-invalid @enderror" id="stok" placeholder="Masukkan Stok" name="stok"
             value="{{old('stok') }}">
            @error('stok')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div> 

            
            <div class="mb-3">
                <label for="image" class="form-label">Masukkan Gambar</label>
                <input class="form-control @error('image') is-invalid @enderror" type="file" name="image">
                @error('image')
                <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
                @enderror
            </div>
            
            <div class="mb-3">
            <label for="keterangan" class="form-label">Keterangan</label>
            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" id="keterangan" placeholder="Masukkan Keterangan" name="keterangan"
             value="{{old('keterangan') }}">
            @error('keterangan')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>

            <button class="btn btn-primary mt-3" type="submit">Tambah Data</button>
        </form>
        </div>
    </div>
</div>
@endsection