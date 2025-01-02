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
                                                <th>Nama Beasiswa</th>
                                                <th>Nama Pendaftar</th>
                                                <th>Tanggal Pendaftaran</th>
                                                <th>Status</th>
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
                                                <td>{{ $data->created_at }}</td>
                                                <td>
                                                    @if ($data->status === 'accepted')
                                                        <span style="color: green;">{{ $data->status }}</span>
                                                    @elseif ($data->status === 'pending')
                                                        <span style="color: orange;">{{ $data->status }}</span>
                                                    @elseif ($data->status === 'rejected')
                                                        <span style="color: red;">{{ $data->status }}</span>
                                                    @else
                                                        <span>{{ $data->status }}</span>
                                                    @endif
                                                </td>
                                            </tbody>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
