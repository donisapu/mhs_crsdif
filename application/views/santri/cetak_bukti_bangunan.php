<!DOCTYPE html>
<html>
<head>
	<title>Bukti Ansuran Bangunan</title>
</head>
<body>
	<h3 style="text-align: center">Bukti Angsuran Bangunan</h3>
	<span style="text-align: center">Sistem Keuanan Pesantren</span>
<hr>
		<table style="border-collapse: collapse;" border="1" width="100%">
		<tbody>
		    <tr>
		        <td>Tanggal Bayar</td>
		        <td> : </td>
		        <td><?= $detail_bangunan->tgl_bayar?></td>
		    </tr>
		    <tr>
		        <td>Kode Santri</td>
		        <td> : </td>
		        <td><?= $detail_bangunan->id_santri?></td>
		    </tr>
		    <tr>
		        <td>Nama Santri</td>
		        <td> : </td>
		        <td><?= $detail_bangunan->nama_santri?></td>
		    </tr>
		    <tr>
		        <td>ID Pembayaran</td>
		        <td> : </td>
		        <td><?= $detail_bangunan->id_pembayaran_bangunan?></td>
		    </tr>
		    <tr>
		        <td>Nominal Angsur</td>
		        <td> : </td>
		        <td><?= 'Rp. '.number_format($detail_bangunan->nominal_angsur).',-'?></td>
		    </tr>
		    <tr>
		        <td>Sisa Angsuran</td>
		        <td> : </td>
		        <td><?= $detail_bangunan->sisa_angsuran?></td>
		    </tr>
		    
		</tbody>
		</table>
<script type="text/javascript">
	window.print();
</script>
</body>
</html>