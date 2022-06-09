@extends('layouts.master')
@section('title', 'Users')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">{{Request::is('*/admin*') ? 'AdminCredentials' : 'StakeholderCredentials'}}</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('super.dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Credentials</li>
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
                    <div class="d-flex justify-content-between">
                        <h3 class="card-title">Data Credentials</h3>
                        <button class="btn btn-sm btn-success" id="btn-tambah"><i class="fas fa-plus"></i>
                            Create</a>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Terakhir Diubah</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($credentials as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->users->name }}</td>
                                    <td>{{ $data->username }}</td>
                                    <td>{{ \Carbon\Carbon::parse($data->updated_at)->diffForHumans() }}</td>
                                    <td>
                                        <button class="btn btn-warning btn-lupa m-1" data-id="{{ $data->id }}">
                                            Lupa Password</button>
                                        <button class="btn btn-danger btn-delete m-1" data-id="{{ $data->id }}">
                                            Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Terakhir Diubah</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    {{-- MODAL HAPUS --}}
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-danger">
                    <h5 class="modal-title" id="deleteModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Apakah kamu yakin ingin menghapus data ini?
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak Jadi</button>
                    <form class="float-left m-1" method="POST" id="form-delete">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Iya, Hapus</a>
                    </form>
                </div>
            </div>
        </div>
    </div>


    {{-- MODAL TAMBAH --}}
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title" id="createModalLabel">Tambah Credentials</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ Request::is('*/admin*') ? route('super.credentials.admin.store') : route('super.credentials.stakeholder.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <div id="dropdown-user">
                                <label for="user">Nama User</label>
                                <select id="user" class="search form-control" style="width:100%;" name="user_id"></select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div id="dropdown-user">
                                <label for="username">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Masukkan Username...">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" name="password" id="password" class="form-control"
                                placeholder="Masukkan Password...">
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- MODAL LUPA PASSWORD --}}
    <div class="modal fade" id="lupaModal" tabindex="-1" aria-labelledby="lupaModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header bg-warning">
                    <h5 class="modal-title" id="lupaModalLabel">Lupa Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="formLupa" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="password">Masukkan Password Baru</label>
                            <div class="input-group" id="show_hide_password">
                                <input class="form-control" type="password" id="password" name="password">
                                <div class="input-group-append">
                                    <span class="input-group-text"><a href=""><i class="fa fa-eye-slash"
                                                aria-hidden="true"></i></a></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-warning">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@push('script')
    <!-- DataTables -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script>
        $(function() {
            $("#table").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });

        $(document).ready(function() {
            $('.btn-delete').on('click', function() {
                @if(Request::is('*/admin*'))
                $('#form-delete').attr('action', '/super/credentials/admins/' + $(this).data('id'))
                @else
                $('#form-delete').attr('action', '/super/credentials/stakeholders/' + $(this).data('id'))
                @endif
                $('#deleteModal').modal('show')
            })

            $('#btn-tambah').on('click', function() {
                $('#createModal').modal('show')
            })

            $('.btn-lupa').on('click', function() {
                @if(Request::is('*/admin*'))
                $('#formLupa').attr('action', '/super/credentials/admins/' + $(this).data('id') + '/forget')
                @else
                $('#formLupa').attr('action', '/super/credentials/stakeholders/' + $(this).data('id') + '/forget')
                @endif
                $('#lupaModal').modal('show')
            })

            $('.search').select2({
                dropdownParent: '#dropdown-user',
                minimumInputLength: 3,
                placeholder: 'Masukkan Nama Users',
                ajax: {
                    url: '{{ route('api.usersall.search') }}',
                    dataType: 'json',
                },
            });

            $("#show_hide_password a").on('click', function(event) {
                event.preventDefault();
                if ($('#show_hide_password input').attr("type") == "text") {
                    $('#show_hide_password input').attr('type', 'password');
                    $('#show_hide_password i').addClass("fa-eye-slash");
                    $('#show_hide_password i').removeClass("fa-eye");
                } else if ($('#show_hide_password input').attr("type") == "password") {
                    $('#show_hide_password input').attr('type', 'text');
                    $('#show_hide_password i').removeClass("fa-eye-slash");
                    $('#show_hide_password i').addClass("fa-eye");
                }
            });

        })

    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
