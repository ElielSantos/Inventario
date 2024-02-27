<?php
if(isset($_GET["id"])) {
    $id = $_GET["id"];

$servername = "localhost";
$username = "root";
$password = "";
$database = "Inventario";

// Criar a conexão
$connection = new mysqli($servername, $username, $password, $database);

$sql = "DELETE FROM Maquinas WHERE id=$id";
$connection->query($sql);

header("location: /inventario/api/index.php");
        exit;


}
?>