<?php
    class Education {
        // Database Properties
       private $conn;
       private $table = 'education';

        // Education Properties
        public $id;
        public $course;
        public $school;
        public $startdate;
        public $stopdate;

        // Constructor med Databas
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get education
        public function read() {
            // Skapar query
            $query = 'SELECT * FROM ' . $this->table . ' ORDER BY startdate DESC;';

            // Prepare statement PDO
            $stmt = $this->conn->prepare($query);

            // Execute query 
            $stmt->execute();

            return $stmt;
        }

        // Create education
        public function create() {
            // Skapar query
            $query = 'INSERT INTO ' . $this->table . '
            SET 
                course = :course,
                school = :school,
                startdate = :startdate,
                stopdate = :stopdate';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Säkerhetsfunktioner
            $this->course = htmlspecialchars(strip_tags($this->course));
            $this->school = htmlspecialchars(strip_tags($this->school));
            $this->startdate = htmlspecialchars(strip_tags($this->startdate));
            $this->stopdate = htmlspecialchars(strip_tags($this->stopdate));

            // Associera data
            $stmt->bindParam(':course', $this->course);
            $stmt->bindParam(':school', $this->school);
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

        // Update education
        public function update() {
            // Skapar query
            $query = 'UPDATE ' . $this->table . '
            SET 
                course = :course,
                school = :school,
                startdate = :startdate,
                stopdate = :stopdate
            WHERE
                id = :id';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Säkerhetsfunktioner
            $this->course = htmlspecialchars(strip_tags($this->course));
            $this->school = htmlspecialchars(strip_tags($this->school));
            $this->startdate = htmlspecialchars(strip_tags($this->startdate));
            $this->stopdate = htmlspecialchars(strip_tags($this->stopdate));
            $this->id = htmlspecialchars(strip_tags($this->id));

            // Associera data
            $stmt->bindParam(':course', $this->course);
            $stmt->bindParam(':school', $this->school);
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

        // Ta bort education
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