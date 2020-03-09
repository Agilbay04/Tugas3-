<!-- 
/*
| -------------------------------------------------------------------
| MEMBUAT VIEW V_tampil.php
| -------------------------------------------------------------------
| Gunananya untuk menampilkan data dari database agar bisa dilihat 
| user
*/
 -->
<!DOCTYPE html>
<html>
<head>
	<title>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</title>
</head>
<body>
	<center><h1>Membuat CRUD dengan CodeIgniter | MalasNgoding.com</h1></center>
	<!-- 
	/*
	| -------------------------------------------------------------------
	| FUNGSI anchor()
	| -------------------------------------------------------------------
	| Gunananya untuk membuat hyperlink, jadi pada parameter pertama 
	| di function anchor() letakkan link tujuan, dan pada parameter kedua 
	| letakkan text yang akan dimunculkan 
	*/
	 -->
	<center><?php echo anchor('Crud/tambah','Tambah Data'); ?></center>
	<table style="margin:20px auto;" border="1">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Alamat</th>
			<th>Pekerjaan</th>
			<th>Action</th>
		</tr>
		<?php 
		$no = 1;
		foreach($user as $u){ 
		?>
		<tr>
			<td><?php echo $no++ ?></td>
			<td><?php echo $u->nama ?></td>
			<td><?php echo $u->alamat ?></td>
			<td><?php echo $u->pekerjaan ?></td>
			<td>
			    <?php echo anchor('Crud/edit/'.$u->id,'Edit'); ?>
                <?php echo anchor('Crud/hapus/'.$u->id,'Hapus'); ?>
			</td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>