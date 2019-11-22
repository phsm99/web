<?php

if (!empty($_GET['acao'])) {
    $acao = $_GET['acao'];

    //criar conexao com banco
    include('config.php');

    //listar genero
    if ($acao == "listar_generos") {
        $sql_genero = "SELECT * from genero order by Id;";

        $query_genero = mysqli_query($conexao, $sql_genero);

        if ($query_genero) {
            $genero = [];
            while ($dados = mysqli_fetch_array($query_genero)) {
                $id = $dados['Id'];
                $nome = $dados['Nome'];
                array_push($genero, ['Id' => $id, 'Nome' => $nome]);
            }

            echo json_encode($genero);
        } else {
            echo 0;
        }
    } else if ($acao == "inserir_genero") {

        $nome = $dados['nome'];
        $preco = $dados['preco'];
        $descricao = $dados['descricao'];
        $url_img = $dados['url_img'];

        $sql_inserir = "INSERT INTO genero (nome,url_img,preco,descricao,id_cat)"
            . "values($nome,$url_img,$preco,$descricao,1)";
        $query_inserir = mysqli_query($conexao, $sql_inserir);
        if ($query_inserir) { } else {
            echo 0;
        }
    } else if ($acao == "excluir_generos") {
        if (!empty($_GET['id'])) {
            $id_apagar = $_GET['id'];
            $sql_excluir = "DELETE FROM genero WHERE id=" . $id_apagar . ";";
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
