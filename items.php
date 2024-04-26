<?php
include('C:\xampp\htdocs\GameShop\Baza\spoj.php'); 

$query = "SELECT * FROM proizvodi";
$result = mysqli_query($spoj, $query);

if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
    echo '<div class="item">';
    echo '<h2>' . $row['proizvod'] . '</h2>';
    echo '<h3>' . $row['Platforma'] . '</h3>';
    echo '<img src="' . $row['img'] . '" alt="' . $row['proizvod'] . ' Image" height="250" width="250">';
    echo '<p>' . $row['opis'] . '</p>';
    echo '<h3>€' . $row['cijena'] . '</h3>';
    echo '<button class="button disabled-button" onclick="addItem(' . $row['id'] . ', \'' . $row['proizvod'] . '\', \'' . $row['Platforma'] . '\', ' . $row['cijena'] . ')">Add to Cart</button>';
    echo '</div>';
  }
} else {
  echo "No games available.";
}
?>
