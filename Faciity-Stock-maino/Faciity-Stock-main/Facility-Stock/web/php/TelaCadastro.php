 <?php
            include('config.php');
            Mysql ::conectar();

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