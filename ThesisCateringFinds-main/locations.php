<?php 

    
    class locations {

        private $map_id;
        private $map_add;
        private $lat;
        private $longi;
        private $conn;
        private $tableName = "mapsamp";

        function setMap_id($map_id) { $this->map_id = $map_id; }
        function getMap_id() { return $this->map_id; }
        function setMap_add($map_add) { $this->map_add = $map_add; }
        function getMap_add() { return $this->map_add; }
        function setLat($lat) { $this->lat = $lat; }
        function getLat() { return $this->lat; }
        function setLongi($longi) { $this->longi = $longi; }
        function getLongi() { return $this->longi; }

        public function __construct()
        {
            require_once('db/DBconnect.php');
            $conn = new DBconnect;
            $this->conn = $conn->connect();

        }

        public function getLocations(){
            $sql = "SELECT * FROM $this->tableName";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }

         
 
    }

?>