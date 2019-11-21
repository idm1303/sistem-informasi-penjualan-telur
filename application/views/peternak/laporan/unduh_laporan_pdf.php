<button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#unduh_laporan">
    <i class="fa fa-download"></i> Unduh Laporan
</button>

<div class="modal fade" id="unduh_laporan">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">LAPORAN TRANSAKSI</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <?= form_open( base_url('peternak/pemesanan/unduh_laporan_pdf/')); ?>
        <div class="modal-body">
            <div class="form-group">
                <label for="laporan_transaksi">Laporan Per</label>
                <select name="laporan_transaksi" id="laporan_transaksi" class="form-control">
                    <option value="">Pilih..</option>
                    <option value="tanggal">Tanggal</option>
                    <option value="bulan">Bulan</option>
                    <option value="tahun">Tahun</option>
                </select>
            </div>
            
            <div class="form-group" id="form_tanggal">
                <label for="tanggal">Tanggal</label>
                <input name="tanggal" value="" id="tanggal" class="form-control">
            </div>
            <div class="form-group" id="form_bulan">
                <label for="bulan">Bulan</label>
                <select name="bulan" id="bulan" class="form-control">
                    <option value="">Pilih..</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                    
                </select>
            </div>
            <div class="form-group" id="form_tahun">
                <label for="tahun">Tahun</label>
                <select name="tahun" id="tahun" class="form-control">
                    <option value="">Pilih..</option>
                    <?php
                        $mulai = date('Y') - 3;
                        for($i = $mulai; $i < $mulai + 10; $i++){
                            $sel = $i == date('Y') ? ' selected="selected"' : '';
                            echo '<option value="'.$i.'">'.$i.'</option>';
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            <button type="submit" class="btn btn-info"><i class="fa fa-download"></i> Unduh</button>
        </div>
        <?= form_close(); ?>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<!-- script jquery -->
<script src="<?= base_url(); ?>assets/template/vendors/jquery/jquery-3.2.1.min.js"></script>
<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>

<script>
    $('#tanggal').datepicker({
        uiLibrary: 'bootstrap4',
        format: "yyyy-mm-dd"
    });

    $('#form_tanggal').hide();
    $('#form_bulan').hide();
    $('#form_tahun').hide();

    // untuk mengambil nilai select
    $(document).ready(function (){
        $('body').on('change','#laporan_transaksi', function() {
        // mengambil nilai
        var hasil = $(this).val();
        // kondisi ongkir
        if ( hasil == 'tanggal' ){
            $('#form_tanggal').show();
            $('#form_bulan').hide();
            $("#bulan").val("");
            $('#form_tahun').hide();
            $("#tahun").val("");
        } else if ( hasil == 'bulan' ) {
            $('#form_tanggal').hide();
            $('#tanggal').val("");
            $('#form_bulan').show();
            $('#form_tahun').show();
        } else if ( hasil == 'tahun' ) {
            $('#form_tanggal').hide();
            $('#tanggal').val("");
            $('#form_bulan').hide();
            $('#bulan').val("");
            $('#form_tahun').show();
        } else {
            $('#form_tanggal').hide();
            $('#tanggal').val("");
            $('#form_bulan').hide();
            $('#bulan').val("");
            $('#form_tahun').hide();
            $('#tahun').val("");
        }

        });  
    });

</script>