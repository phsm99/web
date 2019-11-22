<?php

if (!empty($_GET['acao'])) {
    $acao = $_GET['acao'];

    //criar conexao com banco
    include('config.php');

    //listar cantor
    if ($acao == "listar_cantores") {
        $sql_cantor = "SELECT * from cantor order by Id;";

        $query_cantor = mysqli_query($conexao, $sql_cantor);

        
        if ($query_cantor) {
            $cantor = [];
            while ($dados = mysqli_fetch_array($query_cantor)) {
                $id = $dados['Id'];
                $nome = $dados['Nome'];
                array_push($cantor, ['Id' => $id, 'Nome' => $nome]);
            }

            echo json_encode($cantor);
        } else {
            echo 0;
        }
    } else if ($acao == "inserir_cantor") {

        $nome = $dados['nome'];
        $preco = $dados['preco'];
        $descricao = $dados['descricao'];
        $url_img = $dados['url_img'];

        $sql_inserir = "INSERT INTO cantor (nome,url_img,preco,descricao,id_cat)"
            . "values($nome,$url_img,$preco,$descricao,1)";
        $query_inserir = mysqli_query($conexao, $sql_inserir);
        if ($query_inserir) { } else {
            echo 0;
        }
    } else if ($acao == "excluir_cantor") {
        if (!empty($_GET['id'])) {
            $id_apagar = $_GET['id'];
            $sql_excluir = "DELETE FROM cantor WHERE id=" . $id_apagar . ";";
            $query_apagar = mysqli_query($conexao, $sql_excluir);
            if ($query_apagar) {
                echo 1;
            } else {
                echo 0;
            }
        } else {
            echo 0;
        }
    } else {
        echo 0;
    }
} else {
    echo 0;
}
