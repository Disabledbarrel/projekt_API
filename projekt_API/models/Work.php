<?php
    class Work {
        // Database Properties
       private $conn;
       private $table = 'work';

        // Work Properties
        public $id;
        public $workplace;
        public $title;
        public $description;
        public $startdate;
        public $stopdate;

        // Constructor med Databas
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get work
        public function read() {
            // Skapar query
            $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id ASC;';

            // Prepare statement PDO
            $stmt = $this->conn->prepare($query);

            // Execute query 
            $stmt->execute();

            return $stmt;
        }

        // Create work
        public function create() {
            // Skapar query
            $query = 'INSERT INTO ' . $this->table . '
            SET 
                workplace = :workplace,
                title = :title,
                description = :description,
                startdate = :startdate,
                stopdate = :stopdate';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Säkerhetsfunktioner
            $this->workplace = htmlspecialchars(strip_tags($this->workplace));
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->startdate = htmlspecialchars(strip_tags($this->startdate));
            $this->stopdate = htmlspecialchars(strip_tags($this->stopdate));

            // Associera data
            $stmt->bindParam(':workplace', $this->workplace);
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':startdate', $this->startdate);
            $stmt->bindParam(':stopdate', $this->stopdate);

            // Execute query
            if($stmt->execute()) {
                return true;
            }

            // Skriver ut meddelande om error
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        // Update work
        public function update() {
            // Skapar query
            $query = 'UPDATE ' . $this->table . '
            SET 
                workplace = :workplace,
                title = :title,
                description = :description,
                startdate = :startdate,
                stopdate = :stopdate
            WHERE
                id = :id';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Säkerhetsfunktioner
            $this->workplace = htmlspecialchars(strip_tags($this->workplace));
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->startdate = htmlspecialchars(strip_tags($this->startdate));
            $this->stopdate = htmlspecialchars(strip_tags($this->stopdate));
            $this->id = htmlspecialchars(strip_tags($this->id));

            // Associera data
            $stmt->bindParam(':workplace', $this->workplace);
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':startdate', $this->startdate);
            $stmt->bindParam(':stopdate', $this->stopdate);
            $stmt->bindParam(':id', $this->id);

            // Execute query
            if($stmt->execute()) {
                return true;
            }

            // Skriver ut meddelande om error
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        // Ta bort arbete
        public function delete() {
            // Skapar query
            $query = 'DELETE FROM ' . $this->table . ' WHERE id = :id';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Säkerhetsfunktion
            $this->id = htmlspecialchars(strip_tags($this->id));

            // Associera data
            $stmt->bindParam(':id', $this->id);

            // Execute query
            if($stmt->execute()) {
                return true;
            }

            // Skriver ut meddelande om error
            printf("Error: %s.\n", $stmt->error);
            return false;

        }

    }