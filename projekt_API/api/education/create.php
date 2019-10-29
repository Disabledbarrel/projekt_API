<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    header('Access-Control-Allow-Methods: POST');
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

    $education->course = $data->course;
    $education->school = $data->school;
    $education->startdate = $data->startdate;
    $education->stopdate = $data->stopdate;

    // Create education
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Kontrollerar att postmetoden används
        if($education->create()) {
            echo json_encode(
                array('message' => 'Utbildning tillagt')
            );
        } else {
            echo json_encode(
                array('message' => 'Utbildning kunde inte läggas till')
            );
        }
    } else {
        echo json_encode(
            array('message' => 'Utbildning kunde inte läggas till')
        );
    }
    
