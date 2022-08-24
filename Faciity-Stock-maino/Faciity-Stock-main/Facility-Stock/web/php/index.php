<?php
    include ('config.php');
    Mysql ::conectar();
?>
<!DOCTYPE html>
<html>
    <head lang="pt-BR">
        <title>Cadastro de Materiais</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="../css/cadastro.css">
    </head>
    <body>
        <div class="imagem">
            <img class="rodape-imagem" src="../img/stockbot.svg" width="300px">
        </div>
        <?php
                if(isset($_POST['acao']) && $_POST['form'] == 'f_form'){
                    $id = addslashes($_POST['id']);
                    $qtd = addslashes($_POST['qtd']);
                    $nome = addslashes($_POST['nome']); 
                    $descricao = addslashes($_POST['descricao']);
                    $valor = addslashes($_POST['valor']);

                    if($id == ''){
                    Form::alert('erro','O ID ficou vazio!');
                    }else if ($nome == ''){
                    Form::alert('erro','O Nome ficou vazio!'); 
                    }else{
                        Form::cadastrar($id, $nome, $descricao, $valor, $qtd);
                        Form::alert('erro','Produto ' .$nome. 'cadastrado com sucesso!');
                    }
                }
            ?>
        <form method="post" class="cadastro">
            <div class="conteudos">
                <p>
                    <label for="id"> ID do Material*: </label><br>
                    <input type="number" name="id" id="id" placeholder="id" required class="input">
                </p>
                <p>
                    <label for="nome"> Nome do Material*: </label><br>
                    <input type="text" name="nome" placeholder="nome" size="50" maxlength="70" id="nome" required class="input">
                </p>
                <p>
                    <label for="descricao"> Descrição do Material: </label><br>
                    <input type="text" name="descricao" placeholder="descricao" size="30" maxlength="70" id="descricao" class="input">
                </p>
                <p>
                    <label for="valor"> Valor: </label><br>
                    <input type="number" name="valor" id="valor" placeholder="valor" class="input">
                </p>
                <p>
                    <label for="qtd"> Quantidade: </label><br>
                    <input type="number" name="qtd" id="qtd" placeholder="qtd" class="input">
                </p>
                <p>
                    <input type="submit" name="acao" value="Cadastrar Material" class="botao">
                </p>
                    <input type="hidden" name="form" value="f_form">
            </div>
        </form>
            <footer class="rodape">
                <p>&copy; 2022 Grupo Createc - Uninove</p>
            </footer>
    </body>
</html>