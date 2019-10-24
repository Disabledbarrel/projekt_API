<?php
    class Project {
        // Database Properties
       private $conn;
       private $table = 'projects';

        // Course Properties
        public $id;
        public $title;
        public $url;
        public $description;
        public $image;

        // Constructor med Databas
        public function __construct($db) {
            $this->conn = $db;
        }

        // Get courses
        public function read() {
            // Skapar query
            $query = 'SELECT * FROM ' . $this->table . ' ORDER BY id ASC;';

            // Prepare statement PDO
            $stmt = $this->conn->prepare($query);

            // Execute query 
            $stmt->execute();

            return $stmt;
        }

        // Create project
        public function create() {
            // Skapar query
            $query = 'INSERT INTO ' . $this->table . '
            SET 
                title = :title,
                url = :url,
                description = :description,
                image = :image';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Säkerhetsfunktioner
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->url = htmlspecialchars(strip_tags($this->url));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->image = htmlspecialchars(strip_tags($this->image));

            // Associera data
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':url', $this->url);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':image', $this->image);

            // Execute query
            if($stmt->execute()) {
                return true;
            }

            // Skriver ut meddelande om error
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        // Update course
        public function update() {
            // Skapar query
            $query = 'UPDATE ' . $this->table . '
            SET 
                title = :title,
                url = :url,
                description = :description,
                image = :image
            WHERE
                id = :id';

            // Prepare statement
            $stmt = $this->conn->prepare($query);

            // Säkerhetsfunktioner
            $this->title = htmlspecialchars(strip_tags($this->title));
            $this->url = htmlspecialchars(strip_tags($this->url));
            $this->description = htmlspecialchars(strip_tags($this->description));
            $this->image = htmlspecialchars(strip_tags($this->image));
            $this->id = htmlspecialchars(strip_tags($this->id));

            // Associera data
            $stmt->bindParam(':title', $this->title);
            $stmt->bindParam(':url', $this->url);
            $stmt->bindParam(':description', $this->description);
            $stmt->bindParam(':image', $this->image);
            $stmt->bindParam(':id', $this->id);

            // Execute query
            if($stmt->execute()) {
                return true;
            }

            // Skriver ut meddelande om error
            printf("Error: %s.\n", $stmt->error);
            return false;
        }

        // Ta bort kurs
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