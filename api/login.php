<?php

$server = "localhost";
$user = "root";
$password = "Demohaimera12@";
$db = "trueEra";

$conn = mysqli_connect($server, $user, $password, $db);
if (!$conn) {
    exit("Connection failed! Login.php");
}

if (isset($_POST["email"])) {
    $email = $_POST["email"];
    $select = "SELECT * FROM users WHERE email='$email'";
    $query = mysqli_query($conn, $select);

    if (!$query) {
        exit("Query not fired!");
    }

    if (mysqli_num_rows($query) > 0) {
        // Start the session if the user is found
        session_start();

        // Store user information in session (you can store whatever you need, like user ID, email, etc.)
        $_SESSION['email'] = $email; // You can add more user details here
        $_SESSION['logged_in'] = true;

        echo "1"; // User found
        exit;
    } else {
        echo "2"; // User not found
        exit;
    }
} else {
    exit("Something went wrong.");
}
