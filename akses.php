<a href=?p=akses&aksi=list class="btn btn-danger">List Akses Masuk</a>
<?php
include ("koneksi.php");
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
	case 'list' :
?>

<h2>List Akses Masuk</h2>
<table class="table table-striped">
	<tr>
		<th>No</th>
		<th>ID User</th>
		<th>Nama</th>
		<th>Suhu</th>
		<th>Access</th>
		<th>Tanggal</th>
		<?php 
		if($_SESSION['level']=='administrator'){
			echo "<th>Aksi</th>";
		}
		?>
	</tr>
	<?php
	
	$no=1;
	$t=mysqli_query($koneksi,"SELECT * FROM akses order by tanggal ASC");
	while ($data=mysqli_fetch_array($t)) {
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $data['id_user']; ?></td>
		<td><?php echo $data['nama']; ?></td>
		<td><?php echo $data['suhu']; ?></td>
		<td><?php echo $data['access']; ?></td>
		<td><?php echo $data['tanggal']; ?></td>
		<?php 
		if($_SESSION['level']=='administrator'){
		?>
		<td>
			<a href="aksi_akses.php?page=akses&proses=hapus&id=<?php echo $data['id']; ?>">Hapus</td> </a>
		<?php
			}
		?>
	</tr>
	<?php
		$no++;
	}
	?>
</table>
<?php
	break;
}
?>