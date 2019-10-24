<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers, Content-type, Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once '../../config/Database.php';
    include_once '../../models/Projects.php';

    // Instansering av Databas och anslutning
    $database = new Database();
    $db = $database->connect();

    // Instansering av kurs-klass
    $project = new Project($db);

    // Hämta rådata
    $data = json_decode(file_get_contents("php://input"));

    $project->title = $data->title;
    $project->url = $data->url;
    $project->description = $data->description;
    $project->image = $data->image;

    // Create project
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // The request is using the POST method
        if($project->create()) {
            echo json_encode(
                array('message' => 'Projekt tillagt')
            );
        } else {
            echo json_encode(
                array('message' => 'Projekt kunde inte läggas till')
            );
        }
    } else {
        echo json_encode(
            array('message' => 'Projekt kunde inte läggas till')
        );
    }
    
