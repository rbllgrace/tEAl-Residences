<?php

// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hotel_db";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// -------------------------------------------------------

function filteration($data)
{

    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
        $data[$key] = stripslashes($value);
        $data[$key] = htmlspecialchars($value);
        $data[$key] = strip_tags($value);
    }
    return $data;
}

function filteration_without_special_chars($data)
{
    foreach ($data as $key => $value) {
        $data[$key] = trim($value);
    }
    return $data;
}

// -------------------------------------------------------


function select($sql, $values, $datatypes)
{
    $con = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_get_result($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die('Query connect be executed - Select');
        }
    } else {
        die('Query connect be prepared - Select');
    }
}

// -------------------------------------------------------

function alert($type, $msg)
{
    echo <<<alert
        <div class="alert alert-$type alert-dismissible fade show custom_alert " role="alert">
            $msg
        <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    alert;
}
// -------------------------------------------------------

function admin_login()
{
    session_start();
    if (!(isset($_SESSION['admin_login']) && isset($_SESSION['admin_login']) == true)) {
        header("Location: http://localhost/teal-residences/admin_panel/login.php");
        exit;
    }
    // session_regenerate_id(true);
}


// -------------------------------------------------------
function update($sql, $values, $datatypes)
{
    $con = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die('Query connect be executed - Update');
        }
    } else {
        die('Query connect be prepared - Update');
    }
}
// -------------------------------------------------------
function insert($sql, $values, $datatypes)
{
    $con = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die('Query connect be executed - Insert');
        }
    } else {
        die('Query connect be prepared - Insert');
    }
}

// -------------------------------------------------------
function delete($sql, $values, $datatypes)
{
    $con = $GLOBALS['conn'];
    if ($stmt = mysqli_prepare($con, $sql)) {
        mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
        if (mysqli_stmt_execute($stmt)) {
            $res = mysqli_stmt_affected_rows($stmt);
            mysqli_stmt_close($stmt);
            return $res;
        } else {
            mysqli_stmt_close($stmt);
            die('Query connect be executed - Delete');
        }
    } else {
        die('Query connect be prepared - Delete');
    }
}
// -------------------------------------------------------
function selectAllIn($table)
{
    $con = $GLOBALS['conn'];
    $res = mysqli_query($con, "SELECT * FROM $table");
    return $res;
}
// -------------------------------------------------------

function selectAll($query, $values = [], $types = '')
{
    $conn = new mysqli("localhost", "root", "", "hotel_db");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $stmt = $conn->prepare($query);

    if (!empty($values) && $stmt) {
        $stmt->bind_param($types, ...$values);
    }

    $stmt->execute();
    $result = $stmt->get_result();

    $stmt->close();
    $conn->close();

    return $result;
}

function delete_single_table($query, $values = null, $types = null)
{
    // Assuming you have a database connection
    $connection = mysqli_connect("localhost", "root", "", "hotel_db");

    if (!$connection) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // If you are using prepared statements
    if ($values !== null && $types !== null) {
        $stmt = mysqli_prepare($connection, $query);
        mysqli_stmt_bind_param($stmt, $types, ...$values);
        $result = mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    } else {
        // For non-prepared statements
        $result = mysqli_query($connection, $query);
    }

    mysqli_close($connection);

    return $result ? "Query executed successfully" : "Error: " . mysqli_error($connection);
}
