<div class="card-header">
    <h4>Form Pengaduan </h4>
</div>


<div class="col-md-12 col-lg-12">
    <form action="{{ route('permintaan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input required name="nama_222406" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input required name="email_222406" type="email" class="form-control">
                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select required name="jkl_222406" class="form-control ">
                                <option value="">-- Pilih Jenis Kelamin --</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>No Telp</label>
                            <input type="text" required name="telepon_222406" class="form-control " />
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Alamat</label>
                            <input type="text" required name="alamat_222406" class="form-control " />
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="role">Kategori Keluhan </label>
                        <select name="id_kategori_222406" id="id_kategori_222406" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach ($kategori as $v)
                                <option value="{{ $v->id }}">{{ $v->nama_kategori_222406 }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md">
                        <div class="form-group">
                            <label>Keluhan</label>
                            <input type="text" required name="keluhan_222406" placeholder="masukkan keluhan anda"
                                class="form-control " />
                        </div>
                    </div>
                </div>
            </div>



            <div class="card-footer text-right">
                <button class="btn btn-primary " type="submit">Submit</button>
                <button class="btn btn-secondary mx-1" type="reset">Reset</button>
            </div>
    </form>
</div>

<script></script>
