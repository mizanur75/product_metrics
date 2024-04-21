<?php
session_start();
ini_set('memory_limit', '-1');
set_time_limit(5000);
require 'db.php';

// Fetch rows from scaled_inputs table
$stmtInputs = $conn->query('SELECT * FROM scaled_inputs');
$scaledInputs = $stmtInputs->fetchAll();

// Fetch rows from variable_coefficient table
$stmtCoefficients = $conn->query('SELECT * FROM variable_coefficient');
$variableCoefficients = $stmtCoefficients->fetchAll();

// Initialize dot product results array
$dotProducts = [];

// Check if the number of rows in scaled_inputs matches variable_coefficient
// if (count($scaledInputs) != count($variableCoefficients)) {
//     echo "Number of rows in scaled_inputs and variable_coefficient tables must match.";
//     exit;
// }
// var_dump(count($variableCoefficients)); exit;
// Calculate dot product for each row pair
$j = 1;
for ($i = 0; $i < count($scaledInputs); $i++) {
    // var_dump($scaledInputs[$i][$i+1]); exit;
    $product = $scaledInputs[$i][$j] * $variableCoefficients[$i]['coefficient'] + 
               $scaledInputs[$i][$j] * $variableCoefficients[$i]['coefficient']; // Add more terms as needed
    
    $dotProducts[] = $product;
    $j ++;
}

var_dump($dotProducts); exit;

// Output the dot product results
foreach ($dotProducts as $index => $product) {
    echo "Dot product for row " . ($index + 1) . ": " . $product . "\n";
}
