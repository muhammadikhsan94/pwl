@extends('layouts.app')
@push('css')
    <link href="{{ asset('bower_components/datatables/media/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endpush

@section('content-app')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Pengguna</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-hover" id="table-data" style="width: 100% !important">
                            <thead></thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@push('js')
    <script type="text/javascript" src="{{ asset('bower_components/datatables/media/js/jquery.dataTables.min.js') }}">
    </script>
    <script type="text/javascript" src="{{ asset('bower_components/datatables/media/js/dataTables.bootstrap4.min.js') }}">
    </script>
    <script>
        function datatables() {
            return $('#table-data').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: window.location.href + '/data'
                },
                sDom: 'rt<"row"<"col-sm-12 col-md-3"l><"col-sm-12 col-md-3"i><"col-sm-12 col-md-6"p>>',
                "language": {
                    "processing": "Mohon menunggu, data sedang diproses..",
                },
                columns: [{
                        data: 'DT_RowIndex',
                        orderable: false,
                        width: '5px',
                        title: `No.`
                    },
                    {
                        data: 'nama',
                        title: "Nama"
                    },
                    {
                        data: 'username',
                        title: "Username"
                    },
                    {
                        data: 'email',
                        title: "Email"
                    },
                    {
                        data: 'aktif',
                        title: "Aktif",
                        render: function(data, type, row) {
                            if(data==1) {
                                return `<span class="badge badge-success">Aktif</span>`;
                            } else {
                                return `<span class="badge badge-danger">Tidak Aktif</span>`;
                            }
                        }
                    },
                    {
                        data: 'role',
                        title: "Peran"
                    },
                    {
                        data: 'last_sync',
                        title: "Terakhir Login"
                    },
                    {
                        data: 'id',
                        title: "#",
                        render: function(data, type, row) {
                            var html = ``;
                            var routeEdit = "{{ route('pengguna.edit', '') }}" + "/" + data;
                            html += `<a class="btn btn-info btn-xs mr-2" href="${routeEdit}"><i class="fas fa-edit mr-2"></i>Ubah</a>`;
                            html += `<button class="btn btn-danger btn-xs" href="${routeEdit}"><i class="fas fa-trash-alt mr-2"></i>Hapus</button>`;
                            return html;
                        }
                    },
                ]
            });
        }

        $(document).ready(function() {
            datatables();
        });
    </script>
@endpush
