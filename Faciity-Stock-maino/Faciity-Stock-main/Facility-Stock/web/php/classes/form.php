<?php

    class form{

        public static function alert($tipo, $mensagem){
            if($tipo == 'erro'){
                echo '<div style="color: red; background: black;">'.$mensagem.'</div>';
                return false;
            } else if($tipo == 'sucesso'){
                echo '<div style="color: green; background: black;">'.$mensagem.'</div>';
                return true;
            }
        }

        public static function cadastrar($id, $nome, $descricao, $valor, $qtd){
         $sql = Mysql::conectar()->prepare("INSERT INTO projeto_estoque (id, nome, descricao, valor, qtd) VALUES (?,?,?,?,?)");
         $sql ->execute(array($id, $nome, $descricao, $valor, $qtd));   
        }
    }

?>