<!DOCTYPE html>
<html>
<head>
    <title>Cetak Laporan Pembayaran Bulanan</title>
</head>
<body>
    <h2 style="text-align: center">Sistem Keuangan Pesantren</h2>
    <h4 style="text-align: center">Laporan Pembayaran Bulanan</h4>
    <h3>Laporan Pembayaran Bulanan</h3>
    Keterangan:</br>
    <?php if($bulan !="" && $tahun !=""){?>
    Bulan  : <?= $bulan;?></br>
    Tahun : <?= $tahun;?>
    <?php }else{ ?>
    Semua Data
    <?php } ?>
    </br></br>
    <table style="border-collapse: collapse;" border="1" width="100%">
        <thead>
            <tr>
                <th>No</th>
                <th>Bulan/Tahun</th>
                <th>ID Pembayaran</th>
                <th>Nama Santri</th>
                <th>Nominal Bayar</th>
                <th>Penanggung Jawab</th>
                
            </tr>
        </thead>
        <tbody>
            <?php $total=0; $no=1; foreach ($laporan_bulanan as $key){
             if($key->status_bayar_bulanan=='Sudah Bayar'){?>
                
            <tr class="odd gradeX">
                <td><?= $no++?></td>
                <td><?= $key->bulan.'/'.$key->tahun?></td>
                <td><?= $key->id_detail_pembayaran_bulanan?></td>
                <td><?= $key->nama_santri?></td>
                <td><?= 'Rp. '.number_format($key->nominal_bayar).',-'?></td>
                <td><?= $key->nama_pengguna?></td>
                
            </tr>
            <?php 
            $total=$total+$key->nominal_bayar;
            } } ?>
            <tr>
                <td colspan="4"> Total </td>
                <td colspan="2"><?= 'Rp. '.number_format($total).',-'?></td>
            </tr>
        </tbody>
    </table>

<script type="text/javascript">
    window.print();
</script>
</body>
</html>