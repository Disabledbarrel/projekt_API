<?php
    class Database {
        // Properties
        private $host = 'localhost';
        private $db_name = 'portfolio';
        private $username = 'portfolio';
        private $password = 'password';
        private $conn;

        // Database connection
        public function connect() {
            $this->conn = null;

            try {
                $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch(PDOException $e) {
                echo 'Connection error: ' . $e->getMessage();
            }

            return $this->conn;
        }

    }