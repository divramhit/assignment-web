<?php
    session_start();
    include_once("db.php");

    //get data from signup page
    $fname = filter_input(INPUT_POST, "fname", FILTER_SANITIZE_STRING);
    $lname = filter_input(INPUT_POST, "lname", FILTER_SANITIZE_STRING);
    $dob = filter_input(INPUT_POST, "dob", FILTER_SANITIZE_STRING);
    $phonenum = filter_input(INPUT_POST, "phonenum", FILTER_SANITIZE_STRING);
    $street = filter_input(INPUT_POST, "street", FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, "city", FILTER_SANITIZE_STRING);
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
