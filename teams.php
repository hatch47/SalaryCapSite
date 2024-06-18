<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="styles.css">
    <script src="script.js"></script>
	<title>Teams</title>
</head>
<body>
<div class="center">

<?php include('navbar.php'); ?>

<br><br>
<!-- Form with dropdown to select team -->
<form method="post" action="">
        <label for="team"></label>
        <select name="team" id="team">
        <option value="All">Select Team</option>
        <option value="Anaheim">Anaheim Ducks</option>
        <option value="Boston">Boston Bruins</option>
        <option value="Buffalo">Buffalo Sabres</option>
        <option value="Calgary">Calgary Flames</option>
        <option value="Carolina">Carolina Hurricanes</option>
        <option value="Chicago">Chicago Blackhawks</option>
        <option value="Colorado">Colorado Avalanche</option>
        <option value="Columbus">Columbus Blue Jackets</option>
        <option value="Dallas">Dallas Stars</option>
        <option value="Detroit">Detroit Red Wings</option>
        <option value="Edmonton">Edmonton Oilers</option>
        <option value="Florida">Florida Panthers</option>
        <option value="Los Angeles">Los Angeles Kings</option>
        <option value="Minnesota">Minnesota Wild</option>
        <option value="Montreal">Montreal Canadiens</option>
        <option value="Nashville">Nashville Predators</option>
        <option value="New Jersey">New Jersey Devils</option>
        <option value="New York Islanders">New York Islanders</option>
        <option value="New York Rangers">New York Rangers</option>
        <option value="Ottawa">Ottawa Senators</option>
        <option value="Philadelphia">Philadelphia Flyers</option>
        <option value="Pittsburgh">Pittsburgh Penguins</option>
        <option value="San Jose">San Jose Sharks</option>
        <option value="Seattle">Seattle Kraken</option>
        <option value="St. Louis">St. Louis Blues</option>
        <option value="Tampa Bay">Tampa Bay Lightning</option>
        <option value="Toronto">Toronto Maple Leafs</option>
        <option value="Utah">Utah</option>
        <option value="Vancouver">Vancouver Canucks</option>
        <option value="Vegas">Vegas Golden Knights</option>
        <option value="Washington">Washington Capitals</option>
        <option value="Winnipeg">Winnipeg Jets</option>

        </select>
        <input type="submit" value="Submit">
    </form>

 
<?php

// Add DBConnection Class for Database
require 'DBConnect.php';
// Create an instance of the Database class and use its methods
$db = new DBConnect();
$conn = $db->connect();

    // Check if form is submitted and set the team selection
    $team = isset($_POST['team']) ? $_POST['team'] : 'Anaheim';

    // Adjust SQL query based on the selected team
    if ($team == 'All') {
        $sql = "SELECT * FROM players WHERE team = 'Anaheim Ducks' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    } elseif ($team == 'Anaheim') {
        $sql = "SELECT * FROM players WHERE team = 'Anaheim Ducks' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Boston') {
        $sql = "SELECT * FROM players WHERE team = 'Boston Bruins' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Buffalo') {
        $sql = "SELECT * FROM players WHERE team = 'Buffalo Sabres' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Calgary') {
        $sql = "SELECT * FROM players WHERE team = 'Calgary Flames' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Carolina') {
        $sql = "SELECT * FROM players WHERE team = 'Carolina Hurricanes' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Chicago') {
        $sql = "SELECT * FROM players WHERE team = 'Chicago Blackhawks' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Colorado') {
        $sql = "SELECT * FROM players WHERE team = 'Colorado Avalanche' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Columbus') {
        $sql = "SELECT * FROM players WHERE team = 'Columbus Blue Jackets' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Dallas') {
        $sql = "SELECT * FROM players WHERE team = 'Dallas Stars' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Detroit') {
        $sql = "SELECT * FROM players WHERE team = 'Detroit Red Wings' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Edmonton') {
        $sql = "SELECT * FROM players WHERE team = 'Edmonton Oilers' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Florida') {
        $sql = "SELECT * FROM players WHERE team = 'Florida Panthers' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Los Angeles') {
        $sql = "SELECT * FROM players WHERE team = 'Los Angeles Kings' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Minnesota') {
        $sql = "SELECT * FROM players WHERE team = 'Minnesota Wild' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Montreal') {
        $sql = "SELECT * FROM players WHERE team = 'Montreal Canadiens' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Nashville') {
        $sql = "SELECT * FROM players WHERE team = 'Nashville Predators' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'New Jersey') {
        $sql = "SELECT * FROM players WHERE team = 'New Jersey Devils' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'New York Islanders') {
        $sql = "SELECT * FROM players WHERE team = 'New York Islanders' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'New York Rangers') {
        $sql = "SELECT * FROM players WHERE team = 'New York Rangers' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Ottawa') {
        $sql = "SELECT * FROM players WHERE team = 'Ottawa Senators' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Philadelphia') {
        $sql = "SELECT * FROM players WHERE team = 'Philadelphia Flyers' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Pittsburgh') {
        $sql = "SELECT * FROM players WHERE team = 'Pittsburgh Penguins' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'San Jose') {
        $sql = "SELECT * FROM players WHERE team = 'San Jose Sharks' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Seattle') {
        $sql = "SELECT * FROM players WHERE team = 'Seattle Kraken' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'St. Louis') {
        $sql = "SELECT * FROM players WHERE team = 'St. Louis Blues' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Tampa Bay') {
        $sql = "SELECT * FROM players WHERE team = 'Tampa Bay Lightning' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Toronto') {
        $sql = "SELECT * FROM players WHERE team = 'Toronto Maple Leafs' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Utah') {
        $sql = "SELECT * FROM players WHERE team = 'Utah' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Vancouver') {
        $sql = "SELECT * FROM players WHERE team = 'Vancouver Canucks' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Vegas') {
        $sql = "SELECT * FROM players WHERE team = 'Vegas Golden Knights' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Washington') {
        $sql = "SELECT * FROM players WHERE team = 'Washington Capitals' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    elseif ($team == 'Winnipeg') {
        $sql = "SELECT * FROM players WHERE team = 'Winnipeg Jets' ORDER BY CASE WHEN `2024-25` REGEXP '^[0-9]' THEN 0 ELSE 1 END, CASE WHEN `2024-25` REGEXP '^[0-9]' THEN CAST(`2024-25` AS UNSIGNED) ELSE NULL END DESC, `2024-25`";
    }
    
    
    

    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Calculate total from the "2024-25" column
    $total_2024_25 = 0;
    while ($row = $result->fetch_assoc()) {
        $total_2024_25 += intval($row['2024-25']);
    }
    // Calculate remaining budget
    $remaining_budget = 88000000 - $total_2024_25;

    // Reset the result pointer
    mysqli_data_seek($result, 0);

    // Fetch the first row to get the team name
    $first_row = $result->fetch_assoc();
    $team_name = htmlspecialchars($first_row['TEAM']);

    // Display the team name in an h2 tag if not 'All'
    if ($team != 'All') {
        echo '<h2>' . $team_name . '</h2>';
    }

    // Display total from 2024-25 column and remaining budget
    echo '<p>2024-25 Salary Cap: <b>$ 88,000,000</b></p>';
    echo '<p>2024-25 Total Spent: <b>$ ' . number_format($total_2024_25) . '</b></p>';
    echo '<p>Remaining Budget: <b>$ ' . number_format($remaining_budget) . '</b></p>';

    // Start the table and print the header row
    echo '<table class="centered">';
    echo '<tr>
            <th>PLAYER</th>
            
            <th>POS</th>
            <th>STATUS</th>
            
            <th>AGE</th>
            
            <th>2024-25</th>
            <th>2025-26</th>
            <th>2026-27</th>
            <th>2027-28</th>
            <th>2028-29</th>
            <th>2029-30</th>
          </tr>';
        //   <th>TERMS</th> 
        //   <th>ACQUIRED</th>
        //   <th>CAP%</th>
    // Output data of each row
    echo '<tr>';
    echo '<td><b>' . htmlspecialchars($first_row['PLAYER']) . '</b></td>';
    // echo '<td>' . htmlspecialchars($first_row['TERMS']) . '</td>';
    echo '<td>' . htmlspecialchars($first_row['POS']) . '</td>';
    echo '<td>' . htmlspecialchars($first_row['STATUS']) . '</td>';
    // echo '<td>' . htmlspecialchars($first_row['ACQUIRED']) . '</td>';
    echo '<td>' . htmlspecialchars($first_row['AGE']) . '</td>';
    // echo '<td>' . htmlspecialchars($first_row['CAP%']) . '</td>';
    echo '<td><b>' . htmlspecialchars($first_row['2024-25']) . '</b></td>';
    echo '<td><b>' . htmlspecialchars($first_row['2025-26']) . '</b></td>';
    echo '<td><b>' . htmlspecialchars($first_row['2026-27']) . '</b></td>';
    echo '<td><b>' . htmlspecialchars($first_row['2027-28']) . '</b></td>';
    echo '<td><b>' . htmlspecialchars($first_row['2028-29']) . '</b></td>';
    echo '<td><b>' . htmlspecialchars($first_row['2029-30']) . '</b></td>';
    echo '</tr>';

    while ($row = $result->fetch_assoc()) {
        echo '<tr>';
        echo '<td><b>' . htmlspecialchars($row['PLAYER']) . '</b></td>';
        // echo '<td>' . htmlspecialchars($row['TERMS']) . '</td>';
        echo '<td>' . htmlspecialchars($row['POS']) . '</td>';
        echo '<td>' . htmlspecialchars($row['STATUS']) . '</td>';
        // echo '<td>' . htmlspecialchars($row['ACQUIRED']) . '</td>';
        echo '<td>' . htmlspecialchars($row['AGE']) . '</td>';
        // echo '<td>' . htmlspecialchars($row['CAP%']) . '</td>';
        echo '<td><b>' . htmlspecialchars($row['2024-25']) . '</b></td>';
        echo '<td><b>' . htmlspecialchars($row['2025-26']) . '</b></td>';
        echo '<td><b>' . htmlspecialchars($row['2026-27']) . '</b></td>';
        echo '<td><b>' . htmlspecialchars($row['2027-28']) . '</b></td>';
        echo '<td><b>' . htmlspecialchars($row['2028-29']) . '</b></td>';
        echo '<td><b>' . htmlspecialchars($row['2029-30']) . '</b></td>';
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
<?php include('footer.php'); ?>
</div>


</div>

<!-- <script>
  script("myTable");
</script> -->
</body>
</html>