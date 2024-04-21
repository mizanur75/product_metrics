<?php

require 'db.php';


// Fetch data from variable_coefficient table
$variable_coefficient_query = $conn->query("SELECT * FROM variable_coefficient");
$variable_coefficient_result = $variable_coefficient_query->fetchAll();

// Fetch data from scaled_inputs table
$scaled_inputs_query = $conn->query("SELECT * FROM scaled_outputs");
$scaled_inputs_result = $scaled_inputs_query->fetchAll();

// var_dump($scaled_inputs_query->columnCount()); exit;


// Check if both queries were successful
if ($variable_coefficient_result && $scaled_inputs_result) {
    // Initialize arrays to store fetched data
    $variable_coefficients = array();
    $scaled_inputs = array();
    

    foreach ($variable_coefficient_result as $key => $value) {
        $variable_coefficients[] = $value['coefficient'];
    }


    foreach ($scaled_inputs_result as $key => $value) {
        $scaled_inputs_row = array();
        
        for ($i = 0; $i < $scaled_inputs_query->columnCount(); $i++) { // Assuming columns
            $scaled_inputs_row[] = $value[$i]; // Assuming column names value
        }
        $scaled_inputs[] = $scaled_inputs_row;
        // var_dump($scaled_inputs_row); exit;
    }

    // var_dump(count($scaled_inputs)); exit;
    // Perform dot product
    $result = array();
    // var_dump(count($scaled_inputs[0])); exit;
    foreach ($variable_coefficients as $coeff) {
        $dot_product = (float) 0;
        echo $coeff.', ';
        for ($i = 2; $i < count($scaled_inputs[0]); $i++) {
            $dot_product += ((float)$coeff * (float)$scaled_inputs[0][$i]);
            var_dump($dot_product); exit;
            // $dot_product = $dot_product+$dot_product;
        }
        $result[] = $dot_product;
    }
    var_dump($result); exit;

    // Display the result
    echo "Dot product result:<br>";
    foreach ($result as $key => $value) {
        echo $key +1 .' = '. $value . "<br>";
    }
} else {
    echo "Error fetching data: " . $conn->errorInfo();
}

