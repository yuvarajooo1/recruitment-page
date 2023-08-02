<?php
$username = filter_input(INPUT_POST, 'username');
$password = filter_input(INPUT_POST, 'password');

if (!empty($username) && !empty($password)) {
    $host = "localhost";
    $dbusername = "root";
    $dbpassword = "";
    $dbname = "webreg";
    
    $conn = new mysqli($host, $dbusername, $dbpassword, $dbname);
    if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ')' . mysqli_connect_error());
    } else {
        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";
        if ($conn->query($sql)) {
            echo "New record added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $conn->close();
    }
} else {
    if (empty($username) && empty($password)) {
        echo "Both Username and Password should not be empty";
    } else if (empty($username)) {
        echo "Username should not be empty";
    } else {
        echo "Password should not be empty";
    }
}
?>
