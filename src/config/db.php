<?php
    class db{
        // Properties
        private $dbhost = 'us-cdbr-iron-east-04.cleardb.net';
        private $dbuser = 'b552979c1d2441';
        private $dbpass = 'bd19efd8';
        private $dbname = 'heroku_db98b53a797e5a7';

        // Connect
        public function connect(){
            $mysql_connect_str = "mysql:host=$this->dbhost;dbname=$this->dbname";
            $dbConnection = new PDO($mysql_connect_str, $this->dbuser, $this->dbpass);
            $dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $dbConnection;
        }
    }