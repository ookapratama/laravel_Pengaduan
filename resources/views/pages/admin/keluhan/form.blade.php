<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Tambah Keluhan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formSubmit" method="POST">
                    @csrf
                    <input name="_method" type="hidden" id="methodType" value="POST">
                    <input type="hidden" name="id" id="formId" value="">
                    <input type="hidden" id="actionURL" value="{{ route('keluhan.store') }}">

                    <div class="form-group">
                        <label for="name">Nama pelanggan</label>
                        <select name="id_pelanggan_222406" id="id_pelanggan_222406" class="form-control" required>
                            <option value="">-- pilih pelanggan --</option>
                            @foreach ($pelanggan as $v)
                                <option value="{{ $v->id }}">{{ $v->nama_222406 }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Keluhan</label>
                        <input type="text" name="keluhan_222406" id="keluhan_222406" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Tanggal Keluhan</label>
                        <input type="date" name="tgl_keluhan_222406" id="tgl_keluhan_222406"
                            value="{{ date('Y-m-d') }}" readonly class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="role">Status </label>
                        <select name="status_keluhan_222406" id="status_keluhan_222406" class="form-control" required>
                            <option value="">-- pilih status --</option>
                            <option value="Diproses">Diproses</option>
                            <option value="Pending">Pending</option>
                            <option value="Selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Kategori Keluhan </label>
                        <select name="id_kategori_222406" id="id_kategori_222406" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach ($kategori as $v)
                                <option value="{{ $v->id }}">{{ $v->nama_kategori_222406 }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" id="submitUpdate" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
