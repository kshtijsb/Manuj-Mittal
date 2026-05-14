<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 1. Capture and Sanitize Inputs
    $name = strip_tags(trim($_POST["name"]));
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = strip_tags(trim($_POST["message"]));
    $type = isset($_POST["type"]) ? strip_tags(trim($_POST["type"])) : "General Inquiry";

    // 2. Validate Inputs
    if (empty($name) || empty($message) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: contact.php?status=error");
        exit;
    }

    // 3. Prepare Email Details
    $recipient = "kshitijbhilare10@gmail.com"; // Your Email
    $subject = "New Inquiry from ManujMittal.com: $type";
    
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n";
    $email_content .= "Inquiry Type: $type\n\n";

    if ($type === 'Meeting Request') {
        $date = strip_tags(trim($_POST["meeting_date"]));
        $time = strip_tags(trim($_POST["meeting_time"]));
        $email_content .= "Requested Date: $date\n";
        $email_content .= "Requested Time: $time\n\n";
    }
    
    $email_content .= "Message:\n$message\n";

    $email_headers = "From: $name <$email>";

    // 4. Send Email
    $mail_sent = @mail($recipient, $subject, $email_content, $email_headers);
    
    if ($mail_sent) {
        header("Location: index.php?status=success#contact");
    } else {
        header("Location: index.php?status=error#contact");
    }
} else {
    header("Location: index.php#contact");
}
?>
