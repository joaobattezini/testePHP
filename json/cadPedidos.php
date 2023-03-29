<?php
session_start();
header('Content-type: application/json');
include "../includes/Mysql.php";
$mysql = new Mysql();
$mysql->dbConnect();


$idCliente             =      $_REQUEST['idCliente'];
$dataEntrega           =      $_REQUEST['dataEntrega'];
$valorPedido           =      $_REQUEST['valorPedido'];
$valorFrete            =      $_REQUEST['valorFrete'];
$localEntrega          =      $_REQUEST['localEntrega'];
$acao                  =      $_REQUEST['acao'];


if ($acao == 'insert'){
    $sqlDev = "INSERT INTO p_pedidos
               (cliente, data_entrega, valor_pedido, valor_frete, local_entrega)
               VALUES
               ('$idCliente', '$dataEntrega', '$valorPedido', '$valorFrete', '$localEntrega')";
    //  echo $sqlDev;
    if ($mysql->freeRun($sqlDev)) {  
        $msgSuc = 'Pedido cadastrado!';
        $response_array['status'] = 'success';
        $response_array['msg'] = $msgSuc;
//        echo $pwd."<br>";
//        echo ;
    } else {   
        $msgErr = 'Não foi possível cadastrar este Pedido!';
        $response_array['status'] = 'error';
        $response_array['msg'] = $msgErr;
    }
}
else{
    $response_array['status'] = 'error';
    $response_array['msg'] = 'Não foi possível executar nenhuma ação!';
}
$mysql->dbDisconnect();
echo json_encode($response_array);

?>