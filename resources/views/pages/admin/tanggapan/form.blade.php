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
                <form action="{{ isset($data->id) ? route('tanggapan.update') : route('tanggapan.store') }}" method="POST">
                    @csrf
                    @if (isset($data->id))
                        @method('PUT')
                        <input type="hidden" name="id" id="id" class="form-control">
                    @endif
                    <div class="form-group">
                        <label for="name">Nama keluhan</label>
                        <select name="id_keluhan_222406" id="id_keluhan_222406" class="form-control" required>
                            <option value="">-- pilih keluhan --</option>
                            @foreach ($keluhan as $v)
                                <option {{ isset($data->id) && $data->id_keluhan_222406 == $v->id ? 'selected' : '' }}
                                    value="{{ $v->id }} ">{{ $v->keluhan_222406 }} </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Tanggapna</label>
                        <input type="text" name="tanggapan_222406" id="tanggapan_222406" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="role">Tanggal tanggapan</label>
                        <input type="date" name="tgl_tanggapan_222406" id="tgl_tanggapan_222406"
                            value="{{ isset($data->id) ? $data->tgl_tanggapan_222406 : date('Y-m-d') }}" readonly
                            class="form-control">
                    </div>
                  
                    <button type="submit" class="btn btn-primary"> {{ isset($data->id) ? 'Update' : 'Tambah' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

