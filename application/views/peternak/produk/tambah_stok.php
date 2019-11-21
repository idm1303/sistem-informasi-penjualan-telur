<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahstok-<?= $id; ?>">
    <i class="fa fa-plus"></i> Tambah
</button>

<div class="modal fade" id="tambahstok-<?= $id; ?>">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title">TAMBAH STOK PRODUK</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <?= form_open(base_url('peternak/produk/tambah_stok/'.$id)) ?>
            <div class="col-1"></div>
            <div class="col-3">
                <?php 
                    $data = array(
                            'type'  => 'number',
                            'name'  => 'stok',
                            'id'    => 'stok',
                            'value' => '0',
                            'class' => 'form-control'
                    );
                    echo form_input($data);
                ?>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Tutup</button>
            <button type="submit" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</button>
            <?= form_close() ?>
        </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->