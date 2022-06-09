@extends('layouts.master')
@section('title', 'Requests Approval')
@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Requests</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item active">Requests Approval</li>
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
                        <h3 class="card-title">Data Permintaan</h3>
                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="table" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nama Driver</th>
                                <th>Nama Stakeholder</th>
                                <th>Nama Kendaraan</th>
                                <th>Approval Dipinjam</th>
                                <th>Approval Digunakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($req as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->users->name }}</td>
                                    <td>{{ $data->stakeholders->users->name }}</td>
                                    <td>{{ $data->vehicles->name }}</td>
                                    <td>{!! $data->approval_take == 1 ? '<span class="badge badge-success">Diterima</span>' : ($data->approval_take === 0 ? '<span class="badge badge-danger">Ditolak</span>' : '<button class="btn btn-sm btn-warning btn-take" data-id="'.$data->id.'">Menunggu Approval</button>') !!}</td>
                                    <td>
                                        @if($data->approval_take == 1)
                                        {!! $data->approval_use == 1 ? '<span class="badge badge-success">Diterima</span>' : ($data->approval_use === 0 ? '<span class="badge badge-danger">Ditolak</span>' : '<button class="btn btn-sm btn-warning btn-use" data-id="'.$data->id.'">Menunggu Approval</button>') !!}
                                        @else
                                        Approval Pertama Belum Disetujui
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nama Driver</th>
                                <th>Nama Stakeholder</th>
                                <th>Nama Kendaraan</th>
                                <th>Approval Dipinjam</th>
                                <th>Approval Digunakan</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    <!-- Modal -->
    <div class="modal fade" id="approvalModal" tabindex="-1" aria-labelledby="approvalModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-md">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="approvalModalLabel">Konfirmasi</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Silakan pilih perizinan pada data yang kamu pilih
                </div>
                <div class="modal-footer">
                    <form class="float-left m-1" method="POST" id="form-tolak">
                        @csrf
                        <input class="approval_type" type="hidden" name="approval_type">
                        <button type="submit" class="btn btn-danger">Tolak</a>
                    </form>
                    <form class="float-left m-1" method="POST" id="form-setuju">
                        @csrf
                        <input class="approval_type" type="hidden" name="approval_type">
                        <button type="submit" class="btn btn-success">Setuju</a>
                    </form>
                </div>
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
    <script>
        $(function() {
            $("#table").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
        });

        $(document).ready(function() {
            $('.btn-take').on('click', function() {
                $('#form-tolak').attr('action', '/stakeholder/approvals/'+$(this).data('id')+'/dec')
                $('#form-setuju').attr('action', '/stakeholder/approvals/'+$(this).data('id')+'/acc')
                $('.approval_type').val('take')
                $('#approvalModal').modal('show')
            })

            $('.btn-use').on('click', function() {
                $('#form-tolak').attr('action', '/stakeholder/approvals/'+$(this).data('id')+'/dec')
                $('#form-setuju').attr('action', '/stakeholder/approvals/'+$(this).data('id')+'/acc')
                $('.approval_type').val('use')
                $('#approvalModal').modal('show')
            })
        })

    </script>
@endpush
@push('css')
    <link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush
