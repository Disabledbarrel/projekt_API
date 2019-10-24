<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Projects.php';

    // Instansering av Databas och anslutning
    $database = new Database();
    $db = $database->connect();

    // Instansering av projekt-klass
    $project = new Project($db);

    // Course query
    $result = $project->read();
    // Räkna rader
    $num = $result->rowCount();

    // Kolla om kurser finns
    if($num > 0) {
        // Skapa array
        $projects_arr = array();
        $projects_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $project_item = array (
                'id' => $id,
                'title' => $title,
                'url' => $url,
                'description' => $description,
                'image' => $image
            );

            // Push to data
            array_push($projects_arr['data'], $project_item);
        }

        // Omvandla till JSON
        echo json_encode($projects_arr);

    } else {
        // Inga kurser
        echo json_encode(
            array('message' => 'Inga projekt hittade')
        );
    }