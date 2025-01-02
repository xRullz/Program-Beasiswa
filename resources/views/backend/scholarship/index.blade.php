@extends('backend.layouts.layout')

@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="/scholarships">Data Beasiswa</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Data Beasiswa</h4>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm float-right mr-4"
                                        data-toggle="modal" data-target="#modalAddBeasiswa"><i class="fa fa-plus"></i>
                                        Tambah
                                        Beasiswa</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Gambar</th>
                                                <th>Judul</th>
                                                {{-- <th>Deskripsi</th> --}}
                                                <th>Jumlah Penerima</th>
                                                <th>Batas Pendaftaran</th>
                                                <th style="width: 60px">Action</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($scholarships as $data)
                                            <tbody>
                                                <td>{{ $no++ }}</td>
                                                <td><img src="{{ asset('storage/' . $data->image) }}" alt="Image"
                                                        width="100"></td>
                                                <td>{{ $data->title }}</td>
                                                {{-- <td>{{ $data->description }}</td> --}}
                                                <td>{{ $data->amount }}</td>
                                                <td>{{ $data->deadline }}</td>
                                                <td>
                                                    <a href="#modalEdit{{ $data->id }}" data-toggle="modal"
                                                        class="btn btn-primary btn-sm"><i class="fa fa-edit"></i> </a>
                                                    <a href="#modalHapus{{ $data->id }}" data-toggle="modal"
                                                        class="btn btn-danger btn-sm"><i class="fa fa-trash"></i>
                                                    </a>
                                                </td>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalAddBeasiswa" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah Beasiswa</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/scholarships/store" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Judul</label>
                                        <input type="text" class="form-control" name="title"
                                            placeholder="Judul Beasiswa ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Deskripsi</label>
                                        <input type="text" class="form-control" name="description"
                                            placeholder="Deskripsi ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Gambar</label>
                                        <input type="file" class="form-control" name="image"
                                            placeholder="Deskripsi ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Jumlah Penerima</label>
                                        <input type="number" class="form-control" name="amount"
                                            placeholder="Jumlah Penerima ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Batas Pendaftaran</label>
                                        <input type="date" class="form-control" name="deadline">
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                            class="fa fa-undo"></i> Close</button>
                                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save
                                        changes</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>


                @foreach ($scholarships as $d)
                    <div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Edit Beasiswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/scholarships/{{ $d->id }}/update" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" value="{{ $d->id }}" name="id" required>
                                        <div class="form-group">
                                            <label>Judul</label>
                                            <input type="text" value="{{ $d->title }}" class="form-control"
                                                name="title">
                                        </div>
                                        <div class="form-group">
                                            <label>Gambar</label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        <div class="form-group">
                                            <label>Deskripsi</label>
                                            <input type="text" value="{{ $d->description }}" class="form-control"
                                                name="description">
                                        </div>
                                        <div class="form-group">
                                            <label>Jumlah Penerima</label>
                                            <input type="text" value="{{ $d->amount }}" class="form-control"
                                                name="amount">
                                        </div>
                                        <div class="form-group">
                                            <label>Batas Pendaftaran</label>
                                            <input type="date" value="{{ $d->deadline }}" class="form-control"
                                                name="deadline">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                class="fa fa-undo"></i> Close</button>
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Save
                                            changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach

                @foreach ($scholarships as $g)
                    <div class="modal fade" id="modalHapus{{ $g->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus Beasiswa</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/scholarships/{{ $g->id }}/destroy" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">

                                        <input type="hidden" value="{{ $d->id }}" name="id" required>
                                        <div class="form-group">
                                            <h4>Apakah Anda Ingin Menghapus Data Ini?</h4>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal"><i
                                                        class="fa fa-undo"></i> Close</button>
                                                <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>
                                                    Hapus</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
