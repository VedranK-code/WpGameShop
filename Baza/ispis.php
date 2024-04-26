<tr>
                <th></th>
                <th>|Item Name|</th>
                <th>|Platform|</th>
                <th>|Description|</th>
                <th>|Amount|</th>
                <th>|Price|</th>
            </tr>

<?php
session_start();
error_reporting(0);
include('spoj.php');
if (strlen($_SESSION['id'] == 0)) {
    header('location:prijava.html');
}

$user_id= $_SESSION['id'];
$query = mysqli_query($spoj, 'SELECT uloga FROM korisnici WHERE id = "'.$user_id.'"');
$row = mysqli_fetch_array($query);
if ($row['uloga'] !== 'administrator') {
    header('location:http://localhost/GameShop/shopLoggedIn.html'); 
    exit(); 
}

$ret = mysqli_query($spoj, "select * from proizvodi");
$cnt = 1;
while ($row = mysqli_fetch_array($ret)) {

?>

    <tr>
        <td><?php echo $cnt; ?></td>
        <td><?php echo $row['proizvod']; ?></td>
        <td><?php echo $row['Platforma']; ?></td>
        <td><?php echo $row['opis']; ?></td>
        <td><?php echo $row['kolicina']; ?></td>
        <td><?php echo $row['cijena']; ?></td>
    </tr>
<?php
    $cnt = $cnt + 1;
}

?>
