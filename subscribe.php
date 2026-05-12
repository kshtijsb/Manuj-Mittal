<?php
// Custom Newsletter Handler

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $file = 'subscribers.csv';
        $timestamp = date('Y-m-d H:i:s');
        
        // Prepare the data line
        $data = "$timestamp, $email\n";

        // Save to file (Append mode)
        file_put_contents($file, $data, FILE_APPEND | LOCK_EX);

        // Redirect back with success message
        header("Location: index.php?status=success#newsletter");
        exit();
    } else {
        // Redirect back with error message
        header("Location: index.php?status=error#newsletter");
        exit();
    }
} else {
    // If someone tries to access this file directly
    header("Location: index.php");
    exit();
}
?>
