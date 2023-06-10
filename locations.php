<?php


    class locations {

        private $userid;
        private $map_add;
        private $lat;
        private $longi;
        private $conn;
        private $tableName = "tbl_user";

        function setMap_id($userid) { $this->userid = $userid; }
        function getMap_id() { return $this->userid; }
        function setMap_add($address) { $this->address = $address; }
        function getMap_add() { return $this->address; }
        function setLat($latitude) { $this->latitude = $latitude; }
        function getLat() { return $this->latitude; }
        function setLongi($longitude) { $this->longitude = $longitude; }
        function getLongi() { return $this->longitude; }

        public function __construct()
        {
            require_once('db/DBconnect.php');
            $conn = new DBconnect;
            $this->conn = $conn->connect();

        }

        public function getLocations(){
            $sql = "SELECT * FROM $this->tableName where status = 'approved'";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }



    }

?>
