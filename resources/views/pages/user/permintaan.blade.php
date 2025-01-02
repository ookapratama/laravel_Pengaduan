@extends('layouts.user.app', ['title' => 'Website Pengaduan'])

@section('content')
    @push('styles')
    @endpush

    <div class="main-content ">
        <section class="section">
            <div class="section-header">
                <div class="d-flex">
                    <button id="buat-permintaan" class="btn btn-primary mr-3">Buat pengaduan</button>
                    <button id="cek-permintaan" class="btn btn-info">Cek Status pengaduan</button>
                </div>

            </div>

            <div class="section-body">
                <div id="card-form" class="card">
                    @include('pages.user.form_permintaan')
                </div>

            </div>
            <div id="card-status" class="card">
                <div class="card-header">
                    <h4>Cek Status pengaduan</h4>
                </div>
                <div class="card-body ">

                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="">Masukkan Email anda</label>
                            <input required class="form-control" type="text" name="email" id="email">
                        </div>
                        <button id="btn-cari" class="btn btn-primary">
                            Cek Pengajuan
                        </button>
                    </div>

                    <div id="data_pengajuan">
                        <div class="table-responsive mt-4">
                            <table class="table table-striped " id="table-penerima">
                                <thead>
                                    <tr>
                                        <th class="text-center">#</th>
                                        <th>Nama Pengadu</th>
                                        <th>Keluhan</th>
                                        <th>Kategori Keluhan</th>
                                        <th>Tanggapan</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody id="dataPengajuan">

                                </tbody>
                            </table>
                        </div>



                    </div>
                </div>

            </div>
    </div>

    </section>
    </div>


    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.inputmask/5.0.6/jquery.inputmask.min.js"></script>

        <script>
            $(document).ready(function() {

                $('.currency').inputmask({
                    alias: 'numeric',
                    groupSeparator: ',',
                    autoGroup: true,
                    digits: 0,
                    digitsOptional: false,
                    prefix: 'Rp ',
                    placeholder: '0',
                    rightAlign: false,
                    removeMaskOnSubmit: true
                });
                // Existing DataTable initialization
                $('#card-form').hide();
                $('#card-status').hide();

                $('#buat-permintaan').on('click', function() {
                    $('#card-form').show();
                    $('#card-status').hide();
                });

                $('#cek-permintaan').on('click', function() {
                    $('#card-form').hide();
                    $('#card-status').show();
                });

                $('#data_pengajuan').hide(); // Show the table if data is available
                $('#btn-cari').on('click', function() {
                    let email = $('#email').val();

                    $.ajax({
                        url: "{{ route('permintaan.cek') }}", // Route to fetch data
                        method: 'GET',
                        data: {
                            email: email
                        },
                        success: function(response) {
                            console.log(response);

                            if (response.html) {
                                $('#data_pengajuan').show(); // Show the table if data is available
                                $('#dataPengajuan').html(response.html);
                            } else {
                                $('#data_pengajuan').hide(); // Hide the table if no data
                                $('#data_pengajuan').html('<p>No data found</p>');
                            }
                        },
                        error: function() {
                            $('#data_pengajuan').hide(); // Hide the table if error
                            $('#data_pengajuan').html('<p>Error loading data</p>');
                        }
                    });
                });

            });
        </script>
        @if (isset($data->krt->id))
            {{-- show all --}}
            <script>
                $('#modalAll').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var krtId = button.data('krt-id') // Extract info from data-* attributes
                    var modal = $(this)

                    // AJAX request to fetch ART data
                    $.ajax({
                        url: "{{ route('detailAll') }}", // Route to fetch data
                        method: 'GET',
                        data: {
                            krt_id: krtId
                        },
                        success: function(response) {
                            // Load the response (HTML table) into the modal's body
                            modal.find('#tableAll').html(response);
                        },
                        error: function() {
                            modal.find('#tableAll').html('<p>Error loading data</p>');
                        }
                    });




                });
            </script>

            <script>
                $('#artModal').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget) // Button that triggered the modal
                    var krtId = button.data('krt-id') // Extract info from data-* attributes
                    var modal = $(this)

                    // AJAX request to fetch ART data
                    $.ajax({
                        url: "{{ route('get.art.data') }}", // Route to fetch data
                        method: 'GET',
                        data: {
                            krt_id: krtId
                        },
                        success: function(response) {
                            // Load the response (HTML table) into the modal's body
                            modal.find('#artTable').html(response);
                        },
                        error: function() {
                            modal.find('#artTable').html('<p>Error loading data</p>');
                        }
                    });




                });
            </script>

            <script>
                $('#modalRumah').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var krtId = button.data('krt-id'); // Extract the krt-id from data-* attributes
                    console.log(krtId);
                    var modal = $(this)
                    // Fetch data based on krt-id
                    $.ajax({
                        url: '{{ route('rumah.show') }}', // Adjust the URL to your API endpoint
                        data: {
                            krt_id: krtId
                        },
                        method: 'GET',
                        success: function(response) {
                            console.log(response);
                            // Load the response (HTML table) into the modal's body
                            modal.find('#modalRumahContent').html(response);
                        },
                        error: function() {
                            modal.find('#modalRumahContent').html('<p>Error loading data</p>');
                        }

                    });
                });
            </script>

            <script>
                $('#modalAset').on('show.bs.modal', function(event) {
                    var button = $(event.relatedTarget); // Button that triggered the modal
                    var krtId = button.data('krt-id'); // Extract the krt-id from data-* attributes
                    console.log(krtId);
                    var modal = $(this)
                    // Fetch data based on krt-id
                    $.ajax({
                        url: '{{ route('aset.show') }}', // Adjust the URL to your API endpoint
                        data: {
                            krt_id: krtId
                        },
                        method: 'GET',
                        success: function(response) {
                            console.log(response);
                            // Load the response (HTML table) into the modal's body
                            modal.find('#modalAsetContent').html(response);
                        },
                        error: function() {
                            modal.find('#modalAsetContent').html('<p>Error loading data</p>');
                        }

                    });
                });

                $('#createArtButton').on('click', function() {
                    $('#createArtModal').modal('show');
                });

                // Show the edit modal with data
                $('.editArtButton').on('click', function() {
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    var relationship = $(this).data('relationship');

                    $('#editId').val(id);
                    $('#editName').val(name);
                    $('#editRelationship').val(relationship);

                    var action = $('#editArtForm').attr('action').replace(':id', id);
                    $('#editArtForm').attr('action', action);

                    $('#editArtModal').modal('show');
                });

                $('#createArtButton').on('click', function() {
                    $('#createArtModal').modal('show');
                });

                // Show the edit modal with data
                $('.editArtButton').on('click', function() {
                    var id = $(this).data('id');
                    var name = $(this).data('name');
                    var relationship = $(this).data('relationship');

                    $('#editId').val(id);
                    $('#editName').val(name);
                    $('#editRelationship').val(relationship);

                    var action = $('#editArtForm').attr('action').replace(':id', id);
                    $('#editArtForm').attr('action', action);

                    $('#editArtModal').modal('show');
                });
            </script>
        @endif
    @endpush
@endsection
