@extends('pages.dashboard.layouts.main')
@section('container')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Halaman Katalog</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#TambahModal">Tambah
                    Katalog</a>
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
                                <th>Nama Katalog</th>
                                <th>Jumlah Barang Pada Katalog</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($catalogs as $catalogs)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $catalogs->name }}</td>
                                    <td>{{ $catalogs->products->count() }}</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="{{ route('dashboard.catalogs.products', $catalogs) }}"
                                            class="btn btn-primary btn-circle mr-2" title="List Produk"><i
                                                class="fa fa-th-list nav-icon"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#EditModal{{ $catalogs->id }}"
                                            class="btn btn-warning btn-circle mr-2" title="Edit Data"><i
                                                class="far fa-edit nav-icon"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#HapusModal{{ $catalogs->id }}"
                                            class="btn btn-danger btn-circle mr-2" title="Hapus Data"><i
                                                class="fa fa-trash nav-icon"></i></a>
                                    </td>
                                </tr>
                                <!-- Modal Edit-->
                                <div class="modal fade" id="EditModal{{ $catalogs->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Edit Data Katalog</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <form action="{{ route('catalogs.update') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{ $catalogs->id }}">
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Nama Katalog" value="{{ $catalogs->name }}"
                                                        required><br>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-danger"
                                                        data-dismiss="modal">Batal</button>
                                                    <button type="submit" class="btn btn-success">Simpan</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Hapus-->
                                <div class="modal fade" id="HapusModal{{ $catalogs->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Hapus Data Katalog</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <form action="{{ route('catalogs.delete') }}" method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{ $catalogs->id }}">
                                                    <p>Apakah Anda Yakin Ingin Menghapus {{ $catalogs->name }}?</p>
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

    <!-- Modal Tambah-->
    <div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tambah Data Katalog</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form action="{{ route('catalogs.create') }}" method="post">
                    @csrf
                    <div class="modal-body">
                        <input type="text" name="name" class="form-control" placeholder="Nama Katalog"
                            required><br>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
