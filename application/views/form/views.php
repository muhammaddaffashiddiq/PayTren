<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
	<div class="container ">
	<table class="table table-bordered table-striped table-hover">
		<tr><!--td ke ssamping tr kebawah-->
		Belum memiliki akun?<a href="http://localhost/Tugas/index.php/User/add"> Daftar</a>
			<td>id</td>
			<td>username</td>
			<td>password</td>
			<td>fullname</td>
			<td>levels</td>
			<td>Masukkan Id yg Akan Dihapus<form action="http://localhost/Tugas/index.php/User/delete2" method="post">
						<input type="text" name="id">
						<input type="submit" name="submit" value="kirim">
					</form></td>
			<td>Masukkan Id yg Akan Diupdate<form action="http://localhost/Tugas/index.php/User/update2" method="post">
						<input type="text" name="id">
						<input type="submit" name="submit" value="kirim">
					</form></td>
		</tr>

		<?php foreach ($isi->result() as $key ): ?><!--variabel isi dihasilkan kemudian ditampung di $key foreach digunakan apabila ada data di dalam database maka akan di tampilkan / akan ngloop ampai data ditampilkan semua-->
				<tr>

					<td><?php echo $key->id ?></td>
					<td><?php echo $key->username ?></td>
					<td><?php echo $key->password ?></td>
					<td><?php echo $key->fullname ?></td>
					<td><?php echo $key->level ?></td>
					<td><a href="http://localhost/Tugas/index.php/User/delete/<?php echo $key->id ?>">Delete</td>
					<td><a href="http://localhost/Tugas/index.php/User/update/<?php echo $key->id ?>">Update</td>
				</tr>
		<?php endforeach ?>

	</table>
	</div><br/><br/>
</body>
</html>