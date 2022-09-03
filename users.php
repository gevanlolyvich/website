<a href=?p=users&aksi=entri class="btn btn-primary"> Entri Users</a>
<a href=?p=users&aksi=list class="btn btn-danger">List Users</a>
<?php
include ("koneksi.php");
$aksi=isset($_GET['aksi']) ? $_GET['aksi'] : 'list';
switch ($aksi) {
	case 'list' :
?>

<h2>List Users</h2>
<table class="table table-striped">
	<tr>
		<th>No</th>
		<th>ID User</th>
		<th>Nama</th>
		<th>Gender</th>
		<th>Jabatan</th>
		<?php 
		if($_SESSION['level']=='administrator'){
			echo "<th>Aksi</th>";
		}
		?>
	</tr>
	<?php
	
	$no=1;
	$t=mysqli_query($koneksi,"SELECT * FROM users order by nama ASC");
	while ($data=mysqli_fetch_array($t)) {
	?>
	<tr>
		<td><?php echo $no; ?></td>
		<td><?php echo $data['id_user']; ?></td>
		<td><?php echo $data['nama']; ?></td>
		<td><?php echo $data['gender']; ?></td>
		<td><?php echo $data['jabatan']; ?></td>
		<?php 
		if($_SESSION['level']=='administrator'){
		?>
		<td><a href=?p=users&aksi=edit&id=<?php echo $data['id']; ?>>Edit</a> | 
			<a href="aksi_users.php?page=users&proses=hapus&id=<?php echo $data['id']; ?>">Hapus</td> </a>
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
case 'entri' :	
?>

<h2>Entri Users</h2>

<form role="form" class="form-horizontal" method="POST" action="aksi_users.php?page=users&proses=input">
	
	<div class="form-group">
		<label class="col-lg-2 control-label">ID User</label>
		<div class="col-lg-10">
		<input type="text" name="id_user" class="form-control" placeholder="ID User">
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-2 control-label">Nama</label>
		<div class="col-lg-10">
		<input type="text" name="nama" class="form-control" placeholder="Nama">
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-2 control-label">Gender</label>
		<div class="col-lg-10">
		<select name="gender" class="form-control">
			<option value="L">Laki-laki</option>
			<option value="P">Perempuan</option>
		</select>
		</div>
	</div>

	<div class="form-group">
		<label class="col-lg-2 control-label">Jabatan</label>
		<div class="col-lg-10">
		<input type="text" name="jabatan" class="form-control" placeholder="Jabatan">
		</div>
	</div>

	<div class="col-lg-offset-2 col-lg-10">
	<button type="submit" class="btn btn-primary">Simpan</button>
	<button type="reset" class="btn btn-default">Reset</button>
	</div>
</form>
<?php
	break;
case 'edit' :	
$a=mysqli_query($koneksi,"SELECT * FROM users WHERE id=$_GET[id]");
$r=mysqli_fetch_array($a);
?>

<h2>Edit Users</h2>

<form role="form" method="POST" action="aksi_users.php?page=users&proses=update">
	<div class="form-group">
		<div class="form-group">
		<input type="hidden" name="id" value="<?php echo $r['id'];?>" class="form-control" >
	</div>
	<div class="form-group">
		<label>ID User</label>
		<input type="text" name="id_user" value="<?php echo $r['id_user'];?>" class="form-control" >
	</div>

	<div class="form-group">
		<label>Nama</label>
		<input type="text" name="nama" value="<?php echo $r['nama'];?>" class="form-control">
	</div>

	<div class="form-group">
		<label>Gender</label>
		<select name="gender" class="form-control">
			<option value="L" <?= ($r['gender']=='L') ?'selected' : ''?>>Laki-laki</option>
			<option value="P" <?= ($r['gender']=='P') ?'selected' : ''?>>Perempuan</option>
		</select>
	</div>

	<div class="form-group">
		<label>Jabatan</label>
		<input type="text" name="jabatan" value="<?php echo $r['jabatan'];?>" class="form-control">
	</div>

	<button type="submit" class="btn btn-primary">Simpan</button>
	<button type="reset" class="btn btn-default">Reset</button>
</form>
<?php
	break;
}
?>