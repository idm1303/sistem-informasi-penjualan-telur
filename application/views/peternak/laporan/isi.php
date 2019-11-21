<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?= $title; ?></title>
    <style type="text/css" media="print">
        body {
            font-family : Arial;
            font-size : 12px;
        }

        .cetak {
            width : 19cm;
            height : 27cm;
            padding : 1cm;
        }
        
        table {
            border : solid thin #000;
            border-collapse : collapse;
        }

        td, th {
            padding : 3mm 6mm;
            text-align : left;
            vertical-align : top;
        }

        th {
            background-color : #f5f5f5;
            font-weight : bold;
        }

        h1 {
            text-align : center;
            font-size : 18px;
            text-transform : uppercase;
        }
    </style>
    <style type="text/css" media="screen">
        body {
            font-family : Arial;
            font-size : 12px;
        }

        .cetak {
            width : 19cm;
            height : 27cm;
            padding : 1cm;
        }
        
        table {
            border : solid thin #000;
            border-collapse : collapse;
        }

        td, th {
            padding : 3mm 6mm;
            text-align : left;
            vertical-align : top;
        }

        th {
            background-color : #f5f5f5;
            font-weight : bold;
        }

        h1 {
            text-align : center;
            font-size : 18px;
            text-transform : uppercase;
        }
    </style>
</head>
<body onload="print()">
    <br><br>
    <div class="cetak">
        <table class="table table-bordered" id="example3">
            <thead>
                <tr>
                    <th style="width:10px;">NO</th>
                    <th style="width:200px;">NAMA PELANGGAN</th>
                    <th style="width:120px;">TANGGAL TRANSAKSI</th>
                    <th>NAMA PRODUK</th>
                    <th>HARGA (per rak)</th>
                    <th>JUMLAH (rak)</th>
                    <th>TOTAL HARGA</th>
                    <th>BIAYA PENGIRIMAN</th>
                    <th style="width:150px;">TOTAL BAYAR</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach( $transaksi as $row ) : ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['nama_pelanggan']; ?></td>
                        <td><?= date('d-M-Y', strtotime($row['tanggal_transaksi'])); ?></td>
                        <td><?= $row['nama_produk']; ?></td>
                        <td>IDR <?= number_format($row['harga'], '0',',','.'); ?>,-</td>
                        <td><?= $row['jumlah']; ?></td>
                        <td>IDR <?= number_format($row['total_harga'], '0',',','.'); ?>,-</td>
                        <td>IDR <?= number_format($row['pengiriman'], '0',',','.'); ?>,-</td>
                        <td>IDR <?= number_format($row['total_bayar'], '0',',','.'); ?>,-</td>
                    </tr>
                <?php endforeach; ?>
                    <tr>
                        <th colspan="8">Jumlah Total Bayar Keseluruhan</th>
                        <th>IDR <?= number_format($jumlah, '0',',','.'); ?>,-</th>
                    </tr>
            </tbody>
        </table>
    </div>
</body>
</html>