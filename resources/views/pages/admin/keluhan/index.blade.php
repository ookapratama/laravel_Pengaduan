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
                                                    <td>{{ $v->pelanggan->nama_222406 }}</td>
                                                    <td>{{ $v->keluhan_222406 }}</td>
                                                    <td>{{ $v->tgl_keluhan_222406 }}</td>
                                                    <td>
                                                        @if ($v->status_keluhan_222406 == 'Diproses')
                                                            <div class="badge badge-primary">
                                                                {{ $v->status_keluhan_222406 }}
                                                            </div>
                                                        @elseif ($v->status_keluhan_222406 == 'Pending')
                                                            <div class="badge badge-warning">
                                                                {{ $v->status_keluhan_222406 }}
                                                            </div>
                                                        @else
                                                            <div class="badge badge-success">
                                                                {{ $v->status_keluhan_222406 }}
                                                            </div>
                                                        @endif
                                                    </td>
                                                    <td>{{ $v->kategori->nama_kategori_222406 }}</td>
                                                    <td>
                                                        <a href="" data-id="{{ $v->id }}" data-toggle="modal"
                                                            data-target="#modal-form" class="modalEdit">
                                                            <button type="button"
                                                                class="btn btn-icon btn-warning btn-sm me-1">
                                                                Edit
                                                            </button>
                                                        </a>
                                                        <button onclick="deleteData({{ $v->id }}, 'keluhans')"
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
    @include('pages.admin.keluhan.form')

    @push('scripts')
        <script src="{{ asset('library/datatables/media/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('library/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#table-penerima').DataTable();

                // Event untuk tombol tambah data baru
                $('#btn-add').on('click', function() {
                    // Set ke mode tambah
                    $('#modalAddLabel').text('Tambah Keluhan');
                    $('#submitUpdate').text('Tambah');
                    $('#methodType').val('POST');
                    $('#actionURL').val('{{ route('keluhan.store') }}'); // URL store
                    $('#formSubmit')[0].reset(); // Reset form
                    $('#formId').val('');
                    $('#modal-form').modal('show');
                });

                // Event handler untuk tombol edit
                $(document).on('click', '.modalEdit', function(e) {
                    e.preventDefault();
                    const id = $(this).data('id');

                    // Set ke mode edit
                    $('#modalAddLabel').text('Update Keluhan');
                    $('#submitUpdate').text('Save');
                    $('#methodType').val('POST'); // Gunakan method PUT untuk update
                    // $('#actionURL').val('{{ url('admin/keluhan') }}/' + id); // URL update
                    $('#actionURL').val('{{ url('admin/keluhan/update') }}'); // URL update

                    // Ambil data dengan AJAX berdasarkan id
                    $.ajax({
                        // url: '{{ url('admin/keluhan/edit') }}',
                        url: '{{ url('admin/keluhan/edit') }}/' + id,
                        type: 'GET',
                        // data: {
                        //     id: id
                        // },
                        success: function(response) {
                            // Isi modal dengan data dari server
                            $('#formId').val(response.data.id);
                            $('#id_pelanggan_222406').val(response.data.id_pelanggan_222406);
                            $('#keluhan_222406').val(response.data.keluhan_222406);
                            $('#tgl_keluhan_222406').val(response.data.tgl_keluhan_222406);
                            $('#status_keluhan_222406').val(response.data.status_keluhan_222406);
                            $('#id_kategori_222406').val(response.data.id_kategori_222406);

                            // Tampilkan modal
                            $('#modal-form').modal('show');
                        },
                        error: function(error) {
                            console.error("Error:", error);
                        }
                    });
                });

                // Store dan Update data dengan AJAX
                $('#formSubmit').on('submit', function(e) {
                    e.preventDefault();

                    // Disable tombol submit sementara
                    $('#submitUpdate').attr('disabled', true);

                    // Persiapan data form dan URL action
                    const formData = new FormData(this);
                    const actionURL = $('#actionURL').val();
                    const method = $('#methodType').val();
                    for (const [key, value] of formData) {
                        console.log(`${key}: ${value}\n`);
                    }
                    console.log(actionURL);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: actionURL,
                        type: method,
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
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
                            url: "{{ url('admin/keluhan') }}/" + id,
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
