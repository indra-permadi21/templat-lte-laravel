@extends('layouts.default')
<!-- Default box -->

@push('style')
    {{-- <link rel="stylesheet" media="screen, print" href="{{ asset('dist/css/datagrid/datatables/datatables.bundle.css') }}"> --}}
@endpush
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Satuan</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                </button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div>

                <button type="button" class="btn btn-success float-right mb-3" data-toggle="modal"
                    data-target="#exampleModal">Tambah</button>
            </div>
            <table id="dt_uom" class="table table-bordered table-hover">
                <tr>
                    <th>Kode</th>
                    <th>Nama Satuan</th>
                    <th>&nbsp;</th>
                </tr>
            </table>
        </div>
        <!-- /.card-body -->
        {{-- <div class="card-footer">
            Footer
        </div> --}}
        <!-- /.card-footer-->
    </div>
    <!-- /.card -->

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah Satuan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form id="createForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Kode</label>
                            <input type="text" class="form-control" id="uom_code">
                        </div>
                        <div class="form-group">
                            <label for="name">Deskripsi</label>
                            <input type="text" class="form-control" id="description">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="button" id="submitData" class="btn btn-primary">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @push('script')
        <script src="{{ asset('plugins/datatables/jquery.dataTables.js') }}"></script>
        <script>
            $(document).ready(function() {
                $('#dt_uom').DataTable();

                $('#submitData').on('click', function() {
                    const formData = {
                        uom_code: $('#uom_code').val(),
                        description: $('#description').val(),
                        _token: '{{ csrf_token() }}' // Add the CSRF token
                    };

                    $.ajax({
                        url: '{{ route('uom.store') }}', // Laravel route
                        method: 'POST',
                        data: formData,
                        success: function(response) {
                            alert(response.success); // Show success message
                        },
                        error: function(xhr) {
                            alert('An error occurred: ' + xhr.responseText); // Show error message
                        }
                    });
                });
            });
        </script>
    @endpush
@endsection
