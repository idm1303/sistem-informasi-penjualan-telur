<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#info-<?= $id; ?>">
    <i class="fa fa-info"></i>&nbsp; Info Ternak
</button>

<div class="modal fade" id="info-<?= $id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">INFO PETERNAKAN</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="callout callout-info">
                <h4><?= $row['nama_peternakan']; ?></h4>
                <hr>
                <table style="border:0px solid white;">
                    <tr>
                        <td style="border:0px solid white;">Rekening</td>
                        <td style="border:0px solid white;">: <?= $row['no_rek']; ?> (Bank <?= $row['nama_bank']; ?>)</td>
                    </tr>
                    <tr>
                        <td style="border:0px solid white;">Telepon</td>
                        <td style="border:0px solid white;">: <?= $row['telepon']; ?></td>
                    </tr>
                    <tr>
                        <td style="border:0px solid white;">Alamat</td>
                        <td style="border:0px solid white;">: <?= $row['alamat']; ?></td>
                    </tr>
                </table>
                <!-- Pesanan anda telah diterima. <br>
                Menunggu konfirmasi dari pemilik ternak. -->
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            <a href="<?= base_url('profil_pelanggan/pesanan/cetak/'.$row['kd_ternak']) ?>" target="_blank" title="cetak" class="btn btn-success"><i class="fa fa-print"></i> Cetak</a>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->