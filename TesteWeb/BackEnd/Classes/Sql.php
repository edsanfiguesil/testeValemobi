<?php
    require_once('Conexao.php');
    class Sql{
        private $sql, $con, $conexao;
        private $datas;

        public function __construct($sp){
            $this->sql = $sp;

            //Realiza a conexão com o banco de dados, chamando o método 'conectar()' da classe 'Conexao'
            $this->con = new Conexao();
            $this->conexao = $this->con->conectar();

            //Executa o método 'executeInDb()'
            $this->executeInDb();
        }

        private function executeInDb(){
            try{
                $acao = $this->conexao->prepare($this->sql);
                $acao->execute();
                $this->datas = $acao->fetchAll();
                //$this->datas = array("Eduardo", "Juliano", "Miguel");
            }catch(Exception $e){
                array_push($datas, "Ocorreu um erro no sistema!");
            }finally{
                unset($this->con);
                unset($this->conexao);
            }
        }

        public function __toString(){
            return json_encode($this->datas);
        }

        public function __destruct(){
            unset($this->con);
            unset($this->conexao);
        }

    }
?>