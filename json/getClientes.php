<?php
session_start();
include "../includes/Mysql.php";
$mysql = new Mysql();
$mysql->dbConnect();


$sqlCliente = "SELECT c.id, c.nome
            FROM p_clientes c
            ORDER BY c.nome";

// echo $sqlCliente;
$result = $mysql->selectFreeRun($sqlCliente);
while($consulta = mysqli_fetch_array($result)) {
    $arrayCliente[] = array(
        "cliente"     => $consulta[id],
        "nmcliente"    => $consulta[nome]
    );
}
$array ["data"] = $arrayCliente;
echo json_encode ($array);

?>