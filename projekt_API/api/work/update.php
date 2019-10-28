<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Work.php';

    // Kontrollera inloggning
    session_start();
    if(!isset($_SESSION['email'])) {
        echo json_encode(
            array('message' => 'Access denied')
        );
        exit();
    }

    // Instansering av Databas och anslutning
    $database = new Database();
    $db = $database->connect();

    // Instansering av arbete-klass
    $work = new Work($db);

    // Hämta rådata
    $data = json_decode(file_get_contents("php://input"));

    // Set Id för att uppdatera
    $work->id = $data->id;

    $work->workplace = $data->workplace;
    $work->title = $data->title;
    $work->description = $data->description;
    $work->startdate = $data->startdate;
    $work->stopdate = $data->stopdate;

    // Uppdatera arbete
    if ($_SERVER['REQUEST_METHOD'] === 'PUT') {
        // Kontrollerar att putmetoden används
        if($work->update()) {
            echo json_encode(
                array('message' => 'Arbete uppdaterat')
            );
        } else {
            echo json_encode(
                array('message' => 'Arbete kunde inte uppdateras')
            );
        }
    }
