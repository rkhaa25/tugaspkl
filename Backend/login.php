<?php 
session_start();
require 'function.php';

// jika tombol login ditekan
if( isset($_POST['login']) ) {

	// cek login
	// cek usernamenya dulu
	
	$username = $_POST['username'];
	$password = $_POST['password'];
	$cek_username = mysqli_query($conn, "SELECT * FROM login WHERE username = '$username'");

	if( mysqli_num_rows($cek_username) === 1 ) {
		$row = mysqli_fetch_assoc($cek_username);
		// cek password
		if( $password === $row['password']) {
			$_SESSION ['login'] = true;
			header('Location: index.php');
			exit();
		}
	}
	
	$error = true;

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
</head>
<body>
<h1>Login</h1>

<?php if( isset($error) ) : ?>
		<p>username / password salah!</p>
<?php endif; ?>

<form action="" method="POST">
    <ul>
        <li>
            <label for="username">Username :</label>
            <input type="text" name="username" required>
        </li>
        <li>
            <label for="password">Password :</label>
            <input type="password" name="password" required>
        </li>
        <li>
            <button type="submit" name="login">Login</button>
            <a href="#">Registrasi</a>
        </li>
    </ul>
</form>
</body>
</html>