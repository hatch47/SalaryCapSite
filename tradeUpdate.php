<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
	<title>Player Trade Update</title>
</head>
<body>
<div class="center">

<?php include('updatesNavbar.php'); ?>

<br>

<h2>Update Player</h2>

<br>
<!-- Form with dropdown to select team -->
<form method="post" action="">
    <b>
        <label for="team">Previous Team</label><br>
        <select name="team" id="team">
        <option value="Anaheim Ducks">Anaheim Ducks</option>
        <option value="Boston Bruins">Boston Bruins</option>
        <option value="Buffalo Sabres">Buffalo Sabres</option>
        <option value="Calgary Flames">Calgary Flames</option>
        <option value="Carolina Hurricanes">Carolina Hurricanes</option>
        <option value="Chicago Blackhawks">Chicago Blackhawks</option>
        <option value="Colorado Avalanche">Colorado Avalanche</option>
        <option value="Columbus Blue Jackets">Columbus Blue Jackets</option>
        <option value="Dallas Stars">Dallas Stars</option>
        <option value="Detroit Red Wings">Detroit Red Wings</option>
        <option value="Edmonton Oilers">Edmonton Oilers</option>
        <option value="Florida Panthers">Florida Panthers</option>
        <option value="Los Angeles Kings">Los Angeles Kings</option>
        <option value="Minnesota Wild">Minnesota Wild</option>
        <option value="Montreal Canadiens">Montreal Canadiens</option>
        <option value="Nashville Predators">Nashville Predators</option>
        <option value="New Jersey Devils">New Jersey Devils</option>
        <option value="New York Islanders">New York Islanders</option>
        <option value="New York Rangers">New York Rangers</option>
        <option value="Ottawa Senators">Ottawa Senators</option>
        <option value="Philadelphia Flyers">Philadelphia Flyers</option>
        <option value="Pittsburgh Penguins">Pittsburgh Penguins</option>
        <option value="San Jose Sharks">San Jose Sharks</option>
        <option value="Seattle Kraken">Seattle Kraken</option>
        <option value="St. Louis Blues">St. Louis Blues</option>
        <option value="Tampa Bay Lightning">Tampa Bay Lightning</option>
        <option value="Toronto Maple Leafs">Toronto Maple Leafs</option>
        <option value="Utah">Utah</option>
        <option value="Vancouver Canucks">Vancouver Canucks</option>
        <option value="Vegas Golden Knights">Vegas Golden Knights</option>
        <option value="Washington Capitals">Washington Capitals</option>
        <option value="Winnipeg Jets">Winnipeg Jets</option>
        </select>

        <br><br>
        <label for="player">Player Name</label>
        <br>
	    <input type="text" id="player" name="player">

        <br><br> <br><br> <br><br>
        <label for="team2">New Team</label><br>
        <select name="team2" id="team2">
        <option value="Anaheim Ducks">Anaheim Ducks</option>
        <option value="Boston Bruins">Boston Bruins</option>
        <option value="Buffalo Sabres">Buffalo Sabres</option>
        <option value="Calgary Flames">Calgary Flames</option>
        <option value="Carolina Hurricanes">Carolina Hurricanes</option>
        <option value="Chicago Blackhawks">Chicago Blackhawks</option>
        <option value="Colorado Avalanche">Colorado Avalanche</option>
        <option value="Columbus Blue Jackets">Columbus Blue Jackets</option>
        <option value="Dallas Stars">Dallas Stars</option>
        <option value="Detroit Red Wings">Detroit Red Wings</option>
        <option value="Edmonton Oilers">Edmonton Oilers</option>
        <option value="Florida Panthers">Florida Panthers</option>
        <option value="Los Angeles Kings">Los Angeles Kings</option>
        <option value="Minnesota Wild">Minnesota Wild</option>
        <option value="Montreal Canadiens">Montreal Canadiens</option>
        <option value="Nashville Predators">Nashville Predators</option>
        <option value="New Jersey Devils">New Jersey Devils</option>
        <option value="New York Islanders">New York Islanders</option>
        <option value="New York Rangers">New York Rangers</option>
        <option value="Ottawa Senators">Ottawa Senators</option>
        <option value="Philadelphia Flyers">Philadelphia Flyers</option>
        <option value="Pittsburgh Penguins">Pittsburgh Penguins</option>
        <option value="San Jose Sharks">San Jose Sharks</option>
        <option value="Seattle Kraken">Seattle Kraken</option>
        <option value="St. Louis Blues">St. Louis Blues</option>
        <option value="Tampa Bay Lightning">Tampa Bay Lightning</option>
        <option value="Toronto Maple Leafs">Toronto Maple Leafs</option>
        <option value="Utah">Utah</option>
        <option value="Vancouver Canucks">Vancouver Canucks</option>
        <option value="Vegas Golden Knights">Vegas Golden Knights</option>
        <option value="Washington Capitals">Washington Capitals</option>
        <option value="Winnipeg Jets">Winnipeg Jets</option>
        </select>

        <br><br>
        <label for="status">Status (NHL)</label>
        <br>
	    <input type="text" id="status" name="status">

        <br><br>
        <label for="acquired">Acquired</label>
        <br>
	    <select name="acquired" id="acquired">
        <option value="Trade">Trade</option>
        <option value="Signed">Signed</option>
        <option value="Waivers claim">Waivers claim</option>
        </select>

    </b>
        <br><br>
        <input type="submit" value="Submit">
    </form>


<?php

// Add DBConnection Class for Database
require 'DBConnect.php';
// Create an instance of the Database class and use its methods
$db = new DBConnect();
$conn = $db->connect();

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $team = $_POST['team'];
    $player = $_POST['player'];
    $team2 = $_POST['team2'];
    $status = $_POST['status'];
    $acquired = $_POST['acquired'];

    // Prepare and bind
    $stmt = $conn->prepare("UPDATE players SET team = ?, status = ?, acquired = ? WHERE TEAM = ? AND PLAYER = ?");
    $stmt->bind_param("sssss", $team2, $status, $acquired, $team, $player);

    // Execute the statement
    if ($stmt->execute()) {
        echo "New trade created successfully, Refresh page before making another trade.";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
}

$conn->close();


?>

<div class="fixed-bottom">
<?php include('footer.php'); ?>
</div>


</div>
</body>
</html>