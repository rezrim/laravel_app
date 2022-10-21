@extends('admin.index')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Data {{ $data['title'] }}</h2>
                <button class="au-btn au-btn-icon au-btn--blue" data-toggle="modal" data-target="#addModal">
                    <i class="zmdi zmdi-plus"></i>add item</button>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-md-12">
            <table id="dataTable" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Stock</th>
                        <th>Price</th>
                        <th>View</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['list'] as $list)
                        <tr>
                            <td> <img class="w-100"
                                    src="{{ url('assets/images/product') }}/{{ $list->product_image }}" /> </td>
                            <td>{{ $list->product_name }}</td>
                            <td>{{ $list->product_category->category_name }}</td>
                            <td>{{ $list->stock }}</td>
                            <td>{{ $list->price }}</td>
                            <td>{{ $list->view }}</td>
                            <td>{{ $list->active }}</td>
                            <td>
                                <button type="button" class="btn btn-success mr-2" data-toggle="modal"
                                    data-target="#editModal">Edit</button>
                                <button type="button" class="btn btn-danger">Delete</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('modal')
    <!-- Modal Add -->
    <div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModal" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addModal">Tambah Data</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{ url('product') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">

                        <div>
                            <img id="img-view" src="https://via.placeholder.com/150" />
                        </div>

                        <div class="form-group">
                            <label class="form-label">Gambar Produk</label>
                            <input class="form-control" type="file" name="product_image" id="imgInp" accept="image/*"
                                required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Kategori</label>
                            <select name="category_id" class="form-control">
                                @foreach ($data['category'] as $category)
                                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Nama Produk</label>
                            <input class="form-control" type="text" name="product_name"
                                placeholder="Masukkan Nama Produk" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Slug</label>
                            <input class="form-control" type="text" name="slug" placeholder="Masukkan Slug" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Deskripsi</label>
                            <input class="form-control" type="text" name="meta_description"
                                placeholder="Masukkan Meta Deskripsi" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Meta Title</label>
                            <input class="form-control" type="text" name="meta_title" placeholder="Masukkan Meta Title"
                                required>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Deskripsi Produk</label>
                            <input class="form-control" type="text" name="product_description"
                                placeholder="Masukkan Deskripsi Produk" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Stock</label>
                            <input class="form-control" type="number" name="stock" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Price</label>
                            <input class="form-control" type="number" name="price" required>
                        </div>
                        <div class="form-group">
                            <label class="form-label">Status Aktif</label>
                            <select name="active" class="form-control" required>
                                <option value="1">Aktif</option>
                                <option value="0">Tidak Aktif</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Add End -->
@endsection

@section('footerjs')
    <script>
        function readURL(input) {
            console.log(input.files)
            if (input.files && input.files[0]) {
                let reader = new FileReader();
                reader.onload = function(e) {
                    $('#img-view').attr('src', e.target.result);
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }

        $("#imgInp").change(function() {
            readURL(this);
        });
    </script>
@endsection
