<?php 

    class DBconnect {
        private $host = 'localhost';
        private $dbName = 'jackskainan';
        private $user = 'root';
        private $pass = '';
  

        public function connect() {
            try{
                $conn = new PDO('mysql:host=' . $this->host . '; dbname=' . $this->dbName, $this->user, $this->pass );
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);  
                return $conn;
            } catch( PDOException $e ){
                echo 'DATABASE ERROR: ' . $e->getMessage();

            }

        } 
    }
?>