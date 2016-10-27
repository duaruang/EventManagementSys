<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Memo <?php echo $perihal; ?></title>
</head>
<body>
<div class="container" style="padding: 10px;">
<div class="logo-pdf">
	
</div>

<div id="title-kop">
	<h2 style="font-style: italic;text-align: center;">Memorandum</h2>
	<hr>
	<table cellspacing="0" width="100%" style="border:0;">
		<tr>
			<td width="160">No. Memo</td>
			<td width="15">:</td>
			<td style="text-align: left;"><?php echo $nomor_memo; ?></td>
		</tr>
		<tr>
			<td>Kepada</td>
			<td>:</td>
			<td style="text-align: left;">Divisi Pusat Pendidikan &amp; Pelatihan</td>
		</tr>
		<tr>
			<td>Tanggal</td>
			<td>:</td>
			<td style="text-align: left;"><?php echo tgl_indo_tanpa_detik($tanggal_dibuat); ?></td>
		</tr>
		<tr>
			<td>Perihal</td>
			<td>:</td>
			<td style="text-align: left;"><?php echo $perihal; ?></td>
		</tr>
		<tr>
			<td valign="top">Lampiran</td>
			<td valign="top">:</td>
			<td style="text-align: left;">Daftar Peserta <br> rencana Anggaran</td>
		</tr>
	</table>
	<hr>
</div> 

<div id="content" style="height: 550px;font-size: 12px;">
	<p>Dengan Hormat,</p>
	<p>Sehubungan dengan peningkatan kompetensi sumber daya manusia khususnya terkait dengan bisnis di lingkungan perusahaan, maka kami bermaksud mengadakan kegiatan pelatihan <strong><?php echo $nama_event; ?></strong> dengan topik <strong><?php echo $topik_event; ?></strong> dengan sasaran peserta karyawan <strong><?php echo $sasaran; ?></strong> dengan kategori event <strong><?php echo $kategori_event; ?>.</strong></p>
	<p>Adapun kegiatan tersebut akan dilakukan pada tanggal <strong><?php echo tgl_indo_tanpa_detik($start_tanggal_p); ?></strong> bertempat di <strong>(<?php echo $kategori_tmp; ?>) <?php echo $nama_tempat; ?></strong> dan diikuti oleh peserta sebanyak <strong><?php echo $jumlah_peserta; ?> orang</strong>, <?php if($jumlah_pengajar==0){}else{ ?>jumlah Pengajar sebanyak <strong><?php echo $jumlah_pengajar; ?> orang</strong><?php } ?> <?php if($jumlah_panitia==0){}else{ ?> dan jumlah panitia sebanyak <strong><?php echo $jumlah_panitia; ?> orang</strong> <?php } ?> dengan Rencana Anggaran Biaya (RAB) sebesar <strong><?php echo $jumlah_rab; ?></strong> dan biaya tersebut menjadi beban Divisi PPL. </p>
	<p>Demikian, atas pehatian dan kerjasamanya kami ucapkan terima kasih.</p>

	<br><br>
	<p>Hormat Kami,<br>
	PT. Permodalan Nasional Madani (Persero)
	<img src="" >
	<br><br>
	<span><?php echo $nama_pembuat; ?></span><br>
	<span><?php echo $posisi_pembuat; ?></span>
	</p>
</div>



<div class="signatur-footer" style="margin-top:70px;float: right;width: 60%;font-family: "Roboto", sans-serif;">
	<table cellspacing="0" width="100%" style="border:1px solid #000;text-align: center;font-size: 12px;">
		<tr>
			<td style="height: 60px;width: 25%; border: 1px solid #000;"></td>
			<td style="height: 60px;width: 25%; border: 1px solid #000;"></td>
			<td style="height: 60px;width: 25%; border: 1px solid #000;"></td>
			<td style="height: 60px;width: 25%; border: 1px solid #000;"></td>
		</tr>
		<tr>
			<td style="width: 25%;height: 20px; border: 1px solid #000;">AS</td>
			<td style="width: 25%;height: 20px; border: 1px solid #000;"></td>
			<td style="width: 25%;height: 20px; border: 1px solid #000;"></td>
			<td style="width: 25%;height: 20px; border: 1px solid #000;"></td>
		</tr>
	</table>
</div>


<div style="width: 100%;clear: both;"></div>
<div style="margin-top:80px;border:2px dashed #000;padding: 7px 5px;background-color: #eaeaea;font-size: 12px;">Lembar Persetujuan Usulan</div>
<p><strong>Memo : <?php echo $nomor_memo; ?></strong></p>
<table cellspacing="0" width="100%" style="border:1px solid #000;text-align: center;font-size: 12px;">
		<tr>
			<td style="border: 1px solid #000;padding: 5px;" colspan="2">Kolom Persetujuan</td>
			<td style="border: 1px solid #000;padding: 5px;width: 200px;">Kolom Komentar</td>
		</tr>
		<!-- Start Looping -->
		<tr>
			<td rowspan="2" style="border: 1px solid #000;">Divisi Pusat Pendidikan dan Pelatihan</td>
			<td style="border: 1px solid #000;text-align: left;padding: 5px;">Henny Herawaty - Kepala Bagian Support Services</td>
			<td rowspan="2" style="border: 1px solid #000;"></td>
		</tr>
		<tr>
			<td style="border: 1px solid #000;text-align: left;padding: 5px;">
			<input type="checkbox" style="width: 40px;height: 40px;border:1px solid #000;background-color: #fff;vertical-align: middle;"> Setuju <br>
			<input type="checkbox" style="width: 40px;height: 40px;border:1px solid #000;background-color: #fff; vertical-align: middle;"> Tidak Setuju
			</td>
		</tr>
		<!-- Start Looping -->
		<!-- Start Looping -->
		<tr>
			<td rowspan="2" style="border: 1px solid #000;">Divisi Pusat Pendidikan dan Pelatihan</td>
			<td style="border: 1px solid #000;text-align: left;padding: 5px;">Henny Herawaty - Kepala Bagian Support Services</td>
			<td rowspan="2" style="border: 1px solid #000;"></td>
		</tr>
		<tr>
			<td style="border: 1px solid #000;text-align: left;padding: 5px;">
			<input type="checkbox" style="width: 40px;height: 40px;border:1px solid #000;background-color: #fff;vertical-align: middle;"> Setuju <br>
			<input type="checkbox" style="width: 40px;height: 40px;border:1px solid #000;background-color: #fff; vertical-align: middle;"> Tidak Setuju
			</td>
		</tr>
		<!-- Start Looping -->
		<!-- Start Looping -->
		<tr>
			<td rowspan="2" style="border: 1px solid #000;">Divisi Pusat Pendidikan dan Pelatihan</td>
			<td style="border: 1px solid #000;text-align: left;padding: 5px;">Henny Herawaty - Kepala Bagian Support Services</td>
			<td rowspan="2" style="border: 1px solid #000;"></td>
		</tr>
		<tr>
			<td style="border: 1px solid #000;text-align: left;padding: 5px;">
			<input type="checkbox" style="width: 40px;height: 40px;border:1px solid #000;background-color: #fff;vertical-align: middle;"> Setuju <br>
			<input type="checkbox" style="width: 40px;height: 40px;border:1px solid #000;background-color: #fff; vertical-align: middle;"> Tidak Setuju
			</td>
		</tr>
		<!-- Start Looping -->
	</table>
	</div>
</body>
</html>