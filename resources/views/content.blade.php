@extends('layouts.main')
@section('container')
    @include('partials.header')
    <!-- Blog Card Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="card shadow-sm p-3 mb-3 rounded equal-height-card">
                <img src="{{ $blog ? asset('storage/' . $blog->image) : 'placeholder-image.jpg' }}"
                     alt="Blog Image" class="img-fluid rounded" style="object-fit: cover; max-height: 365px">
                <div class="card-body">
                    @if ($blog)
                        <p class="card-text"><i class="fa fa-user"></i> {{ $blog->users->name }} | <i class="fa fa-calendar"></i> {{ $blog->created_at->formatLocalized('%e %B %Y') }}</p>
                        <h1 class="card-title text-center">{{ $blog->title }}</h1>
                        <p class="card-text">{!! $blog->content !!}</p>
                    @else
                        <p class="card-text">Content not found</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Blog Card End -->
@endsection
