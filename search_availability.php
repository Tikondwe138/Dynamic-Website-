
<?php
// Connect to database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gwsc";

$conn = mysqli_connect($servername ,$username,$password, $dbname
);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// Retrieve user input
$site_name = $_POST['site_name'];
$pitch_type = $_POST['pitch_type'];
$date = $_POST['date'];

// Query database
$sql = "SELECT * FROM pitch_availability WHERE site_name='$site_name' AND pitch_type='$pitch_type' AND date='$date'";
$result = mysqli_query($conn, $sql);

// Display results
while ($row = mysqli_fetch_assoc($result)) {
  echo "Site Name: " . $row['site_name'] . "<br>";
  echo "Pitch Type: " . $row['pitch_type'] . "<br>";
  echo "Date: " . $row['date'] . "<br>";
  echo "Pitches Available: " . $row['pitches_available'] . "<br><br>";
}

// Close connection
mysqli_close($conn);
?>