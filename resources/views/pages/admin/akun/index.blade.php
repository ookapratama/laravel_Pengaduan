@extends('layouts.app', ['title' => 'Data Akun'])

@section('content')
    @push('styles')
        <link rel="stylesheet" href="{{ asset('library/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('library/datatables.net-select-bs4/css/select.bootstrap4.min.css') }}">
    @endpush

    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Data Akun</h1>
            </div>

            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <!-- Add Account Button -->
                                <a href="#" data-toggle="modal" data-target="#modal-add"
                                    class="btn btn-success text-white my-3" id="btn-add">Tambah Data</a>

                                <!-- Account Table -->
                                <div class="table-responsive">
                                    <table class="table table-striped" id="table-penerima">
                                        <thead>
                                            <tr>
                                                <th class="text-center">#</th>
                                                <th>Name</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $i => $v)
                                                <tr>
                                                    <td>{{ ++$i }}</td>
                                                    <td>{{ $v->name }}</td>
                                                    <td>{{ $v->email }}</td>
                                                    <td>
                                                        <a href="" data-id="{{ $v->id }}" data-toggle="modal"
                                                            data-target="#modal-add" class="modalEdit">
                                                            <button type="button"
                                                                class="btn btn-icon btn-warning btn-sm me-1">
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <button  onclick="deleteData({{ $v->id }}, 'users')" class="btn btn-icon btn-danger btn-sm me-1 modalDelete">
                                                                Hapus
                                                        </button>
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
    @include('pages.admin.akun.form-add')

    @push('scripts')
        <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#table-penerima').DataTable();

                // Add button click
                $('#btn-add').click(function() {
                    $('#form-account').trigger('reset');
                    $('#form-account').removeData('id');
                    $('#modal-add .modal-title').text('Tambah Akun');
                });

                // Edit button click
                $('.btn-edit').click(function() {
                    var userId = $(this).data('id');
                    $.ajax({
                        url: "{{ url('admin/akun') }}/" + userId + "/edit",
                        method: 'GET',
                        success: function(response) {
                            $('#form-account').find('input[name="name"]').val(response.name);
                            $('#form-account').find('select[name="role"]').val(response.role);
                            $('#form-account').data('id', userId);
                            $('#modal-add .modal-title').text('Edit Akun');
                            $('#modal-add').modal('show');
                        },
                        error: function(xhr) {
                            console.error(xhr);
                            swal("Error", "Failed to fetch user data.", "error");
                        }
                    });
                });

                // Form submission (add/update)
                $('#form-account').on('submit', function(e) {
                    e.preventDefault();
                    var userId = $('#form-account').data('id');
                    var ajaxUrl = userId ? "{{ route('akun.update', '') }}/" + userId :
                        "{{ route('akun.store') }}";
                    var ajaxMethod = userId ? 'PUT' : 'POST';

                    $.ajax({
                        url: ajaxUrl,
                        method: ajaxMethod,
                        data: $(this).serialize(),
                        success: function(response) {
                            if (response.status === 'success') {
                                swal("Success", response.message, "success").then(() => location
                                    .reload());
                            } else {
                                swal("Error", response.message, "error");
                            }
                        },
                        error: function(xhr) {
                            console.error(xhr);
                            swal("Error", "Ajax Error.", "error");
                        }
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
                            url: "{{ url('admin/akun') }}/" + id,
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
