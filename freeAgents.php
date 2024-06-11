<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
	<title>Free Agents</title>
</head>
<body>
<div class="center">

<?php include('navbar.php'); ?>

<br><br>
<!-- Form with dropdown to select type -->
<form method="post" action="">
    <label for="freeAgent">Free Agent Type:</label>
    <select name="freeAgent" id="freeAgent">
        <option value="UFA">Unrestricted Free Agent</option>
        <option value="RFA">Restricted Free Agent</option>
    </select>
    <input type="submit" value="Submit">
</form>

<?php
// Add DBConnection Class for Database
require 'DBConnect.php';
// Create an instance of the Database class and use its methods
$db = new DBConnect();
$conn = $db->connect();

// Check if form is submitted and set the selection
$freeAgent = isset($_POST['freeAgent']) ? $_POST['freeAgent'] : 'UFA'; // Change 'team' to 'freeAgent'

// Set the title based on the selection
if ($freeAgent == 'UFA') {
    $title = 'Unrestricted Free Agents';
} else {
    $title = 'Restricted Free Agents';
}

// Adjust SQL query based on the selected type
if ($freeAgent == 'UFA') {
    $sql = "SELECT * FROM players WHERE `2024-25` LIKE '%UFA%' ORDER BY player";
} else {
    $sql = "SELECT * FROM players WHERE `2024-25` LIKE '%RFA%' ORDER BY player";
}

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Display the title in an h2 tag
    echo '<h2>' . $title . '</h2>';

    // Start the table and print the header row
    echo '<table class="centered">';
    echo '<tr>
            <th>TEAM</th>
            <th>PLAYER</th>
            <th>POS</th>
            <th>AGE</th>
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
        // echo '<td>' . htmlspecialchars($row['ACQUIRED']) . '</td>';
        echo '<td>' . htmlspecialchars($row['AGE']) . '</td>';
        // echo '<td>' . htmlspecialchars($row['CAP%']) . '</td>';
        echo '<td><b>' . htmlspecialchars($row['2024-25']) . '</b></td>';
        echo '</tr>';
    }

    echo '</table>';
} else {
    echo 'No data found.';
}


// Team salary cap total and team cap space to be added next

// Close Database Connection
$db->close();
?>

<div class="fixed-bottom">
<h6>Updated 2024-06-11.</h6>
</div>

</div>

<!-- <script>
  script("myTable");
</script> -->
</body>
</html>