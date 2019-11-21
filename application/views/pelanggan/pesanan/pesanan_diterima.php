<button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#pesanan-<?= $id; ?>">
    <i class="fa fa-edit"></i> Konfirmasi Pesanan
</button>

<div class="modal fade" id="pesanan-<?= $id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">KONFIRMASI PESANAN</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="callout callout-warning">
                <h4>Peringatan!</h4>
                Apakah pesanan anda telah sampai? <br>
                Jika telah sampai silahkan konfirmasi kepada peternak.
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            <a href="<?= base_url('profil_pelanggan/pesanan/diterima/'.$row['kode_transaksi']) ?>" class="btn btn-warning"><i class="fa fa-edit"></i> Ya, Pesanan Telah Sampai</a>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->