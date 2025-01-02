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
                        <a href="/applications">Data Pendaftar</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Data Pendaftar Beasiswa</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Nama Beasiswa</th>
                                                <th>Nama Pendaftar</th>
                                                <th>Deskripsi</th>
                                                <th style="width: 60px">Tanggal Pendaftaran</th>
                                                <th>Status</th>
                                                @if (Auth::user()->role === 'admin')
                                                <th>Action</th>
                                                @endif
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($applications as $data)
                                            <tbody>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $data->scholarship->title }}</td>
                                                <td>{{ $data->user->name }}</td>
                                                <td>{{ $data->scholarship->description }}</td>
                                                <td>{{ date('d M Y', strtotime($data->created_at)) }}</td>
                                                <td>
                                                    @if ($data->status === 'accepted')
                                                        <span style="color: green;">Diterima</span>
                                                    @elseif ($data->status === 'pending')
                                                        <span style="color: orange;">Pending</span>
                                                    @elseif ($data->status === 'rejected')
                                                        <span style="color: red;">Ditolak</span>
                                                    @else
                                                        <span>{{ $data->status }}</span>
                                                    @endif
                                                </td>
                                                @if (Auth::user()->role === 'admin')
                                                    <td><button href="#modalEdit{{ $data->id }}" data-toggle="modal"
                                                            class="btn btn-primary btn-xs"
                                                            data-original-title="Edit Data"><i class="fa fa-edit"></i>
                                                            Edit</button></td>
                                                @endif
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @foreach ($applications as $d)
                <div class="modal fade" id="modalEdit{{ $d->id }}" tabindex="-1" role="dialog"
                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Edit User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/applications/{{ $d->id }}/update" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <input type="hidden" value="{{ $d->id }}" name="id" required>
                
                                    <div class="form-group">
                                        <label>Status</label>
                                        <select name="status" class="form-control">
                                            <option <?php if ($d->status == 'accepted') {
                                                echo 'selected';
                                            } ?> value="accepted">Diterima</option>
                                            <option <?php if ($d->status == 'pending') {
                                                echo 'selected';
                                            } ?> value="pending">Pending</option>
                                            <option <?php if ($d->status == 'rejected') {
                                                echo 'selected';
                                            } ?> value="rejected">Ditolak</option>
                                        </select>
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
        </div>
    </div>
@endsection
