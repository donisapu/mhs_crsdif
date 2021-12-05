<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Angsuran Pembayaran Bangunan</title>
</head>
<body>
    <h2 style="text-align: center">Sistem Keuangan Pesantren</h2>
    <h4 style="text-align: center">Laporan Angsuran Pembayaran Bangunan</h4>
    <h3>Laporan Pembayaran Bangunan</h3>
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
                <th>ID Pembayaran</th>
                <th>Nama Santri</th>
                <th>Nominal Angsuran</th>
                <th>Penanggung Jawab</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $total=0; $no=1; foreach ($laporan_bangunan as $key){
             if($key->status_bayar_bangunan=='Sudah Bayar'){?>
                
            <tr class="odd gradeX">
                <td><?= $no++?></td>
                <td><?= $key->id_pembayaran_bangunan?></td>
                <td><?= $key->nama_santri?></td>
                <td><?= 'Rp. '.number_format($key->nominal_angsur).',-'?></td>
                <td><?= $key->nama_pengguna?></td>
                
            </tr>
            <?php 
            $total=$total+$key->nominal_angsur;
            } } ?>
            <tr>
                <td colspan="3"> Total </td>
                <td colspan="2"><?= 'Rp. '.number_format($total).',-'?></td>
            </tr>
        </tbody>
    </table>

<script type="text/javascript">
    window.print();
</script>
</body>
</html>