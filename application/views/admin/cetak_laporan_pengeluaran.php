<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Pengeluaran</title>
</head>
<body>
    <h2 style="text-align: center">Sistem Keuangan Pesantren</h2>
    <h4 style="text-align: center">Laporan Pengeluaran</h4>
    <h3>Laporan Pengeluaran</h3>
    Keterangan:</br>
    <?php if($tgl1 !="" && $tgl2 !=""){?>
    Dari Tanggal  : <?= $tgl1;?></br>
    Sampai Tanggal : <?= $tgl2;?>
    <?php }else if($tgl1 !=""){ ?>
    Dari Tanggal  : <?= $tgl1;?>
    <?php }else if($tgl2 !=""){ ?>
    Sampai Tanggal : <?= $tgl2;?>
    <?php }else{ ?>
    Semua Data
    <?php } ?>
    </br></br>
    <table style="border-collapse: collapse;" border="1" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pengeluaran</th>
                <th>Nama Barang</th>
                <th>Hara Satuan</th>
                <th>Jumlah</th>
                <th>Subtotal</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $total=0; $no=1; foreach ($laporan_pengeluaran as $key): ?>
                
            <tr class="odd gradeX">
                <td><?= $no++?></td>
                <td><?= $key->id_pengeluaran?></td>
                <td><?= $key->nama_barang?></td>
                <td><?= 'Rp. '.number_format($key->harga_satuan).',-'?></td>
                <td><?= $key->jumlah?></td>
                <td><?= 'Rp. '.number_format($key->subtotal).',-'?></td>
                
            </tr>
            <?php
            $total=$total+$key->subtotal;
             endforeach ?>
            <tr>
                <td colspan="5">Total</td>
                <td><?= 'Rp. '.number_format($total).',-'?></td>
            </tr>
        </tbody>
    </table>

<script type="text/javascript">
    window.print();
</script>
</body>
</html>