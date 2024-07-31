<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
	<title>Player Insert</title>
</head>
<body>
<div class="center">

<?php include('updatesNavbar.php'); ?>

<br>

<h2>Insert New Player</h2>

<br>
<!-- Form with dropdown to select team -->
<form method="post" action="">
    <b>
        <label for="team">Team</label><br>
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

        <br><br>
        <label for="pos">Position</label><br>
        <select name="pos" id="pos">
        <option value="C">C</option>
        <option value="RW">RW</option>
        <option value="LW">LW</option>
        <option value="C, LW">C, LW</option>
        <option value="C, RW">C, RW</option>
        <option value="LW, RW">LW, RW</option>
        <option value="LD">LD</option>
        <option value="RD">RD</option>
        <option value="RD, LD">RD, LD</option>
        <option value="G">G</option>
        </select>

        <br><br>
        <label for="terms">Special Terms</label>
        <br>
	    <input type="text" id="terms" name="terms">

        <br><br>
        <label for="status">Status (NHL)</label>
        <br>
	    <input type="text" id="status" name="status">

        <br><br>
        <!-- Switch Aquired to Dropdown -->
        <label for="acquired">Acquired</label> 
        <br>
	    <input type="text" id="acquired" name="acquired">

        <br><br>
        <label for="age">Age</label>
        <br>
	    <input type="text" id="age" name="age">

        <br><br>
        <label for="cap">Cap%</label>
        <br>
	    <input type="text" id="cap" name="cap">

        <br><br>
        <label for="2024-25">2024-25 Cap Hit</label>
        <br>
	    <input type="text" id="2024-25" name="2024-25">

        <br><br>
        <label for="2025-26">2025-26 Cap Hit</label>
        <br>
	    <input type="text" id="2025-26" name="2025-26">

        <br><br>
        <label for="2026-27">2026-27 Cap Hit</label>
        <br>
	    <input type="text" id="2026-27" name="2026-27">

        <br><br>
        <label for="2027-28">2027-28 Cap Hit</label>
        <br>
	    <input type="text" id="2027-28" name="2027-28">

        <br><br>
        <label for="2028-29">2028-29 Cap Hit</label>
        <br>
	    <input type="text" id="2028-29" name="2028-29">

        <br><br>
        <label for="2029-30">2029-30 Cap Hit</label>
        <br>
	    <input type="text" id="2029-30" name="2029-30">
    </b>
        <br><br>
        <input type="submit" value="Submit"><br>
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
    $pos = $_POST['pos'];
    $terms = $_POST['terms'];
    $status = $_POST['status'];
    $acquired = $_POST['acquired'];
    $age = $_POST['age'];
    $cap = $_POST['cap'];
    $salary_2024_25 = $_POST['2024-25'];
    $salary_2025_26 = $_POST['2025-26'];
    $salary_2026_27 = $_POST['2026-27'];
    $salary_2027_28 = $_POST['2027-28'];
    $salary_2028_29 = $_POST['2028-29'];
    $salary_2029_30 = $_POST['2029-30'];

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO players (team, player, pos, terms, status, acquired, age, `cap%`, `2024-25`, `2025-26`, `2026-27`, `2027-28`, `2028-29`, `2029-30`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssidssssss", $team, $player, $pos, $terms, $status, $acquired, $age, $cap, $salary_2024_25, $salary_2025_26, $salary_2026_27, $salary_2027_28, $salary_2028_29, $salary_2029_30);

    // Execute the statement
    if ($stmt->execute()) {
        echo "<br>New player created successfully. <a href='insert.php'>Refresh</a> page before making another insert.";
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