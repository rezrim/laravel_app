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
                        <th>Nama Kategori</th>
                        <th>Active</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data['list'] as $list)
                        <tr>
                            <td>{{ $list->category_name }}</td>
                            <td>{{ $list->active }}</td>
                            <td>
                                {{-- <button type="button" class="btn btn-success mr-2 w-100 mb-2" data-toggle="modal"
                                    data-target="#editModal{{ $list->id }}">Edit</button> --}}
                                <a href="{{url('category/'.$list->id.'/edit')}}" class="btn btn-success mr-2 w-100 mb-2">Edit</a>
                                <form action="{{ url('category/' . $list->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger w-100"
                                        onclick="return confirm('Yakin ingin menghapus data ini ?')">Delete</button>
                                </form>
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
                <form method="post" action="{{ url('category') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-label">Nama Kategori</label>
                            <input class="form-control" type="text" name="category_name"
                                placeholder="Masukkan Nama Kategori" required>
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

    @foreach ($data['list'] as $list)
        <!-- Modal Edit -->
        <div class="modal fade" id="editModal{{ $list->id }}" tabindex="-1" role="dialog"
            aria-labelledby="editModal{{ $list->id }}" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="editModal{{ $list->id }}">Edit Data {{ $list->category_name }}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form method="post" action="{{ url('category/' . $list->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="modal-body">
                            <div class="form-group">
                                <label class="form-label">Nama Kategori</label>
                                <input class="form-control" type="text" name="category_name"
                                    placeholder="Masukkan Nama Kategori" value="{{ $list->category_name }}" required>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Status Aktif</label>
                                <select name="active" class="form-control" required>
                                    <option value="1" @if ($list->active == 1) selected @endif>Aktif</option>
                                    <option value="0" @if ($list->active == 0) selected @endif>Tidak Aktif
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Edit End -->
    @endforeach
@endsection
