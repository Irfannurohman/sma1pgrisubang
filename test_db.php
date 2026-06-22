<?php
$mysqli = new mysqli("localhost", "root", "", "db_kelulusan");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$result = $mysqli->query("SHOW TABLES");
while($row = $result->fetch_row()) {
    echo $row[0] . "\n";
}
$result = $mysqli->query("SELECT * FROM pengaturan_kelulusan LIMIT 1");
if ($result) {
    echo "Table pengaturan_kelulusan is accessible!\n";
} else {
    echo "Error querying table: " . $mysqli->error . "\n";
}
$mysqli->close();
?>
