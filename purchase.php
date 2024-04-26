<?php
session_start();
error_reporting(0);
include('./Baza/spoj.php'); 

$data = json_decode(file_get_contents('php://input'), true);

foreach ($data as $item) {
  $itemName = $item['name'];
  $itemPrice = $item['price'];
  $itemId = $item['id'];
  $ime_i_prezime=$_SESSION['ime'] . ' ' . $_SESSION['prezime'];
  
  
  $query1 = "UPDATE proizvodi SET kolicina = kolicina - 1 WHERE id = $itemId";
  $result1 = mysqli_query($spoj, $query1);

  $query2 = "INSERT INTO `racuni`(`proizvod`, `cijena`, `ime_I_prezime`) VALUES ('$itemName','$itemPrice', '$ime_i_prezime')";
  $result2 = mysqli_query($spoj, $query2);
}

$response = ['success' => true];
echo json_encode($response);
?>
