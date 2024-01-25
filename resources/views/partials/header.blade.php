<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 position-relative overlay-bottom">
    <div class="d-flex flex-column align-items-center justify-content-center pt-0 pt-lg-5" style="min-height: 400px">
        <h1 class="display-4 mb-3 mt-0 mt-lg-5 text-white text-uppercase">
            @if (Request::is('content/*'))
                Article
            @elseif (Request::is('about'))
                About Us
            @elseif (Request::is('menu'))
                Menu
            @elseif (Request::is('contact'))
                Contact
            @else
                Not Found
            @endif
        </h1>
        <div class="d-inline-flex mb-lg-5">
            <p class="m-0 text-white"><a class="text-white" href="/">Home</a></p>
            <p class="m-0 text-white px-2">/</p>
            <p class="m-0 text-white">
                @if (Request::is('content/*'))
                    Article
                    @if (isset($blog))
                        @if (Request::is('content/' . $blog->slug))
                            <p class="m-0 text-white px-2">/</p>
                            <p class="m-0 text-white">Article Detail</p>
                        @else
                            <p class="m-0 text-white px-2">/</p>
                            <p class="m-0 text-white">Content not found</p>
                        @endif
                    @endif
                @elseif (Request::is('about'))
                    About Us
                @elseif (Request::is('menu'))
                    Menu
                @elseif (Request::is('contact'))
                    Contact
                @else
                    Not Found
                @endif
            </p>
        </div>
    </div>
</div>
<!-- Page Header End -->
