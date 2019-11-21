var item_musica = function (id, nome, datalancamento, duracao, cantor, genero, imagem) {
    var html = `<div id='musica_${id}' class='col-md-3'>`;
    html += "       <div class='card' style='width: 18rem;'>";
    html += `           <img src="./cd_cover.png" class="card-img-top" alt="...">`;
    html += `               <div class="card-body">`;
    html += `                   <h5 class="card-title">${nome}</h5>`;
    html += `                   <p class="card-text">Cantor: ${cantor}</p>`;
    html += `                   <p class="card-text">Gênero: ${genero}</p>`;
    html += `                   <p class="card-text">Data Lançamento: ${datalancamento}</p>`;
    html += `                   <p class="card-text">Duração: ${duracao} segundos</p>`;
    html += `                   <button type="button" onclick="delete_musica(${id})" class="btn btn-danger">Apagar</button>`;
    html += `               </div>`;
    html += `       </div>`;
    html += `   </div>`;

    return html;
}

var item_genero = function (id, nome) {
    var html = `<tr id="genero_${id}">`;
    html += `       <th scope='row'>${id}</th>`;
    html += `       <td>${nome}</td>`;
    html += `       <td><button type="button" onclick="delete_genero(${id})" class="btn btn-danger">Apagar</button></td>`;
    html += `   </tr>`;
    return html;
}



function delete_musica(id) {

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            var dado = JSON.parse(xhr.responseText);
            if (dado == 1) {
                document.getElementById('musica_' + id).remove();

            }
            else {
                alert('erro ao deletar item');
            }
        }
    };

    xhr.open('GET', 'musica.php?acao=excluir_musicas&id=' + id);
    xhr.send();

}

function delete_genero(id) {

    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4) {
            var dado = JSON.parse(xhr.responseText);
            if (dado == 1) {
                document.getElementById('genero_' + id).remove();

            }
            else {
                alert('erro ao deletar item');
            }
        }
    };

    xhr.open('GET', 'genero.php?acao=excluir_generos&id=' + id);
    xhr.send();

}


function EnviarProduto() {
    const nome = $('#nome')[0].value;
    const imagem = $('#imagem')[0].value;
    const descricao = $('#descricao')[0].value;
    const preco = $('#preco')[0].value;

    if (nome === '' || imagem === '' || descricao === '' || preco === '') {
        alert('favor preencher todos os campos!!');
        return;
    }

    xhr.open('GET', 'service.php?acao=inserir_produtos&id=' + id);



}