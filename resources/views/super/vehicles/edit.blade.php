@extends('layouts.master')
@section('title', 'Create Users')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Tambah Kendaraan</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('super.dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('super.vehicles.index') }}">Kendaraan</a></li>
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
                    <h3 class="card-title">Tambah Data User</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('super.vehicles.update', $vehicle->id) }}" method="POST">
                    @CSRF
                    @method('PUT')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Nama Kendaraan</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                        placeholder="Masukkan Kendaraan..." value="{{$vehicle->name}}" required>
                                    <small class="text-danger">@error('name') {{ $message }} @enderror</small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Jenis Kendaraan</label>
                                    <select name="fuel_type" class="form-control" required>
                                        <option value="">== PILIH JENIS KENDARAAN ==</option>
                                        <option value="diesel" {{$vehicle->fuel_type == 'diesel' ? 'selected' : ''}}>Diesel</option>
                                        <option value="bensin" {{$vehicle->fuel_type == 'bensin' ? 'selected' : ''}}>Bensin</option>
                                    </select>
                                    <small class="text-danger">@error('fuel_type') {{ $message }} @enderror</small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label for="name">Kapasitas Bahan Bakar</label>

                                    <div class="input-group" id="show_hide_password">
                                        <input type="number" name="fuel_tank"
                                            class="form-control @error('fuel_tank') is-invalid @enderror"
                                            placeholder="Masukkan Kapasitas Bahan Bakar..." value="{{$vehicle->fuel_tank}}" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text">LITER</span>
                                        </div>
                                    </div>
                                </div>
                                <small class="text-danger">@error('phone') {{ $message }} @enderror</small>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('super.vehicles.index') }}" class="m-1 btn btn-outline-danger">Back</a>
                            <button type="submit" class="m-1 btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection
