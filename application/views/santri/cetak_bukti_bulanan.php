<!DOCTYPE html>
<html>
<head>
	<title>Bukti Ansuran Bulanan</title>
</head>
<body>
	<h3 style="text-align: center">Bukti Angsuran Bulanan</h3>
	<span style="text-align: center">Sistem Keuanan Pesantren</span>
<hr>
		<table style="border-collapse: collapse;" border="1" width="100%">
		<tbody>
		    <tr>
		        <td>Tanggal Bayar</td>
		        <td> : </td>
		        <td><?= $detail_bulanan->tgl_pembayaran?></td>
		    </tr>
		    <tr>
		        <td>Bulan/Tahun</td>
		        <td> : </td>
		        <td><?= $detail_bulanan->bulan.'/'.$detail_bulanan->tahun ?></td>
		    </tr>
		    <tr>
		        <td>Kode Santri</td>
		        <td> : </td>
		        <td><?= $detail_bulanan->id_santri?></td>
		    </tr>
		    <tr>
		        <td>Nama Santri</td>
		        <td> : </td>
		        <td><?= $detail_bulanan->nama_santri?></td>
		    </tr>
		    <tr>
		        <td>ID Pembayaran</td>
		        <td> : </td>
		        <td><?= $detail_bulanan->id_detail_pembayaran_bulanan?></td>
		    </tr>
		    <tr>
		        <td>Nominal Bayar</td>
		        <td> : </td>
		        <td><?= 'Rp. '.number_format($detail_bulanan->nominal_bayar).',-'?></td>
		    </tr>
		    <tr>
		        <td>Status Bayar</td>
		        <td> : </td>
		        <td><?= $detail_bulanan->status_bayar_bulanan?></td>
		    </tr>
		    
		</tbody>
		</table>
<script type="text/javascript">
	window.print();
</script>
</body>
</html>