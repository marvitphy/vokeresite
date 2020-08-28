<?php 

$conn = new mysqli('localhost', 'root', '', 'vokere');
if ($conn->connect_error) {
  die("Conexão não estabelecida" . $conn->connect_error);
}


?>