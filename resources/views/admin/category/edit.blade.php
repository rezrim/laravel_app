@extends('admin.index')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="overview-wrap">
                <h2 class="title-1">Edit Data {{ $data['list']->category_name }}</h2>
            </div>
        </div>
    </div>
    <div class="row mt-3 bg-white">
        <div class="col-md-12">
            <form method="post" action="{{ url('category/' . $data['list']->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Nama Kategori</label>
                        <input class="form-control" type="text" name="category_name" placeholder="Masukkan Nama Kategori"
                            value="{{ $data['list']->category_name }}" required>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Status Aktif</label>
                        <select name="active" class="form-control" required>
                            <option value="1" @if ($data['list']->active == 1) selected @endif>Aktif</option>
                            <option value="0" @if ($data['list']->active == 0) selected @endif>Tidak Aktif</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
@endsection
