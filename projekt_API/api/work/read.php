<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Work.php';

    // Instansering av Databas och anslutning
    $database = new Database();
    $db = $database->connect();

    // Instansering av arbete-klass
    $work = new Work($db);

    // Work query
    $result = $work->read();
    // Räkna rader
    $num = $result->rowCount();

    // Kolla om arbeten finns
    if($num > 0) {
        // Skapa array
        $works_arr = array();
        $works_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $work_item = array (
                'id' => $id,
                'workplace' => $workplace,
                'title' => $title,
                'description' => $description,
                'startdate' => $startdate,
                'stopdate' => $stopdate
            );

            // Push to data
            array_push($works_arr['data'], $work_item);
        }

        // Omvandla till JSON
        echo json_encode($works_arr);

    } else {
        // Inga arbeten
        echo json_encode(
            array('message' => 'Inga arbeten hittade')
        );
    }