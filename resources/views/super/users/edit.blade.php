@extends('layouts.master')
@section('title', 'Edit Users')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit User</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('super.dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('super.users.index') }}">Users</a></li>
                        <li class="breadcrumb-item active">Edit</li>
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
                    <h3 class="card-title">Edit Data User</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{ route('super.users.update', $user->id) }}" method="POST">
                    @CSRF
                    @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <label for="name">Nama Lengkap</label>
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan Nama Lengkap..." value="{{$user->name}}">
                                    <small class="text-danger">@error('name') {{$message}} @enderror</small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="name">Jenis Kelamin</label>
                                    <select name="gender" class="form-control" required>
                                        <option value="">== PILIH JENIS KELAMIN ==</option>
                                        <option value="male" {{$user->gender == 'male' ? 'selected' : ''}}>Laki-Laki</option>
                                        <option value="female" {{$user->gender == 'female' ? 'selected' : ''}}>Perempuan</option>
                                    </select>
                                    <small class="text-danger">@error('gender') {{$message}} @enderror</small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="name">No. HP</label>
                                    <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Masukkan No. HP..." value="{{$user->phone}}">
                                    <small class="text-danger">@error('phone') {{$message}} @enderror</small>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4">
                                <div class="form-group">
                                    <label for="name">Email</label>
                                    <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan Email..." value="{{$user->email}}">
                                    <small class="text-danger">@error('email') {{$message}} @enderror</small>
                                </div>
                            </div>

                            <div class="col-12">
                                <div class="form-group">
                                    <label for="address">Alamat</label>
                                    <textarea name="address" rows="3" class="form-control @error('address') is-invalid @enderror" placeholder="Masukkan Alamat...">{{$user->address}}</textarea>
                                    <small class="text-danger">@error('address') {{$message}} @enderror</small>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.row -->
                    <div class="card-footer">
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('super.users.index') }}" class="m-1 btn btn-outline-danger">Back</a>
                            <button type="submit" class="m-1 btn btn-success">Update</button>
                        </div>
                    </div>
                </form>
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
@endsection