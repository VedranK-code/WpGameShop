<?php
session_start();
error_reporting(0);
include('spoj.php');

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = mysqli_query($spoj, "select id, uloga, ime, prezime from korisnici where k_ime='$username' && lozinka='$password' ");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        $_SESSION['id'] = $ret['id'];
        $_SESSION['ime'] = $ret['ime'];
        $_SESSION['prezime'] = $ret['prezime'];
		$uloga = $ret['uloga'];
        
		if ($uloga == "administrator") {
			header('location:ispis.html');
		} else {
			header('location:../ShopLoggedIn.html');
		}

    } else {
        echo '<script>alert("Wrong username or password.")</script>';
    }
}
?>
