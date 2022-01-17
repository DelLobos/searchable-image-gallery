<?php

/**
 * Display Errors **/
ini_set('display_errors', 1);
error_reporting(E_ALL);
date_default_timezone_set('America/Phoenix');

    $csvarray = array();
    $file = "images.csv";
    ini_set("auto_detect_line_endings", true);
    if (($handle = fopen($file, "r")) !== false) {
        // [ktm: 20170111] - implicity set the pointer to the second row
        fgetcsv($handle);
        $kk = 0;
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $c = count($data);
            for ($x = 0; $x < $c; $x++) {
                $csvarray[$kk][$x] = $data[$x];
            }
            $kk++;
        }
        fclose($handle);
    }
    echo json_encode($csvarray);


// var_dump(load_csv());
// echo json_encode(load_csv());

?>