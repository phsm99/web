<?php

if (!empty($_GET['acao'])) {
    $acao = $_GET['acao'];

    //criar conexao com banco
    include('config.php');

    //listar musicas
    if ($acao == "listar_musicas") {
        $sql_musicas = "SELECT msc.Id,msc.Nome,msc.DataLancamento,msc.Duracao,msc.FotoDeCapa,gnr.Nome as Genero ,cnt.Nome as Cantor
        from musica msc
        inner join genero gnr on gnr.Id = msc.GeneroId
        inner join cantor cnt on cnt.Id = msc.CantorId
        order by 1;";

        $query_musicas = mysqli_query($conexao, $sql_musicas);

        if ($query_musicas) {
            $musicas = [];
            while ($dados = mysqli_fetch_array($query_musicas)) {
                $id = $dados['Id'];
                $nome = $dados['Nome'];
                $dataLancamento = $dados['DataLancamento'];
                $duracao = $dados['Duracao'];
                $fotoDeCapa = $dados['FotoDeCapa'];
                $genero = $dados['Genero'];
                $cantor = $dados['Cantor'];

                array_push($musicas, ['Id' => $id, 'Nome' => $nome, 'DataLancamento' => $dataLancamento, 'Duracao' => $duracao, 'FotoDeCapa' => $fotoDeCapa, 'Genero' => $genero, 'Cantor' => $cantor]);
            }

            echo json_encode($musicas);
        } else {
            echo 0;
        }
    } else if ($acao == "inserir_musicas") {

        $nome = $dados['nome'];
        $preco = $dados['preco'];
        $descricao = $dados['descricao'];
        $url_img = $dados['url_img'];

        $sql_inserir = "INSERT INTO musicas (nome,url_img,preco,descricao,id_cat)"
            . "values($nome,$url_img,$preco,$descricao,1)";
        $query_inserir = mysqli_query($conexao, $sql_inserir);
        if ($query_inserir) { } else {
            echo 0;
        }
    } else if ($acao == "excluir_musicas") {
        if (!empty($_GET['id'])) {
            $id_apagar = $_GET['id'];
            $sql_excluir = "DELETE FROM musica WHERE id=" . $id_apagar . ";";
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
