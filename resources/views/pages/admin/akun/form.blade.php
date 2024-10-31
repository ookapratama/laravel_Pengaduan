<div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="modalAddLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalAddLabel">Tambah user</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formSubmit" method="POST">
                    @csrf
                    <input type="hidden" name="_method" id="methodType" value="POST">
                    <input type="hidden" name="id" id="formId" class="form-control">
                    <input type="hidden" id="actionURL" value="{{ route('akun.store') }}">

                    <div class="form-group">
                        <label for="password">Nama</label>
                        <input type="text" name="name" id="name" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Email</label>
                        <input type="email" name="email" id="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="role">Password</label>
                        <input type="password" name="password" id="password" value="" class="form-control">
                    </div>
                    <input type="hidden" name="role" id="role" value="admin">

                    <button type="submit" id="submitUpdate" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>
