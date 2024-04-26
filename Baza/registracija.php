<?php
session_start();
error_reporting(0);
include('spoj.php');

if (isset($_POST['register'])) {
    $fname = $_POST['name'];
    $lname = $_POST['lname'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $email = $_POST['email']; 

    $query = mysqli_query($spoj, "SELECT id FROM korisnici WHERE k_ime='$username'");
    $ret = mysqli_fetch_array($query);
    if ($ret > 0) {
        echo '<script>alert("Korisnicko ime zauzeto!")</script>';
    } else {
        $query = mysqli_query($spoj, 'INSERT INTO korisnici (ime, prezime, k_ime, lozinka, uloga, email) VALUES("' . $fname . '", "' . $lname . '", "' . $username . '", "' . $password . '", "kupac", "' . $email . '")');
        $query2 = mysqli_query($spoj, 'SELECT id FROM korisnici WHERE k_ime="' . $username . '"');
        if ($query) {
            $ret = mysqli_fetch_array($query2);
            $_SESSION['id'] = $ret['id'];
            header('location:../ShopLoggedIn.html');
        } else {
            echo '<script>alert("Greška kod registracije")</script>';
        }
    }
}
?>

