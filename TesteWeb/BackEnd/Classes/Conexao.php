<?php
    class Conexao{
        private $host = "";
        private $usr = "";
        private $pwd = "";
        
        
        /*
        private $host = "";
        private $usr = "";
        private $pwd = "";
        */
        public function conectar(){
            return new PDO($this->host, $this->usr, $this->pwd);
        }
    }
?>