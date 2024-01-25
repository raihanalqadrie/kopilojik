@extends('layouts.main')
@section('container')
    @include('partials.header')

    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title">
                <h4 class="text-primary text-uppercase" style="letter-spacing: 5px;">About Us</h4>
                <h1 class="display-4">Serving Since 1950</h1>
            </div>
            <div class="row">
                <div class="col-lg-8 py-0 py-lg-5">
                    <h1 class="mb-3">Our Story</h1>
                    <p class="text-justify">Pada 24 Januari 2020, Kopilojik dibuka di Tebet, Jakarta, menghadirkan
                        harmoni kopi, burger, dan shisha. Pandemi COVID-19 membawa tantangan, memaksa Kopilojik fokus pada
                        layanan take away. Meskipun mengalami penurunan omset, semangat mereka tak pernah surut. Pada Juni,
                        setelah kafe tutup sementara, Kopilojik kembali membuka pintu.</p>
                    <p class="text-justify">Keputusan tersebut membawa berkah, mendapatkan perhatian lebih dari
                        masyarakat. Bukan hanya tempat kopi, Kopilojik menjadi magnet bagi pecinta kopi, burger, dan shisha.
                        Sebagai kisah ketangguhan, Kopilojik juga menceritakan inspirasi di balik nama dan desainnya yang
                        maskulin.</p>
                    <p class="text-justify">Nuansa industrial yang maskulin diakui dengan penempatan motor di dalam
                        kafe. Harga yang terjangkau dan suasana yang hangat membuat Kopilojik menjadi tempat bersahabat.
                        Live musik setiap malam menambahkan keunikan, menciptakan pengalaman yang tak terlupakan.</p>
                    <p class="text-justify">Tak hanya tentang kopi dan makanan, Kopilojik berbagi keberkahan melalui
                        inisiatif "Jumat Berkah". Dari Jakarta hingga Pontianak, Kopilojik tetap menjadi tempat yang tak
                        hanya memanjakan lidah, tetapi juga menyentuh hati. Dengan semangat bertahan dan berinovasi,
                        Kopilojik terus menjadi destinasi favorit bagi pencinta kopi, burger, shisha, dan musik.</p>
                </div>
                <div class="col-lg-4 py-5 py-lg-0" style="max-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="{{ asset('img/story.png') }}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 py-5 py-lg-0" style="max-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded" src="{{ asset('img/vision.png') }}" style="object-fit: cover;">
                    </div>
                </div>
                <div class="col-lg-8 py-0 py-lg-5">
                    <h1 class="mb-3">Our Vision</h1>
                    <p class="text-justify">Visi Kopilojik melampaui sekadar cita rasa kopi, burger, dan shisha.
                        Setiap Jumat, kami berkomitmen untuk menjadi sumber berkah, merayakan kehidupan, dan berbagi
                        kebahagiaan dengan komunitas kami. Suara adzan Jumat mengubah Kopilojik menjadi ruang refleksi dan
                        kebersamaan, mempersembahkan hidangan yang tak hanya mengisi perut tapi juga menyentuh hati. "Jumat
                        Berkah" adalah panggilan untuk merayakan kebaikan dalam setiap tindakan sehari-hari. Dengan setiap
                        cangkir kopi dan live musik, kami membawa nuansa keberkahan ke setiap pengalaman di Kopilojik. Visi
                        kami adalah membawa keberkahan melampaui dinding kafe, menciptakan jejak kebaikan yang menginspirasi
                        di setiap Jumat, menjadi agen perubahan positif, dan membangun komunitas yang dipenuhi nilai-nilai
                        keberkahan dan kehangatan.</p>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
@endsection
