<?php
    require_once("Classes/Sql.php");
    class Mercadorias{
        
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
                $dados = json_decode(new Sql("CALL sp_select_mercadorias('".$param."')"));
                
                $total = count($dados);
                echo "<h5>Total de Registros: $total</h5>";
                foreach ($dados as $value) {
                    echo "
                        <div class='col s12 m6'>
                            <div class='card deep-purple darken-4'>
                                <div class='card-content white-text'>
                                    <span class='card-title'>CÓDIGO: ".$value->CODIGO."</span>
                                    <p> CATEGORIA: ".$value->TIPO_DE_MERCADORIA." </p>
                                    <p> DESCRIÇÃO: ".$value->DESCRICAO_DA_MERCADORIA." </p>
                                    <p> ESTOQUE: ".$value->QUANTIDADE." </p>
                                    <p> PREÇO: R$ ".$value->PRECO." </p>
                                    <p> TIPO DE NEGÓCIO: ".$value->TIPO_DE_NEGOCIO." </p>
                                </div>
                                <div class=card-action>
                                    <a href='#modal-cadastro' class='waves-effect waves-light btn deep-purple darken-3 white-text' onclick='chamaEditar(".$value->CODIGO.")'>Editar</a>
                                    <a class='waves-effect waves-light btn deep-purple darken-3 white-text' onclick='delete_mercadoria(".$value->CODIGO.")'>Excluir</a>
                                </div>
                            </div>
                        </div>

                    ";
                }
            }catch(Exception $e){
                echo "$e";
            }
        }

        private function insert($values = array()){
            $dados = json_decode(new Sql("SELECT func_insert_mercadoria('".$values[0]."', '".$values[1]."', '".$values[2]."', '".$values[3]."', '".$values[4]."') AS MENSAGEM"));
            foreach ($dados as $value) {
                echo $value->MENSAGEM;
            }
        }

        private function update($values = array()){
            $dados = json_decode(new Sql("SELECT func_update_mercadoria('".$values[0]."','".$values[1]."', '".$values[2]."', '".$values[3]."', '".$values[4]."', '".$values[5]."') AS MENSAGEM"));
            foreach ($dados as $value) {
                echo $value->MENSAGEM;
            }
        }

        private function delete($id){
            $dados = json_decode(new Sql("SELECT func_deletes(0, $id) AS MENSAGEM"));
            foreach ($dados as $value) {
                echo $value->MENSAGEM;
            }
        }

    }
?>