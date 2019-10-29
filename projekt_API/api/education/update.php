<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    header('Access-Control-Allow-Methods: PUT');
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

    $education->course = $data->course;
    $education->school = $data->school;
    $education->startdate = $data->startdate;
    $education->stopdate = $data->stopdate;

    // Uppdatera education
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        // Kontrollerar att putmetoden används
        if($education->update()) {
            echo json_encode(
                array('message' => 'Utbildning uppdaterad')
            );
        } else {
            echo json_encode(
                array('message' => 'Utbildning kunde inte uppdateras')
            );
        }
    }
