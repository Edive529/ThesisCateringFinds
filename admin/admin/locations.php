<?php


    class locations {

        private $userid;
        private $restaurant;
        private $latitude;
        private $longitude;
        private $tableName = "tbl_user";

        function setMap_id($userid) { $this->userid = $userid; }
        function getMap_id() { return $this->userid; }
        function setMap_add($restaurant) { $this->restaurant = $restaurant; }
        function getMap_add() { return $this->restaurant; }
        function setLat($latitude) { $this->latitude = $latitude; }
        function getLat() { return $this->lat; }
        function setLongi($longitude) { $this->longitude = $longitude; }
        function getLongi() { return $this->longitude; }

        public function __construct()
        {
            include_once '../connectdb.php';

        }

        public function getLocations(){
            $sql = "SELECT * FROM $this->tableName";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);

        }



    }

?>
