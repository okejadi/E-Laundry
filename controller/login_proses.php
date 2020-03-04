<?php
include_once("config.php");

session_start();
// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['email'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	//echo password_hash("12345", PASSWORD_DEFAULT); // membuat password
	die ('Harap isi kolom e-mail dan password!');
}
// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare("SELECT id_akun, password, nama, level FROM akun WHERE email = ? AND is_active='yes'")) {
	// Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
	$stmt->bind_param('s', $_POST['email']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

	if ($stmt->num_rows > 0) {
	$stmt->bind_result($id, $password, $name, $level);
	$stmt->fetch();
	// Account exists, now we verify the password.
	// Note: remember to use password_hash in your registration file to store the hashed passwords.
	if (password_verify($_POST['password'], $password)) {
		// Verification success! User has loggedin!
		// Create sessions so we know the user is logged in, they basically act like cookies but remember the data on the server.
		session_start();
		session_regenerate_id();
		$_SESSION['loggedin'] = TRUE;
		$_SESSION['name'] = $name;
		$_SESSION['id'] = $id;
		$_SESSION['level'] = $level;
		// echo 'Welcome ' . $_SESSION['name'] . '!';
		// redir to their own dashboard with routing
		header("Location:$working_dir/dashboard");
	} else {
		header('location:?msg=error#login');
		}
	} else {
	header('?login=err');
	}

	$stmt->close();
}
?>