@extends('layouts.app')
@push('css')
    <link href="{{ asset('bower_components/datatables/media/css/dataTables.bootstrap4.css') }}" rel="stylesheet">
@endpush

@section('content-app')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Data Peran</h3>
                    <div class="card-tools">
                        <a href="{{ route('peran.create') }}" class="btn btn-primary btn-sm">
                            <i class="fas fa-plus mr-2"></i>Tambah Peran
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

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
                        title: "Nama Peran"
                    },
                    {
                        data: 'aktif',
                        title: "Status",
                        orderable: false
                    },
                    {
                        data: 'action',
                        title: "#",
                        orderable: false
                    },
                ]
            });
        }

        $(document).ready(function() {
            var table = datatables();

            // Delete handler
            $(document).on('click', '.btn-delete', function() {
                var id = $(this).data('id');

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data peran akan dihapus secara permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: "{{ route('peran.index') }}/" + id,
                            type: 'DELETE',
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            success: function(response) {
                                Swal.fire(
                                    'Terhapus!',
                                    response.message,
                                    'success'
                                );
                                table.ajax.reload();
                            },
                            error: function(xhr) {
                                Swal.fire(
                                    'Gagal!',
                                    'Terjadi kesalahan saat menghapus data.',
                                    'error'
                                );
                            }
                        });
                    }
                });
            });
        });
    </script>
@endpush
