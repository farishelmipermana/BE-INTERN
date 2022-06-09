@extends('layouts.master')
@section('title', 'Create Users')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Pemesanan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('admin.requests.index') }}">Requests</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Tambah Data Pemesanan</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('admin.requests.store') }}" method="POST">
                    @CSRF
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <div id="select-users">
                                        <label for="users">Nama Peminjam (Driver)</label>
                                        <select id="users" class="users form-control" style="width:100%;" name="user_id"></select>
                                    </div>
                                    <small class="text-danger">@error('name') {{$message}} @enderror</small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div id="select-stakeholder">
                                        <label for="users">Nama Stakeholder</label>
                                        <select id="stakeholder" class="stakeholder form-control" style="width:100%;" name="user_stake_id" id="stakeholder"></select>
                                    </div>
                                    <small class="text-danger">@error('name') {{$message}} @enderror</small>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <div id="select-vehicle">
                                        <label for="users">Nama Kendaraan</label>
                                        <select id="vehicle" class="vehicles form-control" style="width:100%;" name="vehicle_id"></select>
                                    </div>
                                    <small class="text-danger">@error('name') {{$message}} @enderror</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('admin.requests.index') }}" class="m-1 btn btn-outline-danger">Back</a>
                            <button type="submit" class="m-1 btn btn-success">Create</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection

@push('script')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script>
        $(document).ready(function() {

            $('.stakeholder').select2({
                placeholder: 'Masukkan Nama Stakeholder',
                ajax: {
                    url: '{{ route('api.stakeholder.search') }}',
                    dataType: 'json',
                },
            });

            $('.users').select2({
                placeholder: 'Masukkan Nama Users',
                ajax: {
                    url: '{{ route('api.users.search') }}',
                    dataType: 'json',
                },
            });

            $('.vehicles').select2({
                placeholder: 'Masukkan Nama Kendaraan',
                ajax: {
                    url: '{{ route('api.vehicle.search') }}',
                    dataType: 'json',
                },
            });

        })

    </script>
@endpush