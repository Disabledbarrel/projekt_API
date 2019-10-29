<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Education.php';

    // Kontrollera inloggning
    session_start();
    if(!isset($_SESSION['portfolio'])) {
        echo json_encode(
            array('message' => 'Access denied')
        );
        exit();
    }

    // Instansering av Databas och anslutning
    $database = new Database();
    $db = $database->connect();

    // Instansering av utbildnings-klass
    $education = new Education($db);

    // Hämta rådata
    $data = json_decode(file_get_contents("php://input"));

    // Set Id för att uppdatera
    $education->id = $data->id;

    // Radera education
    if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
        // Kontrollerar att deletemetoden används
        if($education->delete()) {
            echo json_encode(
                array('message' => 'Kurs raderad')
            );
        } else {
            echo json_encode(
                array('message' => 'Kurs kunde inte raderas')
            );
        }
    }
