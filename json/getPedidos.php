<?php
session_start();
include "../includes/Mysql.php";
$mysql = new Mysql();
$mysql->dbConnect();


$sqlPedido = "SELECT p.id, p.id_cliente, p.data_entrega, p.valor_pedido,
              p.valor_frete, p.horario, p.local_entrega
            FROM pedidos p
            ORDER BY p.id";
    // echo $sqlCategoria;
$result = $mysql->selectFreeRun($sqlPedido);
while($consulta = mysqli_fetch_array($result)) {
    $arrayPedido[] = array(
        "idPedido"        => $consulta[id],
        "idCliente"       => $consulta[id_cliente],
        "dataEntrega"     => $consulta[data_entrega],
        "valorPedido"     => $consulta[valor_pedido],
        "valorFrete"      => $consulta[valor_frete],
        "horario"         => $consulta[horario],
        "localEntrega"    => $consulta[local_entrega]
    );
}
$array ["data"] = $arrayPedido;
echo json_encode ($array);

?>

