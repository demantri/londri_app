<div class="modal fade" id="daftar-member" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Daftar Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="<?= base_url('Member/daftar_member')?>">
            <div class="modal-body">
                <input type="hidden" id="id" name="id">
                <div class="form-group row">
                    <label for="Jenis Member" class="col-sm-4 col-form-label">Jenis Member</label>
                    <div class="col-sm-8">
                        <select name="jenis_member" id="jenis_member" class="form-control">
                            <?php foreach ($jenis_member as $value) { ?>
                            <option value="<?= $value->id ?>"><?= $value->deskripsi ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>