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
    
    <div class="cetak">
        <h1>Info Ternak <?= $info['nama_peternakan']; ?></h1>
        <table class="table table-borderless">
            <thead>
                <tr>
                    <th  width="25%">NAMA PEMILIK</th>
                    <th>: <?= $info['nama']; ?></th>
                </tr>       
            </thead>
            <tbody> 
                <tr>
                    <td>Rekening</td>
                    <td>: <?= $info['no_rek']; ?> - Bank (<?= $info['nama_bank']; ?>)</td>
                </tr>
                <tr>
                    <td>Telepon</td>
                    <td>: <?= $info['telepon']; ?></td>
                </tr>     
                <tr>
                    <td>Alamat</td>
                    <td>: <?= $info['alamat']; ?></td>
                </tr>    
            </tbody>
        </table>
    </div>
</body>
</html>