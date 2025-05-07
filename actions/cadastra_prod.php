<?php

require '../Entity/Produto.php';

if(isset($_POST['nome'])){

    $objProd = new Produto();

    $objProd->nome = $_POST['nome'];
    $objProd->descricao = $_POST['desc'];
    $objProd->quant = $_POST['quant'];
    $objProd->preco = $_POST['preco'];
    $objProd->tipo = $_POST['tipo'];

    $res = $objProd->cadastrar();
    
    if($res){
        $array = ["status" => 200, "msg" => "cadastrado com sucesso!!"];
        echo json_encode($array);
    } else{
        $array = ["status" => 400, "msg" => "ErRoOoOoOo!!"];
        echo json_encode($array);
    }

}else{
    $array = ["msg" => "Não veio nada no POST!!"];
    echo json_encode($array);
}



// $array = ["status" => 200, "msg" => "cadastrado com sucesso!!"];
// echo json_encode($array);

?>