<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="styles.css">
	<script src="script.js"></script>
	<title>NHLCAP</title>
</head>
<body>

<div class="center">


<?php include('navbar.php'); ?>

	
<br>
<h4><u>Latest Updates</u></h4>
	
		
<?php

// Add DBConnection Class for Database
require 'DBConnect.php';
// Create an instance of the Database class and use its methods
$db = new DBConnect();
$conn = $db->connect();

// Check if form is submitted and set the selection
$freeAgent = isset($_POST['freeAgent']) ? $_POST['freeAgent'] : 'UFA'; // Change 'team' to 'freeAgent'



// Adjust SQL query to fetch the 25 most recent entries sorted by LAST_EDIT
$sql = "SELECT * FROM players ORDER BY LAST_EDIT DESC LIMIT 25";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Start the table and print the header row
    echo '<table class="centered">';
    echo '<tr>
            <th>TEAM</th>
            <th>PLAYER</th>
            <th>POS</th>
			<th>ACQUIRED</th>
			<th>AGE</th>
            <th>CAP</th>
            <th>2024-25</th>
			
          </tr>';

    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td>' . htmlspecialchars($row['TEAM']) . '</td>';
        echo '<td><b>' . htmlspecialchars($row['PLAYER']) . '</b></td>';
        // echo '<td>' . htmlspecialchars($row['TERMS']) . '</td>';
        echo '<td>' . htmlspecialchars($row['POS']) . '</td>';
        // echo '<td>' . htmlspecialchars($row['STATUS']) . '</td>';
        echo '<td>' . htmlspecialchars($row['ACQUIRED']) . '</td>';
        echo '<td>' . htmlspecialchars($row['AGE']) . '</td>';
        echo '<td>' . htmlspecialchars($row['CAP%']) . '</td>';
        echo '<td><b>' . htmlspecialchars($row['2024-25']) . '</b></td>';
		// echo '<td>' . htmlspecialchars($row['LAST_EDIT']) . '</td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No data found.';
}

// Close Database Connection
$db->close();

?>
<div class="fixed-bottom">
<h6>Updated 2024-06-11.</h6>
</div>
</div>
</body>

<style>
	.textbox {
		display: inline-block;
		margin-right: 10px; /* adjust the margin as needed */
	}
</style>
</html>

