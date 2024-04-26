<?php
    session_start();
    error_reporting(0);
    include('spoj.php');
    if (strlen($_SESSION['id'] == 0)) {
        header('location:prijava.html');
    }

    $user_id = $_SESSION['id'];
    $query = mysqli_query($spoj, 'SELECT uloga FROM korisnici WHERE id = "'.$user_id.'"');
    $row = mysqli_fetch_array($query);
    if($row['uloga'] == 'kupac'){
        header('location:ispis.html');
    }


    if (isset($_POST['submit'])) {
        $naziv = $_POST['proizvod'];
        $cijena = $_POST['cijena'];
        $kolicina = $_POST['kolicina'];
        $opis = $_POST['opis'];
        $platforma = $_POST['platforma']; 
        $img = $_POST['img']; 

        $query = mysqli_query($spoj, 'INSERT INTO proizvodi (proizvod, opis, kolicina, cijena, Platforma, img) VALUES("'.$naziv.'", "'.$opis.'", "'.$kolicina.'", "'.$cijena.'", "'.$platforma.'", "'.$img.'")');
        if ($query) {
            header('location:unos.html');
        } else {
            echo '<script>alert("Error")</script>';
        }
    }

    $id = $_SESSION['id'];
    $ret = mysqli_query($spoj, "select * from korisnici where id='$id'");
    $row = mysqli_fetch_array($ret);
?>
