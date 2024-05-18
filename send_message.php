<?php

// Check if the message and recipient data are received via POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the message and recipient from the POST data
    $message = $_POST['message'];
    $recipient = $_POST['recipient'];

    // You can process the message here (e.g., save it to a database, send it via email, etc.)

    // For this example, let's simply print the message and recipient to the console
    // Replace this with your actual message handling logic
    $response = "Message sent to $recipient: $message";
    echo $response;
} else {
    // If the request method is not POST, return an error message
    echo "Error: Invalid request method";
}

?>
