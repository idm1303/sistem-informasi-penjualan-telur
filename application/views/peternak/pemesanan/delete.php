<button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#delete-<?= $id; ?>">
    <i class="fa fa-trash"></i> Hapus
</button>

<div class="modal fade" id="delete-<?= $id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">HAPUS DATA PESANAN</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="callout callout-warning">
                <h4>Peringatan!</h4>
                Yakin ingin menghapus data ini?
                Data yang sudah dihapus tidak dapat dikembalikan.
                <a href="http://getbootstrap.com/javascript/#modals">Bootstrap documentation</a>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            <a href="<?= base_url('peternak/pemesanan/delete_pesanan/'.$id) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Ya, Hapus Data Ini</a>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->