@extends('layout/main')

@section('title', 'Profile | NayaCake')

@section('container')

<div class="container">
    <div class="row">
    <div class="col-md-12 mt-5"><br>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('produk')}}">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Profile</li>
                </ol>
            </nav>
        </div>
        <div class="col-md-12 mt-1">
            <div class="card">
                <div class="card-body">
                    <h4><i class="bi bi-person-circle"></i> Profile</h4>
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Name</td>
                                <td width="10"> : </td>
                                <td>{{ $user->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td> : </td>
                                <td>{{ $user->email }}</td>
                            </tr>
                            <tr>
                                <td>Phone</td>
                                <td> : </td>
                                <td>{{ $user->nohp }}</td>
                            </tr>
                            <tr>
                                <td>Address</td>
                                <td> : </td>
                                <td>{{ $user->alamat }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-12 mt-2">
            <div class="card">
                <div class="card-body">
                    <h4><i class="bi bi-pencil-fill"></i> Edit Profile</h4>
                    <div class="col-md-6">
                    <form method="post" action="{{ url('profile') }}">
            @csrf
        
            <div class="mb-2">
            <label for="name" class="form-label">Name</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="" name="name"
             value="{{ $user->name }}">
            @error('name')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>

            <div class="mb-2">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="" name="email"
             value="{{ $user->email }}">
            @error('email')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>

            <div class="mb-2">
            <label for="password" class="form-label">Password</label>
            <input type="text" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="" name="password"
             value="{{old('password') }}">
            @error('password')
            <div id="validationServerpasswordFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>


            <div class="mb-2">
            <label for="alamat" class="form-label">Address</label>
            <textarea type="text" class="form-control @error('alamat') is-invalid @enderror" id="alamat" placeholder="" name="alamat" required=""
             value="{{ $user->alamat }}"></textarea>
            @error('alamat')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>
            
            <div class="mb-1">
            <label for="nohp" class="form-label">Phone</label>
            <input type="text" class="form-control @error('nohp') is-invalid @enderror" id="nohp" placeholder="" name="nohp" required=""
             value="{{old('nohp') }}">
            @error('nohp')
            <div id="validationServerUsernameFeedback" class="invalid-feedback">{{$message }}</div>
            @enderror
            </div>

            <div class="col-md-2">
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Save</button>
            </div>
            
        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection