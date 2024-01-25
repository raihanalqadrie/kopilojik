@extends('pages.dashboard.layouts.main')
@section('container')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Halaman Tambah Artikel</h1>
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="POST" action="/dashboard/blogs/create" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label for="title">Judul Berita</label>
                            <input type="text" class="form-control @error('title') is-invalid @enderror"
                                id="title" name="title" placeholder="Judul Berita">
                            @error('title')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="content">Gambar</label>
                            <input class="form-control" type="file" name="image">
                        </div>
                        <div class="form-group">
                            <label for="content">Isi Berita</label>
                            @error('content')
                                <p class="text-danger">
                                    {{ $message }}
                                </p>
                            @enderror
                            <textarea id="default" class="form-control" name="content"></textarea>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Tambah Berita</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea#default'
            });
    </script>
@endsection
