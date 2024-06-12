<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
	<title>Search</title>
</head>
<body>
<div class="center">

<?php include('navbar.php'); ?>

<h3>Search Players</h3>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
	<label for="search"></label>
	<input type="text" id="search" name="search">
	<input type="submit" name="submit" value="Search">
</form>
<br>
<?php
// Add DBConnection Class for Database
require 'DBConnect.php';
// Create an instance of the Database class and use its methods
$db = new DBConnect();
$conn = $db->connect();

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
	// Get search term from form
	$search_term = $_POST["search"];

	// Prepare SQL statement with parameterized query for player search
	$stmt_player = $conn->prepare("SELECT team, player, terms, pos, `status`, acquired, age, `cap%`, `2024-25`, `2025-26`, `2026-27`, `2027-28`, `2028-29`, `2029-30` FROM players WHERE player LIKE ?");
	$stmt_player->bind_param("s", $search_term_like);
	
	// Append wildcard characters to search term
	$search_term_like = '%' . $search_term . '%';
	
	// Execute player search query
	$stmt_player->execute();

	// Bind results to variables
	$stmt_player->bind_result($team, $player, $terms, $pos, $status, $acquired, $age, $cap, $season, $season2, $season3, $season4, $season5, $season6);

	// Display results in player table
	if ($stmt_player->fetch()) {
		echo "<h2>Players</h2>";
		echo "<table class='centered'>";
		echo "<tr><th>TEAM</th><th>PLAYER</th><th>TERMS</th><th>POSITION</th><th>STATUS</th><th>ACQUIRED</th><th>AGE</th><th>CAP%</th><th>2024-25</th><th>2025-26</th><th>2026-27</th><th>2027-28</th><th>2028-29</th><th>2029-30</th></tr>";
		do {
			echo "<tr><td>$team</td><td><b>$player</b></td><td>$terms</td><td>$pos</td><td>$status</td><td>$acquired</td><td>$age</td><td>$cap</td><td><b>$season</b></td><td><b>$season2</b></td><td><b>$season3</b></td><td><b>$season4</b></td><td><b>$season5</b></td><td><b>$season6</b></td></tr>";
		} while ($stmt_player->fetch());
		echo "</table>";
	} else {
		echo "<br> No player results found.";
	}

	// Close player statement
	$stmt_player->close();

}

    // Close database connection
    $conn->close();
?>
<footer>
<?php include('footer.php'); ?>
</footer>
</div>
</body>
</html>