<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Get form values (names MUST match index.html)
    $first_name  = trim($_POST['first_name'] ?? '');
    $last_name   = trim($_POST['last_name'] ?? '');
    $username    = trim($_POST['username'] ?? '');
    $password    = trim($_POST['password'] ?? '');
    $confirm_pwd = trim($_POST['confirm_password'] ?? '');

    // Check required fields
    if ($first_name === '' || $last_name === '' || $username === '' || $password === '' || $confirm_pwd === '') {
        die("Please fill all required fields.");
    }

    // Check password match
    if ($password !== $confirm_pwd) {
        die("Password and Confirm Password do not match.");
    }

    // Hash password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Line to save
   $line = $first_name . "," . $last_name . "," . $username . "," . $password . PHP_EOL;

    // Save into accounts.txt
    $file = 'accounts.txt';

    if (file_put_contents($file, $line, FILE_APPEND | LOCK_EX) !== false) {
        echo "Account saved successfully!<br>";
        echo '<a href="view_accounts.php">View all accounts</a><br>';
        echo '<a href="index.html">Go back to form</a>';
    } else {
        echo "Error saving account. Please try again.";
    }

} else {
    echo "Invalid request.";
}
?>
