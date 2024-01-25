@extends('layouts.main')
@section('container')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="blog-carousel" class="carousel slide overlay-bottom" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('img/carousel-1.png') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Selamat Datang di</h2>
                        <h1 class="display-1 text-white m-0">Kopilojik</h1>
                        <h2 class="text-white m-0">* SINCE 2020 *</h2>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('img/carousel-2.png') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <h2 class="text-primary font-weight-medium m-0">Jargon Kami</h2>
                        <h1 class="display-1 text-white m-0">Kopi | Burger | Shisha</h1>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#blog-carousel" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#blog-carousel" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </div>
    <!-- Carousel End -->

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h4>
                <h1 class="display-4">Serving Since 2020</h1>
            </div>
            <div class="row">
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Story</h1>
                    <p>Pada 24 Januari 2020, Kopilojik dibuka di Tebet, Jakarta, menghadirkan
                        harmoni kopi, burger, dan shisha. Pandemi COVID-19 membawa tantangan, memaksa Kopilojik fokus pada
                        layanan take away. Meskipun mengalami.....</p>
                    <a href="/about" class="btn btn-secondary font-weight-bold py-2 px-4 mt-2">Read More</a>
                </div>
                <div class="col-lg-4 py-5 py-lg-0" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100" src="{{ asset('img/about.png') }}"
                            style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-4 py-0 py-lg-5">
                    <h1 class="mb-3">Our Vision</h1>
                    <p class="text-justify">Visi Kopilojik melampaui sekadar cita rasa kopi, burger, dan shisha.
                        Setiap Jumat, kami berkomitmen untuk menjadi sumber berkah, merayakan kehidupan, dan berbagi
                        kebahagiaan dengan komunitas kami. Suara adzan Jumat mengubah...</p>
                    <a href="/about" class="btn btn-primary font-weight-bold py-2 px-4 mt-2">Read More</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Menu Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Harga & Menu</h4>
                <h1 class="display-4">Competitive Pricing</h1>
            </div>

            @php
                $limitedProducts = $products->take(6);
            @endphp

            <div class="row">
                @foreach ($limitedProducts as $product)
                    <div class="col-lg-6">
                        <div class="row align-items-center mb-5">
                            <div class="col-4 col-sm-3">
                                <img class="w-100 rounded-circle mb-3 mb-sm-0"
                                    src="{{ asset('product/' . $product->picture) }}" alt="{{ $product->name }}">
                                <h5 class="menu-price">@formatHarga($product->price)</h5>
                            </div>
                            <div class="col-8 col-sm-9">
                                <h4>{{ $product->name }}</h4>
                                <p class="m-0">{{ $product->description }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Menu End -->

    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Article</h4>
                <h1 class="display-4">Postingan Terbaru</h1>
            </div>
            <div class="row">
                @foreach ($blogs->take(4) as $item)
                    <div class="col-4 col-sm-3">
                        <div class="card shadow-sm p-3 mb-5 bg-white rounded equal-height-card">
                            <p class="small"><b>{{ $item->users->name }}</b> On Article</p>
                            <a href="/content/{{ $item->slug }}">
                                <h4 class="mb-3">{{ $item->title }}</h4>
                                <div class="d-flex align-items-center">
                                    <img class="rounded" style="width: 100%; max-height: 200px; object-fit: cover;"
                                        src="{{ asset('blogs/' . $item->image) }}" alt="">
                                </div>
                            </a>
                            <p class="mt-4 small"><i class="fa fa-calendar"></i>
                                {{ $item->created_at->formatLocalized('%e %B %Y') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
@endsection
