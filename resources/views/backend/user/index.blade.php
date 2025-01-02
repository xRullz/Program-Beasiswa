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
                        <a href="#">Data Master</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="/users">User</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="card-title">Data User</h4>
                                </div>
                                <div class="col-md-6">
                                    <button type="button" class="btn btn-primary btn-sm float-right mr-4"
                                        data-toggle="modal" data-target="#modalAddUser"><i class="fa fa-plus"></i> Tambah
                                        User</button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="basic-datatables" class="display table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($users as $user)
                                            <tbody>
                                                <td>{{ $no++ }}</td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>{{ $user->role }}</td>
                                                <td>
                                                    <a href="#modalEdit{{ $user->id }}" data-toggle="modal"
                                                        class="btn btn-primary btn-xs" data-original-title="Edit Data"><i
                                                            class="fa fa-edit"></i> Edit</a>
                                                    <a href="#modalHapusUser{{ $user->id }}" data-toggle="modal"
                                                        class="btn btn-danger btn-xs" data-toggle="tooltip"
                                                        data-original-title="Hapus Data"><i class="fa fa-trash"></i>
                                                        Hapus</a>
                                                </td>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="modalAddUser" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Tambah User</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="/users/store" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="text" class="form-control" name="username"
                                            placeholder="Username ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" name="email" placeholder="Email ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" name="password"
                                            placeholder="Password ...">
                                    </div>
                                    <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" class="form-control">
                                            <option value="#" selected>-- Pilih Role --</option>
                                            <option value="admin">Admin</option>
                                            <option value="user">User</option>
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


                @foreach ($users as $d)
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
                                <form action="/users/{{ $d->id }}/update" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body">
                                        <input type="hidden" value="{{ $d->id }}" name="id" required>
                                        <div class="form-group">
                                            <label>Username</label>
                                            <input type="text" value="{{ $d->username }}" class="form-control"
                                                name="username" placeholder="Nama Lengkap ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Email</label>
                                            <input type="email" value="{{ $d->email }}" class="form-control"
                                                name="email" placeholder="Email ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Password</label>
                                            <input type="password" value="{{ $d->password }}" class="form-control"
                                                name="password" placeholder="Password ...">
                                        </div>
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select name="role" class="form-control">
                                                <option <?php if ($d->role == 'admin') {
                                                    echo 'selected';
                                                } ?> value="admin">Admin</option>
                                                <option <?php if ($d->role == 'user') {
                                                    echo 'selected';
                                                } ?> value="user">User</option>
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

                @foreach ($users as $g)
                    <div class="modal fade" id="modalHapusUser{{ $g->id }}" tabindex="-1" role="dialog"
                        aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Hapus User</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <form action="/user/{{ $g->id }}/destroy" method="get"
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
    @endsection
