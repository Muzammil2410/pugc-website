<?php
// Database configuration
$servername = "localhost";
$username = "root"; // Default username for XAMPP
$password = "";     // Default password for XAMPP (empty by default)
$dbname = "userform";

// Create connection tu likh he ly hahaha
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $subject = $conn->real_escape_string($_POST['subject']);
    $message = $conn->real_escape_string($_POST['message']);

    $sql = "INSERT INTO data (user_name, user_email, user_subject, user_message) VALUES ('$name', '$email', '$subject', '$message')";
    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('Your message has been sent. Thank you!');
            window.location.href='http://127.0.0.1:5500/index.html'; // Add the closing quote and semicolon here
        </script>"; // Correct the semicolon placement here
    } else {
        echo "Error: " . $conn->error;
    }
    
} else {
    echo "Form not submitted via POST.";
}
$conn->close();
?>