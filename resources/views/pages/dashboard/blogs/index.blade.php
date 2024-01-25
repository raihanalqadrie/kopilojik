@extends('pages.dashboard.layouts.main')
@section('container')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Halaman Artikel</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/dashboard/blogs/create" class="btn btn-primary float-right">Tambah
                    Artikel</a>
            </div>
            <div class="card-body">
                @if (session()->has('sukses'))
                    <div class="alert alert-success" role="alert">
                        {{ session('sukses') }}
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close"><i
                                class="fas fa-times"></i></button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Creator</th>
                                <th>Title</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($blogs as $blogs)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $blogs->users->name }}</td>
                                    <td>{{ $blogs->title }}</td>
                                    <td class="d-flex justify-content-center">
                                       
                                        <a href="/dashboard/blogs/update/{{ $blogs->slug }}"
                                            class="btn btn-warning btn-circle mr-2" title="Edit Data"><i
                                                class="far fa-edit nav-icon"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#HapusModal{{ $blogs->id }}"
                                            class="btn btn-danger btn-circle mr-2" title="Hapus Data"><i
                                                class="fa fa-trash nav-icon"></i></a>
                                    </td>
                                </tr>
                                <!-- Modal Hapus-->
                                <div class="modal fade" id="HapusModal{{ $blogs->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Hapus Data Blog</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <form action="{{ route('blogs.delete') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{ $blogs->id }}">
                                                    <p>Apakah Anda Yakin Ingin Menghapus {{ $blogs->title }}?</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-success"
                                                        data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-danger">Hapus</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
