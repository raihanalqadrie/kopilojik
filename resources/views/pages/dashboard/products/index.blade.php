@extends('pages.dashboard.layouts.main')
@section('container')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Halaman Produk</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="#" class="btn btn-primary float-right" data-toggle="modal" data-target="#TambahModal">Tambah
                    Produk</a>
            </div>
            <div class="card-body">
                @if (session()->has('sukses'))
                    <div class="alert alert-success" role="alert">
                        {{ session('sukses') }}
                        <button type="button" class="btn btn-close" data-bs-dismiss="alert" aria-label="Close">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                @endif
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Gambar Produk</th>
                                <th>Nama Produk</th>
                                <th>Deskripsi Produk</th>
                                <th>Harga Produk</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($products as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td><img style="width: 80px" class="imageimg-thumbnail"
                                            src="{{ asset('product/' . $product->picture) }}" alt=""></td>
                                    <td>{{ $product->name }}</td>
                                    <td>{{ $product->description }}</td>
                                    <td>@formatRupiah($product->price)</td>
                                    <td class="d-flex justify-content-center">
                                        <a href="#" data-toggle="modal" data-target="#EditModal{{ $product->id }}"
                                            class="btn btn-warning btn-circle mr-2" onclick="test()" title="Edit Data"><i
                                                class="far fa-edit nav-icon"></i></a>
                                        <a href="#" data-toggle="modal" data-target="#HapusModal{{ $product->id }}"
                                            class="btn btn-danger btn-circle mr-2" title="Hapus Data"><i
                                                class="fa fa-trash nav-icon"></i></a>
                                    </td>
                                </tr>
                                <!-- Modal Edit-->
                                <div class="modal fade" id="EditModal{{ $product->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Edit Data Produk</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <form action="{{ route('products.update', ['id' => $product->id]) }}"
                                                method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <!-- Add your form fields for product edit here -->
                                                    <div class="mb-3">
                                                        <label for="name" class="form-label">Nama Produk</label>
                                                        <input type="text" name="name" class="form-control"
                                                            value="{{ $product->name }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="description" class="form-label">Deskripsi</label>
                                                        <textarea name="description" class="form-control" rows="3">{{ $product->description }}</textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="editPrice" class="form-label">Harga</label>
                                                        <input type="text" id="editPrice" name="editPrice"
                                                            class="form-control price-input" value="{{ $product->price }}" required>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="picture" class="form-label">Gambar</label>
                                                        <input type="file" name="picture" class="form-control">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="categorys_id" class="form-label">Category</label>
                                                        <select name="categorys_id" class="form-control" required>
                                                            @foreach ($categorys as $category)
                                                                <option value="{{ $category->id }}"
                                                                    @if ($product->categorys_id == $category->id) selected @endif>
                                                                    {{ $category->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="catalogs_id" class="form-label">Catalog</label>
                                                        <select name="catalogs_id" class="form-control" required>
                                                            @foreach ($catalogs as $catalog)
                                                                <option value="{{ $catalog->id }}"
                                                                    @if ($product->catalogs_id == $catalog->id) selected @endif>
                                                                    {{ $catalog->name }}
                                                                </option>
                                                            @endforeach
                                                        </select>
                                                    </div>
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
                                <div class="modal fade" id="HapusModal{{ $product->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title" id="myModalLabel">Hapus Data Produk</h4>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-hidden="true">&times;</button>
                                            </div>
                                            <form action="{{ route('products.delete', ['id' => $product->id]) }}"
                                                method="post">
                                                @csrf
                                                <div class="modal-body">
                                                    <input type="hidden" name="id" value="{{ $product->id }}">
                                                    <p>Apakah Anda Yakin Ingin Menghapus Produk: {{ $product->name }}?
                                                    </p>
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

    <!-- Modal Tambah -->
    <div class="modal fade" id="TambahModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Tambah Data Produk</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                </div>
                <form action="{{ route('products.create') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="name" class="form-label">Nama Produk</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Deskripsi</label>
                            <textarea name="description" class="form-control" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="price" class="form-label">Harga</label>
                            <input type="text" id="price" name="price" class="form-control price-input"
                                required>
                        </div>
                        <div class="mb-3">
                            <label for="picture" class="form-label">Gambar</label>
                            <input type="file" name="picture" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label for="categorys_id" class="form-label">Category</label>
                            <select name="categorys_id" class="form-control" required>
                                <option value="" disabled selected>Select a category</option>
                                @foreach ($categorys as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="catalogs_id" class="form-label">Catalog</label>
                            <select name="catalogs_id" class="form-control" required>
                                <option value="" disabled selected>Select a catalog</option>
                                @foreach ($catalogs as $catalog)
                                    <option value="{{ $catalog->id }}">{{ $catalog->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            function formatPriceInput(input) {
                // Get the input value
                let inputValue = input.value;

                // Remove non-numeric characters
                inputValue = inputValue.replace(/\D/g, '');

                // Format the number with commas as thousand separators
                inputValue = new Intl.NumberFormat('id-ID').format(inputValue);

                // Add 'Rp.' prefix
                inputValue = 'Rp. ' + inputValue;

                // Update the input value
                input.value = inputValue;
            }

            const priceInputs = document.querySelectorAll('.price-input');

            priceInputs.forEach(function(priceInput) {
                // Format price input on keyup
                priceInput.addEventListener('keyup', function(event) {
                    formatPriceInput(event.target);
                });
            });
        });
    </script>
@endsection
