@extends('layouts.app', ['title' => 'Data User'])

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
                                                <th>Nama</th>
                                                <th>Email</th>
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
                                                    <td>{{ $v->role }}</td>
                                                    <td>
                                                        <a href="" data-id="{{ $v->id }}" data-toggle="modal"
                                                            data-target="#modal-form" class="modalEdit">
                                                            <button type="button"
                                                                class="btn btn-icon btn-warning btn-sm me-1">
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <button onclick="deleteData({{ $v->id }}, 'akun')"
                                                            class="btn btn-icon btn-danger btn-sm me-1 modalDelete">
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
    @include('pages.admin.akun.form')

    @push('scripts')
        <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#table-penerima').DataTable();

                // Event untuk tombol Tambah Data Baru
                $('#btn-add').on('click', function() {
                    $('#modalAddLabel').text('Tambah User');
                    $('#submitUpdate').text('Tambah');
                    $('#methodType').val('POST');
                    $('#actionURL').val('{{ route('akun.store') }}'); // URL untuk store
                    $('#formSubmit')[0].reset(); // Reset form
                    $('#formId').val('');
                    $('#modal-form').modal('show');
                });

                // Event handler untuk tombol Edit
                $(document).on('click', '.modalEdit', function(e) {
                    e.preventDefault();
                    const id = $(this).data('id');

                    // Set ke mode edit
                    $('#modalAddLabel').text('Update User');
                    $('#submitUpdate').text('Save');
                    $('#methodType').val('POST'); // Gunakan method PUT untuk update
                    $('#actionURL').val('{{ url('admin/akun/update') }}'); // URL update

                    // Ambil data dengan AJAX berdasarkan id
                    $.ajax({
                        // url: '{{ url('admin/akun/edit') }}', // Pastikan route tersedia
                        url: '{{ url('admin/akun/edit') }}/' + id, // Pastikan route tersedia
                        type: 'GET',
                        data: {
                            id: id
                        },
                        success: function(response) {
                            console.log(response);
                            // Isi modal dengan data dari server
                            $('#formId').val(response.id);
                            $('#name').val(response.name);
                            $('#email').val(response.email);

                            // Tampilkan modal
                            $('#modal-form').modal('show');
                        },
                        error: function(error) {
                            console.error("Error:", error);
                        }
                    });
                });

                // Submit form untuk Store atau Update menggunakan AJAX
                $('#formSubmit').on('submit', function(e) {
                    e.preventDefault();

                    // Disable tombol submit sementara
                    $('#submitUpdate').attr('disabled', true);

                    // Persiapan data form dan URL action
                    const formData = new FormData(this);
                    const actionURL = $('#actionURL').val();
                    const method = $('#methodType').val();

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: actionURL,
                        type: method,
                        data: formData,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            $('#modal-form').modal('hide');
                            swal("Sukses", "Data berhasil disimpan", "success").then(() => location
                                .reload());
                        },
                        error: function(error) {
                            console.error("Error:", error);
                            swal("Error", "Gagal menyimpan data", "error");
                        },
                        complete: function() {
                            $('#submitUpdate').attr('disabled', false);
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
