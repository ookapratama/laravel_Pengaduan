<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">{{ isset($data->id) ? 'Update' : 'Tambah' }} Keluhan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ isset($data->id) ? route('keluhan.update') : route('keluhan.store') }}" method="POST">
                    @csrf
                    @if (isset($data->id))
                        @method('PUT')
                        <input type="hidden" name="id" id="id" class="form-control">
                    @endif
                    <div class="form-group">
                        <label for="name">Nama pelanggan</label>
                        <select name="id_pelanggan_222406" id="id_pelanggan_222406" class="form-control" required>
                            <option value="">-- pilih pelanggan --</option>
                            @foreach ($pelanggan as $v)
                                <option {{ isset($data->id) && $data->id_pelanggan_222406 == $v->id ? 'selected' : '' }}
                                    value="{{ $v->id }} ">{{ $v->nama_222406 }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Keluhan</label>
                        <input type="text" name="keluhan_222406" id="keluhan_222406" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="role">Tanggal Keluhan</label>
                        <input type="date" name="tgl_keluhan_222406" id="tgl_keluhan_222406"
                            value="{{ isset($data->id) ? $data->tgl_keluhan_222406 : date('Y-m-d') }}" readonly
                            class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="role">Status </label>
                        <select name="status_222406" id="status_222406" class="form-control" required>
                            <option value="">-- pilih status</option>
                            <option {{ isset($data->id) && $data->status_222406 == 'Diproses' ? 'selected' : '' }}
                                value="Diproses">Diproses</option>
                            <option {{ isset($data->id) && $data->status_222406 == 'Pending' ? 'selected' : '' }}
                                value="Pending">Pending</option>
                            <option {{ isset($data->id) && $data->status_222406 == 'Selesai' ? 'selected' : '' }}
                                value="Selesai">Selesai</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="role">Kategori Keluhan </label>
                        <select name="id_kategori_222406" id="id_kategori_222406" class="form-control" required>
                            <option value="">-- Pilih --</option>
                            @foreach ($kategori as $v)
                                <option {{ isset($data->id) && $data->id_kategori_222406 == $v->id ? 'selected' : '' }}
                                    value="{{ $v->id }}"> {{ $v->nama_kategori_222406 }} </option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary"> {{ isset($data->id) ? 'Update' : 'Tambah' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

