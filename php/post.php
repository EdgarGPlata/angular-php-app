<?php
	
// Get application data
// Data received as JSON object - Decode first
$data = json_decode(file_get_contents("php://input"));

// Check if actual data was submitted
if ($data == "") {
	// No data
	echo "Error. Please enter values.";

} else {

	// Generate colors
	$color = generateColor($data);
	
	// Return result to app
	// Encode to JSON object
	echo json_encode($color);
	
}

// Function to generate a random color or colors for gradient
function generateColor($data) {
	
	// Result will be held in an array
	$result = array();
	
	// Assign user input to variables
	$result['name'] = $data->name;
	$result['type'] = $data->type;
	
	// If user selected a solid
	if ($result['type'] == "Solid") {

		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
		$result['color_1'] = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
	
	// Else user selected a gradient
	} else {

		$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
		$result['color_1'] = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
		$result['color_2'] = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];
		
	}
	
	// Return the result array
	return $result;
	
}	
	
?>