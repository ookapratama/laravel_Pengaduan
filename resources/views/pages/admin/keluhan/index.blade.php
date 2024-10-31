@extends('layouts.app', ['title' => 'Data Keluhan'])

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    @endpush

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data {{ Str::ucfirst($menu) }} </h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Add Account Button -->
                                <button type="button" data-toggle="modal" data-target="#modal-form"
                                    class="btn btn-success text-white my-3" id="btn-add">Tambah Data</button>

                                <!-- Account Table -->
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-penerima">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Nama Pelanggan</th>
                                                <th>Keluhan</th>
                                                <th>Tanggal keluhan</th>
                                                <th>Status</th>
                                                <th>Kategori</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $i => $v)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $v->id_pelanggan_222406 }}</td>
                                                    <td>{{ $v->keluhan_222406 }}</td>
                                                    <td>{{ $v->tgl_keluhan_222406 }}</td>
                                                    <td>{{ $v->status_keluhan_222406 }}</td>
                                                    <td>{{ $v->id_kategori_222406 }}</td>
                                                    <td>
                                                        <a href="" data-id="{{ $v->id }}" data-toggle="modal"
                                                            data-target="#modal-form" class="modalEdit">
                                                            <button type="button"
                                                                class="btn btn-icon btn-warning btn-sm me-1">
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <a href="" class="">
                                                            <button type="button"
                                                                class="btn btn-icon btn-danger btn-sm me-1 modalDelete">
                                                                Hapus
                                                            </button>
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <!-- Modal for Add/Edit Account -->
    @include('pages.admin.keluhan.form')

    @push('scripts')
        <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#table-penerima').DataTable();

                // edit
                $('.modalEdit').on('click', function() {

                    let getById = $(this).attr('data-id');
                    let nama = $('#id_pelanggan_222406').value
                    console.log(nama);
                    

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                                'content')
                        },
                        data: formData,
                        url: '{{ url("admin/$menu") }}/' + getById,
                        type: "POST",
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                    });
                });

            });

            // Delete account
            const deleteData = (id, tabel) => {
                let token = $("meta[name='csrf-token']").attr("content");
                swal({
                    title: "Apakah anda yakin?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            headers: {
                                "X-CSRF-TOKEN": token
                            },
                            type: "DELETE",
                            data: {
                                _token: '{{ csrf_token() }}'
                            },
                            url: "{{ url('admin/') }}/" + id,
                            success: function(response) {
                                if (response) {
                                    swal("Deleted", "Data has been deleted", "success").then(() =>
                                        location.reload());
                                } else {
                                    swal("Error", "Failed to delete data.", "error");
                                }
                            },
                            error: function(error) {
                                console.error("AJAX Error:", error);
                                swal("Error", "Ajax Error.", "error");
                            },
                        });
                    }
                });
            };
        </script>
    @endpush
@endsection
