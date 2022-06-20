@extends('layout/main')

@section('title', 'NayaCake')

@section('container')

<!-- <div class="container">
    <div class="row">
        <div class="col-md-12 mb-5"><br><br><br>
            <img src="{{ url('images/nayacake.png') }}" class="rounded mx-auto d-block" width="400" alt="">
        </div>
    </div>
</div> -->

<div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="images/gambar4.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/gambar2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
            <img src="images/gambar3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>

<section>
<div class="container-fluid my-5">
        <h1 class="text-center fw-bold display-1 mb-5">Naya <span class="text-danger">Cake</span></h1>
        <div class="row">
            <div class="col-12 m-auto">
                <div class="owl-carousel owl-theme">
                    <div class="item mb-4">
                        <div class="card border-0 shadow">
                            <img src="images/gambar1.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="images/gambar3.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="images/gambar4.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="images/gambar2.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="images/gambar6.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel</h4>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="item">
                        <div class="card border-0 shadow">
                            <img src="images/gambar5.jpg" alt="" class="card-img-top">
                            <div class="card-body">
                                <div class="card-title text-center">
                                    <h4>Owl Carousel</h4>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection