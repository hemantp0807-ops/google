<?php
$file = 'accounts.txt';

echo "<h2>Stored Accounts</h2>";

if (!file_exists($file)) {
    die("No accounts saved yet!");
}

$data = file($file, FILE_IGNORE_NEW_LINES);

echo "<table border='1' cellpadding='8' cellspacing='0'>";
echo "<tr><th>First Name</th><th>Last Name</th><th>Username</th><th>Password (Hashed)</th></tr>";

foreach ($data as $line) {
    $parts = explode(",", $line);
    echo "<tr>";
    echo "<td>" . htmlspecialchars($parts[0]) . "</td>";
    echo "<td>" . htmlspecialchars($parts[1]) . "</td>";
    echo "<td>" . htmlspecialchars($parts[2]) . "</td>";
    echo "<td>" . htmlspecialchars($parts[3]) . "</td>";
    echo "</tr>";
}

echo "</table>";

echo '<br><a href="index.html">Back to form</a>';
?>
