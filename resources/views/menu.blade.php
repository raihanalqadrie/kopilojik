@extends('layouts.main')
@section('container')
    @include('partials.header')
    <!-- Menu Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">Harga & Menu</h4>
                <h1 class="display-4">Competitive Pricing</h1>
            </div>

            @php
                $productsByCategory = $products->groupBy('categorys_id');
            @endphp

            @foreach ($productsByCategory as $categoryId => $categoryProducts)
                @php
                    $category = $categoryProducts->first()->categorys;
                    $catalogsByCategory = $categoryProducts->groupBy('catalogs_id');
                @endphp

                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="mb-5">{{ $category->name }}</h1>
                    </div>
                </div>

                @foreach ($catalogsByCategory as $catalogId => $catalogProducts)
                    @php
                        $catalog = $catalogProducts->first()->catalogs;
                    @endphp

                    <div class="row">
                        <div class="col-lg-12">
                            <h4 class="mb-4">{{ $catalog->name }}</h4>
                        </div>
                    </div>

                    <div class="row">
                        @foreach ($catalogProducts as $product)
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
                @endforeach
            @endforeach
        </div>
    </div>
    <!-- Menu End -->
@endsection
