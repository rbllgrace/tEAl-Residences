<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form values
    $email = test_input($_POST["email"]);
    $password = test_input($_POST["password"]);
    $confirm_password = test_input($_POST["confirm_password"]);

    // Validate form fields
    if (empty($email) || empty($password) || empty($confirm_password)) {
        // Send error response
        echo json_encode(array("status" => "error", "message" => "Please fill out all fields!"));
    } else {
        // Send success response
        echo json_encode(array("status" => "success", "message" => "Form submitted successfully!"));
        // You can also perform additional server-side processing here
    }
}

// Function to sanitize input data
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>