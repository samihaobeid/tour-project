<?php
$db_hostname = "127.0.0.1";
$db_username = "root";
$db_password = "";
$db_name = "contact_us";

$conn = mysqli_connect($db_hostname, $db_username, $db_password, $db_name);

if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $subject = mysqli_real_escape_string($conn, $_POST['subject']);
    $message = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO contact_uss (name, email, phone, subject, message)
            VALUES ('$name', '$email', '$phone', '$subject', '$message')";

    if (mysqli_query($conn, $sql)) {
        echo "We will contact you soon";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} else {
    echo "This page cannot be accessed directly.";
}

mysqli_close($conn);
?>
