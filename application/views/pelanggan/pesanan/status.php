<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#status-<?= $id; ?>">
    <i class="fa fa-info"></i>&nbsp; Status
</button>

<div class="modal fade" id="status-<?= $id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">STATUS PESANAN</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="callout callout-info">
                <?php if ($row['status_pesanan'] == "") { ?>
                    <h4>Menunggu Konfirmasi!</h4>
                    Pesanan anda telah diterima. <br>
                    Menunggu konfirmasi dari pemilik ternak.
                <?php } elseif ($row['status_pesanan'] == "Sedang diproses") { ?>
                    <h4><?= $row['status_pesanan']; ?>!</h4>
                    Pesanan anda sedang diproses. <br>
                    Silahkan tunggu hingga pesanan anda sampai di tujuan!
                <?php } elseif ($row['status_pesanan'] == "Telah diterima") { ?>
                    <h4><?= $row['status_pesanan']; ?>!</h4>
                    Pesanan anda telah sampai di tujuan. <br>
                    Terima kasih karena telah memesan telur di ternak kami.
                <?php } else { ?>
                    <h4>Peringtan!</h4>
                    Sepertinya ada kesalahan dengan pesanan anda. <br>
                    Silahkan hubungi pemilik ternak!
                <?php } ?>
                
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            <!-- <a href="<?= base_url('profil_pelanggan/pesanan/delete/'.$id) ?>" class="btn btn-danger"><i class="fa fa-trash"></i> Ya, Hapus Data Ini</a> -->
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->