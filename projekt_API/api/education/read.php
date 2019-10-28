<?php
    // Headers
    header('Access-Control-Allow-Origin: *');
    header('Content-type: application/json');

    include_once '../../config/Database.php';
    include_once '../../models/Education.php';

    // Instansering av Databas och anslutning
    $database = new Database();
    $db = $database->connect();

    // Instansering av utbildnings-klass
    $education = new Education($db);

    // Course query
    $result = $education->read();
    // Räkna rader
    $num = $result->rowCount();

    // Kolla om utbildningar finns
    if($num > 0) {
        // Skapa array
        $educations_arr = array();
        $educations_arr['data'] = array();

        while($row = $result->fetch(PDO::FETCH_ASSOC)) {
            extract($row);

            $education_item = array (
                'id' => $id,
                'course' => $course,
                'school' => $school,
                'startdate' => $startdate,
                'stopdate' => $stopdate
            );

            // Push to data
            array_push($educations_arr['data'], $education_item);
        }

        // Omvandla till JSON
        echo json_encode($educations_arr);

    } else {
        // Ingen utbildning
        echo json_encode(
            array('message' => 'Inga utbildningar hittade')
        );
    }