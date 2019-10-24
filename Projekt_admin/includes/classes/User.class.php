<?php

/*
Class User, för inloggning och användare

Webbutveckling III DT173G
Elin Larsson HT-19
*/

class User {
    //properties
    private $db;
    private $email;
    private $password;

    // sätter constructor vid varje nytt objekt/instans av class
    function __construct() {
        $this->db = new mysqli(DBHOST, DBUSER, DBPASS, DBDATABASE);
        if($this->db->connect_errno > 0) {
            die("Fel vid anslutning: " . $this->db->connect_error);
        }
    }

    // Login existing user
    public function loginUser($email, $password) {
        $email = $this->db->real_escape_string($email);
        $password = $this->db->real_escape_string($password);

        $sql ="SELECT password FROM users WHERE email='$email'";
        $result = $this->db->query($sql);
        
        if($result) {
            $_SESSION['email'] = $email;
                return true;
            } else {
                return false;
            }
    }

}