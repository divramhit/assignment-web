<?php
    session_start();
    include_once("db.php");

    //get data from signup page
    $password = filter_input(INPUT_POST, "password", FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, "email", FILTER_SANITIZE_STRING);


    //find existing users with the same username or email;
    $stmt = $conn -> prepare("SELECT * FROM client WHERE password = ? OR email = ?");
    $stmt -> bind_param("ss", $password, $email);
    $stmt -> execute();
    $result  = $stmt ->get_result();

    if ($result->num_rows > 0) {
        echo "Account with this email or username already exists";
        return false;
    }

    $stmt = $conn -> prepare("INSERT INTO client (email, password) VALUES (?, ?)");
    $stmt -> bind_param("ss", $email, $password);

    $response = $stmt->execute();
    if ($response == false) {
        echo htmlspecialchars($stmt->error);
        return false;
    }

    echo "New user succesfully created";
    return true;
?>
