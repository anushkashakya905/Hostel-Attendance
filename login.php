<?php

include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $user_type = $_POST['user_type'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check user
    $sql = "SELECT * FROM users 
            WHERE username='$username' 
            AND password='$password'
            AND user_type='$user_type'";

    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {

        // Login success
        header("Location: hostels.html");

    } else {

        echo "<script>
                alert('Invalid Username or Password');
                window.location.href='login page.html';
              </script>";

    }
}

?>