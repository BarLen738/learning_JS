<?php
header("Content-Type: application/json; charset=UTF-8");

/*Si usara el método POST la siguiente línea de código cambia a 
$obj = json_decode($_POST["x"], false);
*/

$obj = json_decode($_GET["x"], false); //convierte la request a un objeto usando la fc json_decode()

$conn = new mysqli("myServer", "myUser", "myPassword", "Northwind");
$stmt = $conn->prepare("SELECT name FROM customers LIMIT ?"); 
$stmt->bind_param("s", $obj->limit);
$stmt->execute();
$result = $stmt->get_result();
$outp = $result->fetch_all(MYSQLI_ASSOC);

//accedió a la BD y llenó un array con lo pedido

echo json_encode($outp); //añade el array a un objeto y lo devuelve como un JSON usando la fc json_encode()
?>