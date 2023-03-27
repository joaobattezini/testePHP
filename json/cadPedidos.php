<?php
session_start();
header('Content-type: application/json');
include "../includes/Mysql.php";
$mysql = new Mysql();
$mysql->dbConnect();


// $idCliente             =      $_REQUEST['idCliente'];
$dataEntrega           =      $_REQUEST['dataEntrega'];
$valorPedido           =      $_REQUEST['valorPedido'];
$valorFrete            =      $_REQUEST['valorFrete'];
$localEntrega          =      $_REQUEST['localEntrega'];
$acao                  =      $_REQUEST['acao'];


if($acao=='delete' and !empty($idAnuncio)) {
    $sqlDev = "UPDATE pedidos SET
                    ativo = 'F'
               WHERE id = $idAnuncio";
    if ($mysql->freeRun($sqlDev)) {
        $response_array['status'] = 'success';
        $response_array['msg'] = 'Pedido desativado!';
    } else {
        $response_array['status'] = 'error';
        $response_array['msg'] = 'Falha ao desativar Pedido!';
    }
    // echo $sqlDev;
}
elseif ($acao == 'insert'){
    $sqlDev = "INSERT INTO pedidos
               (data_entrega, valor_pedido, valor_frete, local_entrega)
               VALUES
               ('$dataEntrega', '$valorPedido', '$valorFrete', '$localEntrega')";
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