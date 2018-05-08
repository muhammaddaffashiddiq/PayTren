<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php foreach ($isi->result() as $key): ?>
		<form action="http://localhost/Tugas/index.php/User/gantikan/<?php echo $key->id ?>" method="post">

			<center><input type="text" name="username" placeholder="username"></center><br>
			<center><input type="text" name="password" placeholder="password"></center><br>
			<center><input type="text" name="fullname" placeholder="fullname"></center><br>
			<center><input type="text" name="level" placeholder="level"></center><br>
			<center><input type="submit" value="save"></center>

		</form>
	<?php endforeach ?>
	
</body>
</html>

