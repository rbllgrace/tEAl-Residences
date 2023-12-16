<?php require('/xampp/htdocs/tEAl-Residences/user/connection/connect.php');
$sql = "SELECT * FROM contact_us_table";
$result = $conn->query($sql);
?>

<!-- sweetalert2 -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="sweetalert2.all.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<!--  -->

<style>
    form {
        padding: 30px;
    }

    .form-label {
        margin-bottom: 0;
        font-size: .7rem;
    }


    .form-control {
        font-size: .8rem;
    }

    .btn_submit {
        background: #008080;
        border-color: #008080;

        font-size: .8rem;
        width: 30%;

        margin-top: 5px;
    }

    .btn_submit:hover {
        background: #0e9c9c;
        border-color: #008080;
    }

    .error {
        color: red;
        font-size: .6rem;
        position: relative;
        top: -18px;
    }

    .error2 {
        color: red;
        font-size: .6rem;
        position: relative;
    }
</style>

<?php

$name_err = $email_err = $subject_err = $message_err =  "";
$name = $email = $subject = $message = "";

// Function to sanitize input data
function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Function to send a confirmation email
function sendConfirmationEmail($userEmail, $name, $subject, $message)
{
    require 'C:\xampp\htdocs\tEAl-Residences\user\libraries\PHPMailer\src\PHPMailer.php';
    require 'C:\xampp\htdocs\tEAl-Residences\user\libraries\PHPMailer\src\SMTP.php';
    require 'C:\xampp\htdocs\tEAl-Residences\user\libraries\PHPMailer\src\Exception.php';

    $mail = new PHPMailer\PHPMailer\PHPMailer();

    // Configure the email settings
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'noreply050623@gmail.com';
    $mail->Password = 'xlqhaxnjiowsxuyr';
    $mail->SMTPSecure = 'tls'; // Change to 'ssl' if necessary
    $mail->Port = 587; // Change to 465 if using 'ssl'

    // Sender and recipient
    $mail->setFrom($userEmail, $subject);
    $mail->addAddress($userEmail);

    // Email content
    $mail->isHTML(true);
    $mail->Subject = $subject;
    $mail->Body = $message;

    // Send the email
    if (!$mail->send()) {
        // echo 'Confirmation email sent successfully!';
        echo 'Error: ' . $mail->ErrorInfo;
    } else {
        // echo 'Error: ' . $mail->ErrorInfo;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Name validation
    if (empty($_POST["name"])) {
        $name_err = "Name is required *";
    } else {
        $name = test_input($_POST["name"]);
        // Check if name only contains letters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
            $name_err = "Only letters and white space allowed";
        } else {
            $name = test_input($_POST["name"]);
        }
    }

    // Email validation
    if (empty($_POST["email"])) {
        $email_err = "Email is required *";
    } else {

        $email = test_input($_POST["email"]);
    }

    if (empty($_POST["subject"])) {
        $subject_err = "Subject is required *";
    } else {
        $subject = test_input($_POST["subject"]);
    }

    if (empty($_POST["message"])) {
        $message_err = "Message is required *";
    } else {
        $message = test_input($_POST["message"]);
    }

    // If all validations pass, insert user information into the database
    if (empty($name_err) && empty($email_err) && empty($subject_err) && empty($message_err)) {

        // Insert user information into the database
        $insertQuery = "INSERT INTO user_queries_table (name, email, subject, message) 
        VALUES ('$name', '$email', '$subject', '$message')";
        if ($conn->query($insertQuery) === TRUE) {
            sendConfirmationEmail($email, $name, $subject, $message);

            // Show message to the user using SweetAlert2
            echo "<script>
            Swal.fire({
                title: 'Query Sent',
                icon: 'success',
                confirmButtonText: 'OK'
            }).then(function() {
                window.location.href = 'http://localhost/teal-residences/user/pages/homepage.php#contact-us'; 
               
                document.getElementById('exampleFormControlInput1').value = '';
                document.getElementById('exampleFormControlInput2').value = '';
                document.getElementById('exampleFormControlInput3').value = '';
                document.getElementById('exampleFormControlTextarea1').value = '';
            });
            </script>";
        }
    }
}

$conn->close();

?>



<!--  Contact Us -->
<div class="container" id="contact-us" data-aos="fade-up">
    <h1 class="text-center mt-5 mb-5">Contact Us</h1>

    <div class="contacts_container container">
        <div class="left">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" id="myForm">
                <div class="mb-1">
                    <label for="exampleFormControlInput1" class="form-label">Name</label>
                    <input type="text" class="form-control shadow-none" id="exampleFormControlInput1" name="name" value="<?php echo $name ?>">
                    <span class="error"><?php echo $name_err; ?></span>
                </div>

                <div class="mb-1">
                    <label for="exampleFormControlInput2" class="form-label">Email address</label>
                    <input type="text" class="form-control shadow-none" id="exampleFormControlInput2" name="email" value="<?php echo $email ?>">
                    <span class="error"><?php echo $email_err; ?></span>
                </div>

                <div class="mb-1">
                    <label for="exampleFormControlInput3" class="form-label">Subject</label>
                    <input type="text" class="form-control shadow-none" id="exampleFormControlInput3" name="subject" value="<?php echo $subject ?>">
                    <span class="error"><?php echo $subject_err; ?></span>
                </div>

                <div class="mb-1">
                    <label for="exampleFormControlTextarea1" class="form-label">Message</label>
                    <textarea class="form-control shadow-none" id="exampleFormControlTextarea1" rows="8" name="message"><?php echo $message ?></textarea>
                    <span class="error2"><?php echo $message_err; ?></span>
                </div>

                <button type="submit" class="btn btn-secondary btn_submit shadow-none">Submit</button>
            </form>
        </div>
        <div class="right">
            <?php
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {

                    echo ' <p>
                    ' . $row["icon"] . '&nbsp;&nbsp;' . $row["contact_content"] . '
                </p>';
                }
            }
            ?>
        </div>


    </div>
</div>
<!--  -->