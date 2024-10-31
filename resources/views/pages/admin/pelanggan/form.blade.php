<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Tambah Pelanggan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formSubmit" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="methodType" value="POST">
                    <input type="hidden" name="id" id="formId" class="form-control">
                    <input type="hidden" id="actionURL" value="{{ route('pelanggan.store') }}">

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input required name="nama_222406" id="nama_222406" type="text" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input required name="email_222406" id="email_222406" type="email" class="form-control">
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select required name="jkl_222406" id="jkl_222406" class="form-control ">
                                        <option value="">-- Pilih Jenis Kelamin --</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>No Telp</label>
                                    <input type="text" required name="telepon_222406" id="telepon_222406" class="form-control " />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" required name="alamat_222406" id="alamat_222406" class="form-control " />
                                </div>
                            </div>

                        </div>

                    </div>



                    <button class="btn btn-primary" id="submitUpdate" type="submit">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
