<?php
    class Conexao{
        private $host = "mysql:host=www.sanfig.com.br;dbname=sanfi601_testeValemobi;charset=utf8";
        private $usr = "sanfi601_valemob";
        private $pwd = "*@teste@valemobi@*";
        
        
        /*
        private $host = "mysql:host=127.0.0.1;dbname=dbmercadorias;charset=utf8";
        private $usr = "carwash";
        private $pwd = "*ed15@ed91*";
        */
        public function conectar(){
            return new PDO($this->host, $this->usr, $this->pwd);
        }
    }
?>