<?php
    require_once("Classes/Sql.php");
    class ControleAcesso{
        
        public function __construct($param, $acao){
            /*
                **Se $acao='S'... chama o método list_all(), responsável por buscar/listar os registros;
                **Se $acao='I'... chama o método insert(), responsável por inserir um novo registro;
                **Se $acao='U'... chama o método update(), responsável por atualizar um registro existente;
                **Se $acao='D'... chama o método delete(), responsável por excluir um registro existente;
            */
            switch($acao){
                case 'S':
                    $this->list_all($param[0]);
                    break;
                case 'L':
                    $this->login($param);
                    break;
                case 'I':
                    $this->insert($param);
                    break;
                case 'U':
                    $this->update($param);
                    break;
                case 'D':
                    $this->delete($param[0]);
                    break;
                
            }
            
        }
        private function list_all($param = ""){
            try{
                $dados = json_decode(new Sql("CALL stored_procedure_que_retorna_os_resultados('".$param."')"));
                
                $total = count($dados);
                echo "<h5>Total de Registros: $total</h5>";
                foreach ($dados as $value) {
                    echo "";
                }
            }catch(Exception $e){
                echo "$e";
            }
        }

        private function login($param = array()){
            try{
                $dados = json_decode(new Sql("CALL sp_login('".$param[0]."', '".$param[1]."')"));
                //var_dump($dados);
                
                $total = count($dados);
                //echo "<h5>Total de Registros: $total</h5>";
                if ($total > 0){
                    session_start();
                    foreach ($dados as $value) {
                        $_SESSION['id'] = $value->ID;
                        $_SESSION['nome'] = $value->NOME;
                        $_SESSION['email'] = base64_decode($value->EMAIL);
                        $_SESSION['ativo'] = $value->ATIVO;
                    }
                    echo "true";
                }else{
                    echo "Não foi localizado usuário com o e-mail e senha informado!!";
                }
            }catch(Exception $e){
                echo "$e";
            }
        }

        private function insert($values = array()){
            $dados = json_decode(new Sql("SELECT func_insert_login('".$values[0]."', '".$values[1]."', '".$values[2]."') AS MENSAGEM"));
            foreach ($dados as $value) {
                echo $value->MENSAGEM;
            }
        }

        private function update($values = array()){
            $dados = json_decode(new Sql("SELECT funcao_que_exeuta_o_update('".$values[0]."','".$values[1]."', '".$values[2]."') AS MENSAGEM"));
            foreach ($dados as $value) {
                echo $value->MENSAGEM;
            }
        }

        private function delete($id){
            $dados = json_decode(new Sql("SELECT funcao_que_exeuta_o_update(0, $id) AS MENSAGEM"));
            foreach ($dados as $value) {
                echo $value->MENSAGEM;
            }
        }

    }
?>