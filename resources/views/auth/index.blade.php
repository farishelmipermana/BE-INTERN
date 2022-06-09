@extends('layouts.auth')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header text-center">
        <a href="#!" class="h1"><b>SIM</b>AKEN</a>
        <h4>{{ Request::is('*/admin*') ? 'Admin' : (Request::is('*/stakeholder*') ? 'Stakeholder' : 'Superadmin') }}
        </h4>
    </div>
    <div class="card-body">
        <p class="login-box-msg">Sign in to start your session</p>

        <form
            action="{{ Request::is('*/admin*') ? route('auth.admin.login') : (Request::is('*/stakeholder*') ? route('auth.stakeholder.login') : route('auth.super.login')) }}"
            method="post">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="username" class="form-control" placeholder="Username"
                    value="{{ old('username') }}" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-user"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" name="password" class="form-control" placeholder="Password" required>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <button type="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
        </form>

    </div>
    <!-- /.card-body -->
</div>
@endsection