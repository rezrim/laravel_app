@extends('admin.index')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Edit Data {{ $data['list']->product_name }}</h2>
            </div>
        </div>
    </div>
    <div class="row mt-3 bg-white">
        <div class="col-md-12">
            <form method="post" action="{{ url('product/' . $data['list']->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">

                    <div>
                        <img id="img-view" src="{{ url('assets/images/product') }}/{{ $list->product_image }}" />
                        <input type="hidden" name="product_image_old" value="{{ $list->product_image }}">
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
                                <option value="{{ $category->id }}" @if ($category->id == $data['list']->category_id) selected @endif>
                                    {{ $category->category_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Nama Produk</label>
                        <input class="form-control" type="text" name="product_name" value="{{$data['list']->product_name}}" placeholder="Masukkan Nama Produk"
                            required>
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
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection
